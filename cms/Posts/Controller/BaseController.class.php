<?php
namespace Posts\Controller;
use Think\Controller;

class BaseController extends Controller{
	public function _initialize(){
		$Account = new \Account\Controller\BaseController(); //需要验证登录
	}
}