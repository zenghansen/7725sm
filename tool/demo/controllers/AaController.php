<?php
/**
 * 模块名称:某某模块
 */
class AaController extends MainController
{

    /**
     * 构造函数
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * 初始化数据，显示页面
     */
    public function actionIndex()
    {
        //获取状态配置
        $this->assign('AaStatus', json_encode(C('AaStatus')));

    }

    /**
     * 获取列表
     */
    public function actionGetList()
    {
        if (isset($_GET['do'])) {
            $get = $_GET;
            $list = AaProvider::getList($get['start'], $get['limit']);
            returnInfo::returnData($list);
        }
    }

    /**
     * 修改
     */
    public function actionPutRow()
    {
        if (isset($_GET['do'])) {
            $post = $_POST['row'];
            if (!empty($post['put'])) {
                $ret = AaProvider::putRow($post);
                if ($ret !== false) {
                    returnInfo::returnSuccess($ret);
                } else {
                    returnInfo::returnError();
                }
            }
        }
    }

    /**
     * 添加
     */
    public function actionAddRow()
    {
        if (isset($_GET['do'])) {
            $post = $_POST;
            if (!empty($post['add'])) {
                $ret = AaProvider::addRow($post);
                returnInfo::returnSuccess($ret);
            }
        }
    }


}
