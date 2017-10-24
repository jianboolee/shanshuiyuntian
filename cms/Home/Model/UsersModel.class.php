<?php
namespace Admin\Model;
use Think\Model;

class UsersModel extends Model{
	/**
	* 用户登录
	* @return Boolean
	**/

	//登录时查询的字段
	protected $_login_field = array(
		'user_id' // 用户ID
		,'user_email' //邮箱
		,'user_status' //状态
		,'display_name' //前台显示的名字
		,'user_group' //用户组
		);

	/**
	* 判断是否为合法用户
	* @param string email
	* @param string password
	* @return boolean
	**/
	public function doLogin($email,$password){
		$Users = D('Users');

		$map['user_email'] = trim($email); //邮箱
		$map['user_pass'] = md5(trim($password)); //密码

		$r = $Users->field($this->_login_field)->where($map)->find(); // 查询用户
		
		if($r){
			$_SESSION[LOGIN_NAME] = $r;  // 设置SESSION
			return $r; //返回用户信息
		}  
		return false;
	}


	/**
	* 添加用户
	* @param array 
	* @return int
	**/
	public function doAdd($data){
		$Users = D('Users');

		return $Users->data($data)->add();
	}
}