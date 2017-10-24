<?php
namespace Posts\Controller;
use Think\Controller;

class EditController extends BaseController{
	public function _empty($name){
		$this->edit($name);
	}

	public function edit($name){
		$Posts = D('Posts');

		$post = $Posts->getPostByName($name);
		$this->assign('post',$post);

		$this->display('index');

	}

}


