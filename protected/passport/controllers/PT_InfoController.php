<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 14-11-4
 * Time: 下午4:15
 * To change this template use File | Settings | File Templates.
 */

class PT_InfoController extends MainController {

    /**
     * 构造函数
     */
    public function __construct()
    {
        parent::__construct();

        require_once APP_PROVIDER_PATH . 'AccountProvider.php';
    }

    public function actionIndex()
    {

    }

    public function actionQuery()
    {

    }

    public function actionQueryAutoReg()
    {

    }

    public function actionGetList()
    {
        $accountID = isset($_GET['accountID']) ? $_GET['accountID'] : null;
        $email = isset($_GET['email']) ? $_GET['email'] : null;
        $registeSource = isset($_GET['registeSource']) ? $_GET['registeSource'] : null;
        $hasCharge = isset($_GET['hasCharge']) ? $_GET['hasCharge'] : null;

        $dateFrom =  isset($_GET['dateFrom']) ? $_GET['dateFrom'] :null;
        $dateTo =  isset($_GET['dateTo']) ? $_GET['dateTo'] :null;

        $start = isset($_GET['start']) ? $_GET['start'] : 0;
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;

        $sort =  isset($_GET['sort']) ? $_GET['sort'] : null;
        $sortBy = array();

        $order = isset($_GET['order']) ? $_GET['order'] : null;

        $list = array();
        $srclist = AccountProvider::getInstance()->getAccountList($accountID,$email,$registeSource,$dateFrom,$dateTo);
        foreach ($srclist as $key=>$tb){
            //判断储值条件是否满足
            if($hasCharge == 'yes'){

            } elseif($hasCharge == 'no'){

            } else {

            }
            //抽取账号相关数据
            $list[$key]['pt_accountID'] = $tb->getPtAccountID();
            $list[$key]['pt_registeTime'] = $tb->getPtRegisteTime();
            $list[$key]['pt_accountSource'] = $tb->getPtRegisteSource();
            $list[$key]['pt_email'] = $tb->getPtEmail();

            if(!empty($sort)){
                $sortBy[$key] =  $list[$key][$sort];
            }
        }

        $orderType = SORT_ASC;
        if(!empty($order)){
            if($order == 'desc'){
                $orderType = SORT_DESC;
            }
        }
        if(!empty($sortBy)){
            array_multisort($sortBy,$orderType,$list);
        }

        $len = count($list);
        $list = array_splice($list,$start, $limit);

        $result = array();
        $result['total'] = $len;
        $result['rows'] = $list;
        echo json_encode($result);
        die();
    }
}