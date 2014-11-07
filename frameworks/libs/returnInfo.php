<?php
/*接口返回格式类*/

class returnInfo {

   private function __construct(){}

    /**成功返回数据
     * @param array $arg
     */
    public static function returnData($arg = array())
    {
        $arg['ret'] = true;
        echo json_encode($arg);
        die();
    }

    /**成功返回
     * @param array $arg
     */
    public static function returnSuccess($arg = null)
    {
        $data = array();
        $data['ret'] = true;
        $data['body'] = $arg;
        echo json_encode($data);
        die();
    }

    /**失败返回
     * @param array $arg
     */
    public static function returnError($arg = null)
    {
        $data = array();
        $data['ret'] = false;
        $data['body'] = $arg;
        echo json_encode($data);
        die();
    }

}