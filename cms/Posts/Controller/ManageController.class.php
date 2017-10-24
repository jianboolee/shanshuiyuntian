<?php
namespace Posts\Controller;
use Think\Controller;

//每页显示文章数量
define('PER_PAGE',20); 

class ManageController extends BaseController{
	public function index(){
		//文章列表
		$status = "publish,draft"; //已发布的文章
		$page = $_GET['p'] ? $_GET['p'] :1; //当前页面

		$PostsM = D('Posts');
		$post_list = $PostsM->getPosts($status, $page.','.PER_PAGE); //获取文章列表
		$this->assign('posts',$post_list['data']); //前台显示文章内容

		//分页
		$Page = new \Think\Page($post_list['count'],PER_PAGE); //分页
		$this->assign('page',$Page->show()); //前台显示分页

		$this->display();
	}
	//移除到回收站
	public function moveToTrash(){
		$PostsM = D('Posts');
		
		$r = $PostsM->moveToTrash($_GET['id']);
		
		$this->redirect('Index');
	}

}


