<?php
/**
 * 通行证账号相关日志
 * User: chenwen
 * Date: 14-10-31
 * Time: 下午6:52
 * To change this template use File | Settings | File Templates.
 */

class PassportLogProvider {

    public function __construct()
    {
        require_once FRAMEWORK_PATH.'db/pf_passport/TbPTLoginLog.php';
        require_once APP_UTIL_PATH . 'ToolUtil.php';
    }

    /******************************************************查询数据库************************************************************/



    /******************************************************写入数据库************************************************************/

    /**
     * 插入登录日志
     * @param int 通行证唯一ID
     * @param
     */
    public function insertLoginLog($accountKey,$loginSystem = null)
    {
        if(empty($accountKey)){
            return false;
        }

        $time = SQLUtil::now();
        $ip = GetIP();

        $tb = new TbPTLoginLog();
        $tb->setPtAccountKey($accountKey);
        $tb->setPtLoginIp($ip);
        $tb->setPtLoginTime($time);

        if($loginSystem){
            $tb->setPtLoginSystem($loginSystem);
        }

        $result = $tb->insertOrUpdate();
        if($result === true){
            return $tb;
        }
        return false;
    }

    /******************************************************数据管理辅助接口************************************************************/
}