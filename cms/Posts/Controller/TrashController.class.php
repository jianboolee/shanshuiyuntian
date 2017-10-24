<?php
namespace Posts\Controller;
use Think\Controller;

//每页显示文章数量
define('PER_PAGE',20); 

class TrashController extends BaseController{
	public function index(){
		//回收站 文章列表
		$status = "trash"; //文章状态为 回收站
		$page = $_GET['p'] ? $_GET['p'] :1; //当前页码

		$PostsM = D('Posts');
		$post_list = $PostsM->getPosts($status, $page.','.PER_PAGE); //获取文章列表
		$this->assign('posts',$post_list['data']); //在前台显示 回收站 的文章

		//分页
		$Page = new \Think\Page($post_list['count'],PER_PAGE); //分页
		$this->assign('page',$Page->show()); //前台显示分页

		$this->display();
	}

	/**
	* 放到发布箱
	**/
	public function moveToPublish(){
		$PostsM = D('Posts');

		$PostsM->moveToPublish($_GET['id']);

		$this->redirect('Index');

	}
	/**
	* 彻底删除
	**/
	public function remove(){
		$PostsM = D('Posts');

		$PostsM->remove($_GET['id']);

		$this->redirect('Index');
	}

}


