<?php
/**
 * 模块名称:模块管理模块
 */
class BM_ModuleStructureController extends MainController
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
        $this->assign('modStatus', json_encode(C('modStatus')));

    }

    /**
     * 获取列表
     */
    public function actionGetList()
    {
        if (isset($_GET['do'])) {
            $list = BM_ModuleStructureProvider::getList();
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
            if (!empty($post['id'])) {
                $ret = BM_ModuleStructureProvider::putRow($post);
                if ($ret !== false) {
                    returnInfo::returnSuccess($ret);
                }else{
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
            if (!empty($post['name'])) {
                $ret = BM_ModuleStructureProvider::addRow($post);
                returnInfo::returnSuccess($ret);
            }
        }
    }


}
