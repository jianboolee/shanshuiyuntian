<?php
namespace Api\Controller;
use Think\Controller;

//定义参数常量
define('_PARAM_ACCESS_KEY', 'access_key'); //access key 接收参数

class BaseController extends Controller{
	public function _initialize(){

		//检查 access key
		$this->checkAccessKey();

		//检查登录状态
		
	}

	/**
	* 检查access key的合法性
	**/
	public function checkAccessKey(){
		
		$accessKey =  $_GET[_PARAM_ACCESS_KEY];

		$AccessM = D('Access');

		//检查access key 的合法性
		$result = $AccessM->checkAccessKey($accessKey);

		//不合法则输出提示，并停止运行
		if($result[_JSON_STATUS]>0){
			$this->ajaxReturn($result);
			die;
		}


	}
}