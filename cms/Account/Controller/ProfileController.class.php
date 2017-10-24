<?php
namespace Account\Controller;
use Think\Controller;

class ProfileController extends BaseController{
	public function index(){

		$UsersM = D('Users');
		$userData = $UsersM->currentUserProfile();//重新读取用户数据
		$this->assign('profile',$userData); //前台显示 用户信息

		$this->display();
	}
	//更新信息
	public function doEdit(){
		$id = $_SESSION['login_user']['user_id'];
		$data['display_name'] = $this->checkDisplayname(); //检查名字
		if(trim($_POST['password'])) $data['user_pass'] = $this->checkPass();//检查密码

		$UsersM = D('Users');
		$map['user_id'] = $id;
		$r = $UsersM->where($map)->data($data)->save(); //入库

		$user_data = $UsersM->where($map)->find();//读取数据
		$_SESSION['login_user'] = $user_data; //重置登录状态

		if($r) $this->success('保存成功'); //成功后跳转到列表页
		else $this->error('更新用户数据时出错！'); //出错

	}

	//检查名字
	private function checkDisplayname(){
		$name = trim($_POST['display_name']);
		if(!$name) $this->error('名字不能为空'); //检查名字是否为空
		if(strlen($name)<2) $this->error('名字长度不能小于2位'); //检查名字长度

		return $name; 
	}

	//检查密码
	private function checkPass(){
		$pass = trim($_POST['password']);
		if(!$pass) $this->error('密码不能为空'); 	//检查是否为空
		if(strlen($pass)<6) $this->error('密码长度不能小于6位数'); //检查密码长度

		return md5($pass);
	}
}