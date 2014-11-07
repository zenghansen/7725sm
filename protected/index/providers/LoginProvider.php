<?php

class LoginProvider extends MainProvider
{

    /**
     * 构造函数
     */
    public function __construct()
    {
    }

    public static function login($name, $password)
    {
        try{
            return self::$db->select('BM_Account', '*', 'bm_AccountID=? AND bm_Password=? AND bm_AccountState=0', array($name, $password));
        }catch (Exception $e){
            throw new Exception($e);
        }
    }


}
