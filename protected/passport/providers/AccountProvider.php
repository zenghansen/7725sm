<?php
/**
 * 用户数据操作类.
 * User: chenwen
 * Date: 14-10-28
 * Time: 下午6:05
 * To change this template use File | Settings | File Templates.
 */

class AccountProvider {

    private static $instance;

    public static function getInstance()
    {
        if(self::$instance == null){
            self::$instance = new AccountProvider();
        }
        return self::$instance;
    }

    public function __construct()
    {
        require_once FRAMEWORK_PATH.'db/pf_passport/TbPTAccount.php';
        require_once APP_UTIL_PATH . 'ToolUtil.php';
    }

    /******************************************************查询数据库************************************************************/

    /**
     * 通过账号获取账号信息
     * @param  string 通行证账号
     * @return TbPTAccount
     */
    public function getAccountByAccID($accountID)
    {
        $tb = new TbPTAccount();
        $tb->setPtAccountID($accountID);
        if($tb->loadFromExistFields() == false){
            return false;
        }

        return $tb;
    }

    /**
     * 加载整张表
     */
    public function getTotalAccountList()
    {
        $list = TbPTAccount::loadTable(); //将整个表加载...

        return $list;
    }

    /**
     * 获取符合条件的账号信息列表
     */
    public function getAccountList($accountID=null,$email=null,$registeSource=null,$dateFrom=null,$dateTo=null,$start=null,$limit=null)
    {
        $condition = "";
        if(!empty($accountID)){
            $condition = $this->jointSqlCondition($condition,"pt_AccountID='{$accountID}'");
        }
        if(!empty($email)){
            $condition = $this->jointSqlCondition($condition,"pt_Email='{$email}'");
        }
        if(!empty($registeSource)){
            if($registeSource == 'others')  {
                $registeSource = '';
            }
            $condition = $this->jointSqlCondition($condition,"pt_RegisteSource='{$registeSource}'");
        }

        if($dateFrom == '') {
            $dateFrom = '0000-00-00 00:00:00';
        }
        if($dateTo == ''){
            $dateTo = SQLUtil::now();
        }

        if(!empty($dateFrom)){
            $condition = $this->jointSqlCondition($condition,"pt_RegisteTime>='{$dateFrom}'");
        }

        if(!empty($dateTo)){
            $condition = $this->jointSqlCondition($condition,"pt_RegisteTime<='{$dateTo}'");
        }

        if(empty($condition)){
            $condition .= " 1=1";
        }
        $condition .= " order by pt_AccountID";

        if($start != null && $limit != null){
            $condition .= " limit {$start},{$limit}";
        }

        $tables = TbPTAccount::loadTable(null,$condition); //按条件加载表

        return $tables;
    }

    /******************************************************写入数据库************************************************************/

    /**
     * 更新绑定数据
     * @param int $accountKey 通行证表主键
     * @param string $username 新的通行证账号
     * @param string $password 新的通行证密码
     * @param string $email 新的邮箱
     */
    public function updateBinding($accountKey,$username, $password, $email)
    {
        $tb = $this->getAccountByAccKey($accountKey);
        if($tb == false){
            return MG_PW_USER_NOT_EXISTS;
        }
        $tb->setPtAccountID($username);
        $tb->setPtPassword(md5($password));
        $tb->setPtEmail($email);

        $result = $tb->save();
        if($result == false){
            return MG_SYSTEM_EXCEPTION;
        }

        return $tb;
    }

    /******************************************************数据管理辅助接口************************************************************/

    /**
     * 生成随机用户名
     * @return string
     */
    public function createRandomName()
    {
        return uniqid() . mt_rand(1,10000000);
    }

    /**
     * 生成随机密码
     * @param int 密码长度
     * @return string
     */
    public function createRandomPassword($length=8)
    {
        //密码第一位数字不能是0
        $pw = mt_rand(1,9);
        $length--;
        for($i = 0; $i < $length; $i++){
            $pw .= mt_rand(0,9);
        }
        return $pw;
    }

    /**
     * 检测注册用的数据是否合法
     */
    public function checkRegDataLegality($username=null, $password=null, $email=null, $game=null)
    {
        $username = strtolower($username);
        $check_data = array();
        if($username){
            $check_data['username'] = $username;
        }
        if($password){
            $check_data['password'] = $password;
        }
        if($email){
            $check_data['email'] = $email;
        }
        if($game){
            $check_data['game'] = $game;
        }

        foreach($check_data as $key => $value) {
            $check_user_result = $this->checkRegLegality($value, $key);
            if($check_user_result !== true) {
                return $check_user_result;
            }
        }
        return true;
    }

    /**
     * 检测注册时数据的合法性
     */
    public function checkRegLegality($value,$key)
    {
        switch($key)
        {
            case 'username':
                $accountID = $value;
                if(empty($accountID)) {
                    return MG_REG_USER_EMPTY;
                }
                if(6 > strlen($accountID) || 20 < strlen($accountID)) {
                    return MG_REG_USER_LENGTH_ERROR;
                }
                if(preg_match('/[^a-z0-9_]/i', $accountID)) {
                    return MG_REG_USER_FORMAT_ERROR;
                }
                $account = $this->getAccountByAccID($accountID);
                if($account != false){
                    return MG_REG_USER_EXISTS;
                }
                break;
            case 'password':
                $password = $value;
                if(empty($password)) {
                    return MG_REG_PW_EMPTY;
                }
                if(6 > strlen($password) || 20 < strlen($password)) {
                    return MG_REG_PW_LENGTH_ERROR;
                }
                if(preg_match('/\s/', $password)) {
                    return MG_REG_PW_FORMAT_ERROR;
                }
                break;
            case 'email':
                $email = $value;
                if(empty($email)) {
                    return MG_REG_EMAIL_EMPTY;
                }
                if(!ToolUtil::checkMail($email)) {
                    return MG_REG_EMAIL_FORMAT_ERROR;
                }
                break;
            case 'game':
                $game = $value;
                if(!empty($game) && preg_match('/[^a-z0-9_]/i', $game)) {
                    return MG_REG_GAME_NAME_UNLAWFUL;
                }
                break;
        }

        return true;
    }

    public function jointSqlCondition($condition,$joinStr)
    {
        if(!empty($condition)){
            $condition .= " AND ";
        }

        $condition .= $joinStr;

        return $condition;
    }
}