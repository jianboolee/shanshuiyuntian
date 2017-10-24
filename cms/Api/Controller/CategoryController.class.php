<?php
namespace Api\Controller;
use Think\Controller;

class CategoryController extends Controller{

	//常量定义
	const _MODEL_NAME = 'Terms';  //Model的名字

	public function getList(){

		$TermsM = D(CategoryController::_MODEL_NAME);

		//分类列表
		$param = array(
			$TermsM::_PARAM_PARENT => $_GET[$TermsM::_PARAM_PARENT], //父级ID
			);
		//执行查询，分类列表
		$result = $TermsM->getList($param);

		$this->ajaxReturn($result? $result : ajaxResult(4));
	}



	public function getDetail(){

		$TermsM = D(CategoryController::_MODEL_NAME);

		//单个分类详细信息

		//参数 
		$param = array(
				//ID
				$TermsM::_PARAM_ID => $_GET[$TermsM::_PARAM_ID]
			);

		//执行查询，单个分类
		$result = $TermsM->getDetail($param);

		$this->ajaxReturn($result? $result : ajaxResult(4));
	}



	public function doSave(){

		$TermsM = D(CategoryController::_MODEL_NAME);

		//参数 
		$param = array(
				//ID
				$TermsM::_PARAM_ID => $_POST[$TermsM::_PARAM_ID],
				//名字
				$TermsM::_PARAM_NAME => $_POST[$TermsM::_PARAM_NAME],
				//英文
				$TermsM::_PARAM_SLUG => $_POST[$TermsM::_PARAM_SLUG],
				//描述
				$TermsM::_PARAM_DESCRIPTION => $_POST[$TermsM::_PARAM_DESCRIPTION],
				//封面
				$TermsM::_PARAM_COVER => $_POST[$TermsM::_PARAM_COVER],
				//状态
				$TermsM::_PARAM_STATUS => $_POST[$TermsM::_PARAM_STATUS],
				//父级
				$TermsM::_PARAM_PARENT => $_POST[$TermsM::_PARAM_PARENT],
			);

		//执行更新
		$result = $TermsM->doUpdate($param);

		$this->ajaxReturn($result? $result : ajaxResult(4));
	}



	public function doDelete(){

		$TermsM = D(CategoryController::_MODEL_NAME);

		//分类ID，[int, array]
		$param = array(
			//ID
			$TermsM::_PARAM_ID => $_GET[$TermsM::_PARAM_ID],

			);

		//执行删除
		$result = $TermsM->doRemove();

		$this->ajaxReturn($result? $result : ajaxResult(4));

	}
}