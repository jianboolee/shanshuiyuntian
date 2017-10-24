<?php
namespace Api\Controller;
use Think\Controller;


class PostController extends Controller{

	const _MODEL_NAME = 'posts'; //对应Model的名字

	/**
	* 获取单条内容
	* @param int id || string ids
	* 例如：?id=10
	* @return json
	**/
	public function getDetail(){

		$PostsM = D(self::_MODEL_NAME);

		//文章ID
		$id = $_GET[$PostsM::_PARAM_ID];

		//执行查询
		$result = $PostsM->getDetail($id);

		$this->ajaxReturn($result? $result : ajaxResult(4));
	}

	/**
	* 根据分类获取文章列表
	* @param int categroy
	* 例如: ?categroy=1
	* @return json
	**/
	public function getList(){

		$PostsM = D(self::_MODEL_NAME);

		//文章列表
		$param = array(
				//标题
				$PostsM::_PARAM_TITLE => $_GET[$PostsM::_PARAM_TITLE],

				//状态
				$PostsM::_PARAM_STATUS => $_GET[$PostsM::_PARAM_STATUS],

				//作者
				$PostsM::_PARAM_AUTHOR => $_GET[$PostsM::_PARAM_AUTHOR],

				//页码
				$PostsM::_PARAM_PAGE => $_GET[$PostsM::_PARAM_PAGE],

				//每页显示多少条
				$PostsM::_PARAM_PERPAGE => $_GET[$PostsM::_PARAM_PERPAGE],

				//排序
				$PostsM::_PARAM_ORDER_BY => $_GET[$PostsM::_PARAM_ORDER_BY],

				//排序方式
				$PostsM::_PARAM_ORDER => $_GET[$PostsM::_PARAM_ORDER],

				//分类ID
				$PostsM::_PARAM_TERM => $_GET[$PostsM::_PARAM_TERM],

				//TAG
				$PostsM::_PARAM_TAG => $_GET[$PostsM::_PARAM_TAG],
			);

		//执行查询
		$result = $PostsM->getList($param);

		$this->ajaxReturn($result? $result : ajaxResult(4));

	}

	public function doSave(){

		$PostsM = D(self::_MODEL_NAME);

		//添加，更新文章
		$param = array(
			//ID
			$PostsM::_PARAM_ID => $_POST[$PostsM::_PARAM_ID], 

			//标题
			$PostsM::_PARAM_TITLE => $_POST[$PostsM::_PARAM_TITLE], 

			//内容
			$PostsM::_PARAM_CONTENT => $_POST[$PostsM::_PARAM_CONTENT], 

			//摘要
			$PostsM::_PARAM_EXCERPT => $_POST[$PostsM::_PARAM_EXCERPT], 

			//封面
			$PostsM::_PARAM_COVER => $_POST[$PostsM::_PARAM_COVER],

			//状态
			$PostsM::_PARAM_STATUS => $_POST[$PostsM::_PARAM_STATUS],

			//分类
			$PostsM::_PARAM_TERM => $_POST[$PostsM::_PARAM_TERM],

			//TAG
			$PostsM::_PARAM_TAG => $_POST[$PostsM::_PARAM_TAG],

			);

		//执行更新
		$result = $PostsM->doUpdate($param);

		$this->ajaxReturn($result? $result : ajaxResult(4));

	}

	public function doReset(){

		$PostsM = D(self::_MODEL_NAME);

		//批量更新文章设置
		$param = array(
			//ID
			$PostsM::_PARAM_ID => $_POST[$PostsM::_PARAM_ID], 

			//状态
			$PostsM::_PARAM_STATUS => $_POST[$PostsM::_PARAM_STATUS],

			//分类
			$PostsM::_PARAM_TERM => $_POST[$PostsM::_PARAM_TERM],

			//TAG
			$PostsM::_PARAM_TAG => $_POST[$PostsM::_PARAM_TAG],

			);
		//执行更新
		$result = $PostsM->doReset($param);

		$this->ajaxReturn($result? $result : ajaxResult(4));
	}
	

	public function doDelete(){
		$PostsM = D(self::_MODEL_NAME);

		//参数
		$param = array(
				//ID, [int, array]
				$PostsM::_PARAM_ID => $_POST[$PostsM::_PARAM_ID],
			);

		//执行删除
		$result = $PostsM->doRemove($param);

		$this->ajaxReturn($result? $result : ajaxResult(4));
	}

}