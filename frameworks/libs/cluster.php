<?php
/**
 * Project:    Simple mvc for apps
 * File:       cluster.php
 *
 * 集群操作类
 *
 * 每个集群可以包含多个主节点（读写）和多个备份节点（只读）
 *
 * @link http://mvc.7725.com/
 * @copyright 2012 7725 Group, Inc.
 * @author xiongl <xiongl@7725.com>
 * @package Libaray
 * @abstract
 * @version 1.0a
 */

abstract class cluster
{

    /**
     * 节点
     */
    private $nodes = array();

    /**
     * 节点搜寻位移
     */
    private $pos = 0;

    /**
     * 有效连接句柄
     */
    private $links = array();

    /**
     * 活动的连接句柄
     */
    public $link = null;

    /**
     * 集群使用的字符编码
     */
    private $charset = 'utf8';

    /**
     * 设置集群的字符编码
     *
     * @param string $charset 默认utf8
     * @return object cluster
     */
    public function setCharSet($charset = 'utf8')
    {
        $this->charset = $charset;
    }

    /**
     * 添加节点
     *
     * @param array $params 节点参数
     * 例子：array('host'=>'localhost:3306', 'user'=>'root', 'password'=>'123456', 'charset'=>'utf8', 'database'=>'app_db_name', 'type'=>'master');
     * @return object cluster
     */
    public function add($node = array())
    {
        $this->nodes[] = $node;
        return $this;
    }

    /**
     * 实现读写分离, 动态连接节点
     *
     * @access private
     * @param string $id 读写操作判断. 主节点支持读写, 备份节点只支持读
     * @return array
     * @TODO 有待完善, 再补充   ??不支持多个slave吧
     */
    public function find($type = 'master')
    {

        /**
         * 改用另外的数据库连接，废弃下面的。
         */
        require_once(FRAMEWORK_PATH . "utils/config.php");
        $linkInfo = $GLOBALS['pf_basemanage'];
        $conn = mysql_connect($linkInfo[1],$linkInfo[2],$linkInfo[3]) or die("无法连接到数据库");
        mysql_select_db($linkInfo[4]);
        mysql_query("set names 'utf8'");
        $this->link = $conn;
        return true;

        /***********************************我是华丽分割线**************************************/
        if (!is_array($this->nodes)) {
            throw new Exception('Please call function append() first.');
        }
        // 如果已经连接, 直接使用
        if (isset($this->links[$type]) && is_resource($this->links[$type])) {
            $this->link = $this->links[$type];
            return true;
        }

        // 保存当前的坐标
        $curPos = $this->pos;
        // 第二轮筛选
        $research = false;
        // 逐个排查
        while (true) {
            // 循环结束
            if (count($this->nodes) <= $this->pos) {
                if ($research) {
                    // 第二轮筛选失败
                    throw new Exception('Can\'t find any active link.');
                } else {
                    // 坐标重新寻址
                    $research = true;
                    $this->pos = 0;
                }
            }

            /**
             * 如果当前坐标大于实际的坐标, 那么代表已经循环一圈
             * 或者已经找到指定的主、从连接
             * 以上两种情况可以使用当前坐标的参数连接数据库
             */
            if ($research || ($this->nodes[$this->pos]['type'] == $type)) {
                $node = $this->nodes[$this->pos];

                // 参数分解
                $host = $node['host'];
                $user = $node['user'];
                $password = $node['password'];
                $database = $node['database'];
                // 连接数据库
                try {
                    $this->link = $this->connect($host, $user, $password, $database, $this->charset);
                    // 有效连接句柄
                    if (is_resource($this->link)) {
                        // 保存当前有效的连接句柄
                        $this->links[$type] = $this->link;
                        // 坐标下移
                        ++$this->pos;
                        //print_r($params);
                        // 返回
                        return true;
                    }
                } catch (Exception $e) {
                    //
                }
            }

            // 坐标下移
            ++$this->pos;
        }
    }

    /**
     * 执行语句, 实现读写分离
     *
     * @param string $sql
     * @param string $link_type 链接类型，默认从库执行查询，主库执行更新
     */
    public function query($sql, $link_type = '')
    {
        if (empty($link_type)) {
            $link_type = preg_match("/^(\s*)select/i", $sql) ? 'slave' : 'master';
        }

        // 根据语句判断读写操作
        if (!$this->find($link_type)) {
            throw new Exception('找不到可操作的节点.');
        }
    }

    /**
     * 数据库连接函数, 所有继承的数据库类都必须实现这个方法
     *
     * @abstract
     * @access public
     * @param string $host 连接服务器
     * @param string $user 连接用户
     * @param string $password 用户密码
     * @param string $database 数据库名称
     * @param string $charset 数据库使用编码
     * @return mixed
     */
    abstract public function connect($host, $user, $password, $database, $charset = 'utf8');
}

/**
 * 這個類可以用於 model::set() , 例如可以做 update set xxx=xxx+1
 * 用法是
 * $model->set(
 *    'a' => new dbexpression('a+1')
 * );
 *
 */
class dbexpression
{
    private $_expression;

    public function __construct($expression)
    {
        $this->_expression = $expression;
    }

    public function __toString()
    {
        return $this->_expression;
    }

}