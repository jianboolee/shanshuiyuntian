<?php
namespace Admin\Controller;
use Think\Controller;

class CategoryController extends BaseController{

	//常量
	const _TERM_MODEL = 'Term';

	public function index(){
		//分类模型
		$TermM = D(self::_TERM_MODEL);
		
		//分类列表
		$this->categorise = $TermM->getList();

		//显示模板
		$this->display();
	}

	public function add(){
		//分类模型
		$TermM = D(self::_TERM_MODEL);

		//父级
		$this->parent = $_GET[$TermM::_PARAM_PARENT];
		
		//分类列表
		$this->categorise = $TermM->getList();


		$this->display();
	}

	public function edit(){
		//分类模型
		$TermM = D(self::_TERM_MODEL);

		$param = array(
				//ID
				$TermM::_PARAM_ID => $_GET[$TermM::_PARAM_ID],
			);

		//分类列表
		$this->categorise = $TermM->getList();

		//分类信息
		$this->category = $TermM->getDetail($param);

		$this->display();
	}

	public function remove(){
		//分类模型
		$TermM = D(self::_TERM_MODEL);

		$param = array(
				//ID
				$TermM::_PARAM_ID => $_GET[$TermM::_PARAM_ID],
			);
		$TermM->doRemove($param);

		$this->redirect('index');
	}

	public function doSave(){
		//分类模型
		$TermM = D(self::_TERM_MODEL);

		//参数 
		$param = array(
				//ID
				$TermM::_PARAM_ID => $_POST[$TermM::_PARAM_ID],
				//名字
				$TermM::_PARAM_NAME => $_POST[$TermM::_PARAM_NAME],
				//英文
				$TermM::_PARAM_SLUG => $_POST[$TermM::_PARAM_SLUG],
				//描述
				$TermM::_PARAM_DESCRIPTION => $_POST[$TermM::_PARAM_DESCRIPTION],
				//跳转至外部链接
				$TermM::_PARAM_REDIRECT => $_POST[$TermM::_PARAM_REDIRECT],
				//封面
				$TermM::_PARAM_COVER => $_POST[$TermM::_PARAM_COVER],
				//状态
				$TermM::_PARAM_STATUS => $_POST[$TermM::_PARAM_STATUS],
				//父级
				$TermM::_PARAM_PARENT => $_POST[$TermM::_PARAM_PARENT],
			);

		//执行更新
		$result = $TermM->doUpdate($param);

		$this->redirect('index');
	}
}