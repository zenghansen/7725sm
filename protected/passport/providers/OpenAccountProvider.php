<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 14-10-29
 * Time: 上午11:29
 * To change this template use File | Settings | File Templates.
 */

class OpenAccountProvider {

    public function __construct()
    {
        require_once FRAMEWORK_PATH.'db/pf_passport/TbPTOpenUIDAccount.php';
    }

    /******************************************************查询数据库************************************************************/

    /**
     * 通过外部账号获取外部账号信息
     * @param string 外部账号，即openuid
     * @return  TbPTOpenUIDAccount
     */
    public function getOpenAccByAccID($openAccount)
    {
        $tb = new TbPTOpenUIDAccount();
        $tb->setPtOpenAccount($openAccount);
        if($tb->loadFromExistFields() == false){
            return false;
        }

        return $tb;
    }

    /**
     * 通过通行证账号的唯一ID获取外部账号信息
     * @param  int 通行证账号
     * @return TbPTOpenUIDAccount
     */
    public function getOpenAccByAccKey($accountKey)
    {
        $accountKey = intval($accountKey);
        if ($accountKey < 1)
            return false;

        $tb = new TbPTOpenUIDAccount();
        $tb->setPtAccountKey($accountKey);
        if($tb->loadFromExistFields() == false){
            return false;
        }

        return $tb;
    }

    /******************************************************数据管理辅助接口************************************************************/

    /**
     * 插入一条记录到 外部账号表
     * @return 插入成功(true)或失败
     */
    public function insert($openuid,$openidchannel,$openidinfo,$accountKey)
    {
        $time = SQLUtil::now();
        $ip = GetIP();

        $tb = new TbPTOpenUIDAccount();
        $tb->setPtOpenAccount($openuid);
        $tb->setPtAccountSource($openidchannel);
        $tb->setPtAccountKey($accountKey);
        $tb->setPtRegisteTime($time);
        $tb->setPtRegisteIP($ip);
        $tb->setPtLastLoginTime($time);
        $tb->setPtLastLoginIP($ip);
        $tb->setPtOpenIdInfo($openidinfo);

        $result = $tb->insertOrUpdate();
        if($result === true){
            return $tb;
        }
        return false;
    }

    /******************************************************数据管理辅助接口************************************************************/

    /**
     * 获取外部账号
     */
    public function getOpenAccount($accountKey)
    {
        $openAccount = $this->getOpenAccByAccKey($accountKey);
        if(empty($openAccount)){
            return '';
        }
        return $openAccount->getPtOpenAccount();
    }

    public function  login($openuid,$openidchannel,$openidinfo)
    {
        $tb = $this->getOpenAccByAccID($openuid);
        if($tb == false){
            return false;
        }
        $tb->setPtAccountSource($openidchannel);
        $tb->setPtLastLoginTime(SQLUtil::now());
        $tb->setPtLastLoginIP(GetIP());
        $tb->setPtOpenIdInfo($openidinfo);

        $result = $tb->save();
        if($result == false){
            return false;
        }

        return $tb;
    }

    public function register($openuid,$openidchannel,$openidinfo,$accountKey)
    {
        return $this->insert($openuid,$openidchannel,$openidinfo,$accountKey);
    }
}