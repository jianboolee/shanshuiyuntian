<?php
namespace Posts\Controller;
use Think\Controller;

class AddController extends BaseController{
	public function index(){
		$PostsM = D('Posts');

		//新建一篇文章
		$post_name = $PostsM->doAdd();

		//跳转到编辑页面
		$this->redirect('/Posts/Edit/'.$post_name);

	}

}


