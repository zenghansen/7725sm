<?php

class IndexProvider extends MainProvider
{

    /**
     * 构造函数
     */
    public function __construct()
    {

    }

    public static  function modPsw($row)
    {
        try {
            $ret = self::$db->select('BM_Account', 'bm_AccountID', 'bm_Password=? AND bm_AccountID=?', array(md5($row['oldPsw']), cookie::get('user')));
            if (empty($ret)) {
                return false;
            }
            $update = array(
                "bm_Password" => md5($row['newPsw'])
            );
            $ret = self::$db->update('BM_Account', $update, 'bm_Password=? AND bm_AccountID=?', array(md5($row['oldPsw']), cookie::get('user')));
            return $ret;
        } catch (Exception $e) {
           throw new Exception($e);
        }
    }


}
