<?php
namespace Account\Model;
use Think\Model;

class UsersModel extends Model{

	//常量
	const _USER_MODEL = 'user';

	//登录时查询的字段
	protected $_avaliableField = array(
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
		$Users = D(self::_USER_MODEL);

		$map['user_email'] = trim($email); //邮箱
		$map['user_pass'] = md5(trim($password)); //密码

		$r = $Users->field($this->_avaliableField)->where($map)->find(); // 查询用户
		
		session(CURRENT_USER, $r);  // 设置SESSION

		return $r; //返回用户信息
	}
	/**
	* 当前登录用户的资料
	* @return array
	**/
	public function currentUserProfile(){
		$Users = D(self::_USER_MODEL);

		$map['user_id'] = session(CURRENT_USER)['user_id']; //当前用户ID
		
		return $Users->field($this->_avaliableField)->where($map)->find(); //返回用户数据
	}

}