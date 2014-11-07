<?php
/**
 * 模块名称:级别模块
 */
class BM_RankController extends MainController
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
        $this->assign('rankStatus', json_encode(C('rankStatus')));
        //获取下拉模块表
        $modTree = array();
        $ridArr = MainProvider::getRightArr(cookie::get('user'), cookie::get('userInfo')['bm_RankID']);
        MainProvider::getMenuTree(0, cookie::get('userInfo')['bm_AccountType'], $ridArr, $modTree);
        $this->assign('modTree', json_encode($modTree));

    }

    /**
     * 获取列表
     */
    public function actionGetList()
    {
        if (isset($_GET['do'])) {
            $get = $_GET;
            $list = BM_RankProvider::getList($get['start'], $get['limit']);
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
            if (!empty($post['id']) && !empty($post['name']) && !empty($post['deptId'])) {

                $ret = BM_RankProvider::putRow($post);
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
                $ret = BM_RankProvider::addRow($post);
                returnInfo::returnSuccess($ret);
            }
        }
    }

    /**
     * 删除
     */
    public function actionDelRow()
    {
        if (isset($_GET['do'])) {
            $post = $_POST;
            if (!empty($post['id'])) {
                $ret = BM_RankProvider::delRow($post);
                if ($ret !== false) {
                    returnInfo::returnSuccess($ret);
                }else{
                    returnInfo::returnError();
                }
            }
        }
    }


}
