<?php
namespace Account\Controller;
use Think\Controller;

class LoginController extends Controller{
	public function _initialize(){
		$this->assign('site',C('SITE_INFO')); //前端显示 站点信息
	}


	//登录页面
	public function index(){
		
		if(IS_POST) $this->doAdd(); //处理添加

		$this->display();
	}


	//处理添加
	private function doAdd(){
		$email  = trim($_POST['email']); // 邮箱
		$password = trim($_POST['password']); // 密码

		$UsersM = D('Users');
		$userInfo = $UsersM->doLogin($email,$password); //执行登录

		if($userInfo){
			$this->redirect("/".__ROOT__."/Admin"); //跳转到首页
		}
		else{
			$this->assign('email',$email); //前端赋值EMAIL
			$this->assign('error_msg',true); //错误
		}
	}


	/**
	* AJAX 判断是否已登录
	* @param string access_key
	* @return json
	**/
	public function check(){
		$access_key = $_GET['access_key'];

		if($access_key !=  C('ACCESS_KEY')){
			$result['info'] = 'access_key was wrong!'; //提示错误
		}else{
			$result[CURRENT_USER] = session(CURRENT_USER); //返回用户信息
		}
		
		$this->ajaxReturn($result);
	}
}
