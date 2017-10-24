<?php
namespace Account\Controller;
use Think\Controller;

class BaseController extends Controller{
	public function _initialize(){
		if(!session(CURRENT_USER)) $this->redirect("/".__ROOT__.'/Account/Login'); //未登录跳转到登录页面
		else $this->assign(CURRENT_USER,session(CURRENT_USER)); //显示登录用户信息

		$this->assign('site',C('SITE_INFO')); //站点信息
	}
}