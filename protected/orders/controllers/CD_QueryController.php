<?php

class CD_QueryController extends MainController {
	
	public function __construct()
	{
		parent::__construct();
	
	}
	
	public function actionIndex()
	{
	}
	
	public function actionQuery()
	{
		
	}
	
	public function actionQueryAgent()
	{
		
	}
	
	public function actionTestAccount()
	{
		$url = '?m=' . $_GET['m'] . '&c=' . $_GET['c']."&a=GetTestAccountData";
		$this->assign("get_data_url",$url);
	}
	
	public function actionExchange()
	{
		
	}
	
	public function actionGetTestAccountData()
	{
		$list = array();
		$list[] = array("pt_AccountID" => "Acc",
						"pt_RegisteTime" => "2014-09-10 10:12:00",
						"pt_RegisteIP" => "127.0.0.1",
						"order_amount" => "10",
						"order_times" => "1",
						"bm_AccountID" => "admin"
				);
		echo json_encode($list);
		die();
	}

}
