<?php

class IndexController extends MainController
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function actionIndex()
    {
    }

    public function actionModPsw()
    {
        if (isset($_GET['do'])) {
            $post = $_POST;
            if (!empty($post['newPsw']) && !empty($post['oldPsw'])) {
                $ret = IndexProvider::modPsw($post);
                if ($ret !== false) {
                    returnInfo::returnSuccess($ret);
                }else{
                    returnInfo::returnError();
                }
            }
        }
    }


}
