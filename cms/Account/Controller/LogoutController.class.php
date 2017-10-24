<?php
namespace Account\Controller;
use Think\Controller;
class LogoutController extends Controller{
	public function _initialize(){
		session(null); // 清空SESSION
		cookie(null);
		$this->redirect('/Account/Login'); //跳转到根目录
	}
}