<?php
namespace Admin\Controller;
use Think\Controller;

class BaseController extends Controller{
	public function _initialize(){
		//检查登录状态
		$Account = new \Account\Controller\BaseController(); //需要验证登录
	}
}