<?php
namespace Admin\Controller;
use Think\Controller;

class PostController extends BaseController{
	const _POST_MODEL = 'post'; //对应Model的名字
	const _TERM_MODEL = 'term';

	public function index(){
		$PostM = D(self::_POST_MODEL);

		//文章列表
		$param = array(
				//标题
				$PostM::_PARAM_TITLE => $_GET[$PostM::_PARAM_TITLE],

				//状态
				$PostM::_PARAM_STATUS => $_GET[$PostM::_PARAM_STATUS] ? $_GET[$PostM::_PARAM_STATUS] : $PostM::_STATUS_PUBLISH,

				//作者
				$PostM::_PARAM_AUTHOR => $_GET[$PostM::_PARAM_AUTHOR],

				//页码
				$PostM::_PARAM_PAGE => $_GET[$PostM::_PARAM_PAGE],

				//每页显示多少条
				$PostM::_PARAM_PERPAGE => $_GET[$PostM::_PARAM_PERPAGE],

				//排序
				$PostM::_PARAM_ORDER_BY => $_GET[$PostM::_PARAM_ORDER_BY],

				//排序方式
				$PostM::_PARAM_ORDER => $_GET[$PostM::_PARAM_ORDER],

				//分类ID
				$PostM::_PARAM_CATEGORY => $_GET[$PostM::_PARAM_CATEGORY],

				//TAG
				$PostM::_PARAM_TAG => $_GET[$PostM::_PARAM_TAG],
			);

		//前端显示: 参数
		$this->param = $param;

		//文章数据
		$data = $PostM->getList($param);

		//前端显示: 文章列表
		$this->posts = $data[$PostM::_PARAM_POSTS];

		//分类
		$TermM = D(self::_TERM_MODEL);

		//前端显示: 分类列表
		$this->category = $TermM->getList();

		//分页
		$perpage = $param[$PostM::_PARAM_PERPAGE] ? $param[$PostM::_PARAM_PERPAGE] : $PostM::_DEFAULT_PERPAGE;

		$Page       = new \Think\Page($data[$PostM::_PARAM_COUNT], $perpage);// 实例化分页类 传入总记录数和每页显示的记录数

		$this->page = $Page->show();

		$this->display();
	}

	public function add(){

		//分类
		$TermM = D(self::_TERM_MODEL);

		//前端显示: 分类列表
		$this->category = $TermM->getList();

		$this->display();
	}

	public function edit(){
		$PostM = D(self::_POST_MODEL);

		//添加，更新文章
		$param = array(
				//ID
				$PostM::_PARAM_ID => $_GET[$PostM::_PARAM_ID], 
			);

		//前端显示：文章内容
		$this->post = $PostM->getDetail($param);

		//分类
		$TermM = D(self::_TERM_MODEL);

		//前端显示: 分类列表
		$this->category = $TermM->getList();

		$this->display('add');
	}

	public function doSave(){

		$PostM = D(self::_POST_MODEL);

		//添加，更新文章
		$param = array(
			//ID
			$PostM::_PARAM_ID => $_POST[$PostM::_PARAM_ID], 

			//标题
			$PostM::_PARAM_TITLE => $_POST[$PostM::_PARAM_TITLE], 

			//内容
			$PostM::_PARAM_CONTENT => $_POST[$PostM::_PARAM_CONTENT], 

			//摘要
			$PostM::_PARAM_EXCERPT => $_POST[$PostM::_PARAM_EXCERPT], 

			//封面
			$PostM::_PARAM_COVER => $_POST[$PostM::_PARAM_COVER],

			//缩略图
			$PostM::_PARAM_PICTURES => $_POST[$PostM::_PARAM_PICTURES],

			//状态
			$PostM::_PARAM_STATUS => $_POST[$PostM::_PARAM_STATUS],

			//跳转
			$PostM::_PARAM_REDIRECT => $_POST[$PostM::_PARAM_REDIRECT],

			//分类
			$PostM::_PARAM_CATEGORY => $_POST[$PostM::_PARAM_CATEGORY],

			//TAG
			$PostM::_PARAM_TAG => $_POST[$PostM::_PARAM_TAG],

			);

		//执行更新, 返回文章ID
		$result = $PostM->doUpdate($param);

		//跳转到编辑页面
		$this->redirect('edit', array('id'=>$result));

	}


	public function doReset(){

		$PostM = D(self::_POST_MODEL);

		//批量更新文章设置
		$param = array(
			//ID
			$PostM::_PARAM_ID => $_POST[$PostM::_PARAM_ID], 

			//状态
			$PostM::_PARAM_STATUS => $_POST[$PostM::_PARAM_STATUS],

			//分类
			$PostM::_PARAM_CATEGORY => $_POST[$PostM::_PARAM_CATEGORY],

			//TAG
			$PostM::_PARAM_TAG => $_POST[$PostM::_PARAM_TAG],

			);

		//执行更新
		$result = $PostM->doReset($param);

		//跳转到文章列表页
		$this->redirect('index');

	}

}