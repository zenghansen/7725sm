<?php
/**
 * 工具类
 * User: chenwen
 * Date: 14-10-30
 * Time: 下午2:12
 * To change this template use File | Settings | File Templates.
 */

class ToolUtil {

    /**
     * 檢查郵件合法性
     * @param string $email
     * @return boolean
     */
    public static function checkMail($email) {
        return preg_match('/^[a-z0-9]+([\+_\-\.]?[a-z0-9]+)*@([a-z0-9]+[\-]?[a-z0-9]+\.)+[a-z]{2,6}$/i', $email);
    }
}