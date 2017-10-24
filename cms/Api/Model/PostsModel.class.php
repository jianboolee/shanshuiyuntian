<?php
namespace Api\Model;
use Think\Model;

class PostsModel extends Model{

	//数据库表名
	const _TABLE_NAME = 'posts';  

	//文章状态常量
	const _STATUS_PUBLISH = 'publish'; //公开
	const _STATUS_DRAFT = 'draft';  //草稿
	const _STATUS_TRASH = 'trash'; //回收站
	const _STATUS_DEFAULT = 'draft'; //默认，草稿
	
	//文章表字段常量
	const _ID = 'post_id'; //文章ID
	const _AUTHOR = 'post_author'; //发布者ID
	const _AUTHOR_NAME = 'post_author_name'; //发布者姓名
	const _DATE = 'post_date'; //发布时间
	const _CONTENT = 'post_content'; //内容
	const _TITLE = 'post_title'; //标题
	const _EXCERPT = 'post_excerpt'; //简介
	const _COVER = 'post_cover'; //封面图片地址
	const _STATUS = 'post_status'; //状态[publish,[draft,trash]]
	const _NAME = 'post_name'; //英文名字，用与做域名优化
	const _TERM = 'post_term'; //浏览次数
	const _MODIFIED = 'post_modified'; //最近更新时间
	const _TYPE = 'post_type'; //文章类型[]
	const _MIME_TYPE = 'post_mime_type'; //文章属性类型，['' [png,jpg,..]]
	const _COMMENT_COUNT = 'comment_count'; //回复总数
	const _VIEW_COUNT = 'view_count'; //浏览次数

	//参数常量，用于客户端输出的参数，和输入的参数
	const _PARAM_ID = 'id';
	const _PARAM_AUTHOR = 'author';
	const _PARAM_AUTHOR_NAME = 'authro_name';
	const _PARAM_DATE = 'date';
	const _PARAM_CONTENT = 'content';
	const _PARAM_TITLE = 'title';
	const _PARAM_EXCERPT = 'excerpt';
	const _PARAM_COVER = 'cover';
	const _PARAM_STATUS = 'status';
	const _PARAM_NAME = 'name';
	const _PARAM_TERM = 'category';
	const _PARAM_MODIFIED = 'modified';
	const _PARAM_TYPE = 'type';
	const _PARAM_MIME_TYPE = 'mime_type';
	const _PARAM_COMMENT = 'comment';
	const _PARAM_VIEW = 'view';

	//其它参数常量
	const _PARAM_IDS = 'ids';
	// const _PARAM_CATEGORY_ID = 'id'; //(int) 分类ID
	// const _PARAM_CATEGORY = 'category'; //(int) 分类ID
	const _PARAM_PERPAGE = 'perpage'; //(int) 每页显示多少条
	const _PARAM_PAGE = 'page'; //(int) 当前页码
	const _PARAM_ORDER_BY = 'orderby'; //(string) 排序
	const _PARAM_ORDER = 'order'; //(string)正序，倒叙。DESC , ASC
	const _PARAM_TAG = 'tag'; //(string) 标签

	//默认常量
	const _DEFAULT_PERPAGE = 20; //每页多少条
	const _MAX_PERPAGE = 200; //每次最多加载条目限制, 留空或设置为0 则表示不限制
	const _DEFAULT_ORDER_BY = self::_DATE; //默认排序字段， 缺省发布时间
	const _DEFAULT_ORDER = 'DESC'; //默认排序方式， 缺省倒叙

	//返回JSON的参数常量
	const _JSON_POSTS = 'posts';
	const _JSON_POST = 'post';
	const _JSON_RESULT = 'result';

	//关联表常量
	const _POST_TERM_MODEL = 'PostTerm';
	const _POST_TERM_PID = 'p_id';
	const _POST_TERM_TID = 't_id';

	//列表查询字段
	protected function _listField(){
		return self::_ID.','.
				self::_AUTHOR.','.
				self::_AUTHOR_NAME.','.
				self::_DATE.','.
				self::_TITLE.','.
				self::_EXCERPT.','.
				self::_COVER.','.
				self::_STATUS.','.
				self::_NAME.','.
				self::_TERM.','.
				self::_MODIFIED.','.
				self::_TYPE.','.
				self::_MIME_TYPE.','.
				self::_COMMENT_COUNT.','.
				self::_VIEW_COUNT;
	}


	//映射字段
	protected $_map = array(
			self::_PARAM_ID => self::_ID,
			self::_PARAM_AUTHOR => self::_AUTHOR,
			self::_PARAM_AUTHOR_NAME => self::_AUTHOR_NAME,
			self::_PARAM_DATE => self::_DATE,
			self::_PARAM_CONTENT => self::_CONTENT,
			self::_PARAM_TITLE => self::_TITLE,
			self::_PARAM_EXCERPT => self::_EXCERPT,
			self::_PARAM_COVER => self::_COVER,
			self::_PARAM_STATUS => self::_STATUS,
			self::_PARAM_NAME =>  self::_NAME,
			self::_PARAM_TERM =>  self::_TERM,
			self::_PARAM_MODIFIED  =>  self::_MODIFIED,
			self::_PARAM_TYPE  =>  self::_TYPE,
			self::_PARAM_MIME_TYPE  =>  self::_MIME_TYPE,
			self::_PARAM_COMMENT  =>  self::_COMMENT_COUNT,
			self::_PARAM_VIEW  =>  self::_VIEW_COUNT
		);


	/**
	* 获取单条内容
	* @param int id
	* @return array posts
	**/
	public function getDetail($id){
		if(!$id){
			//返回错误码，缺少ID
			$result = ajaxResult(1001); 

		}else{

			$PostsM = M(self::_TABLE_NAME);

			//读取文章内容
			$post = $PostsM->where($map)->find($id);

			//处理映射
			$postData = $this->parseFieldsMap($post);

			if(!$postData){
				//返回错误码，未找到文章
				$result = ajaxResult(1002); 

			}else{
				//返回文章内容
				$result = ajaxResult(0);
				$result[self::_JSON_POST] = $postData;	//当前文章
			}
		}

		return $result;
	}

	public function getList($param){

		$PostsM = M(self::_TABLE_NAME); 

		if($param[self::_PARAM_TAG]){
			//TAG表处理

		}

		//分类
		if($param[self::_PARAM_TERM]){
			//连表规则
			$join = '__POST_TERM__ ON '.self::_ID.'='.self::_POST_TERM_PID; 

			if(is_array($param[self::_PARAM_TERM])){
				//条件: t_id
				$tids = implode(',', $param[self::_PARAM_TERM]);
				$map[self::_POST_TERM_TID] = array('in',$tids); 
			}else{
				//条件: t_id
				$map[self::_POST_TERM_TID] = $param[self::_PARAM_TERM]; 
			}
		}

		
		// if($param[self::_PARAM_TERM]) $map[self::_TERM] =  $param[self::_PARAM_TERM];
		
		//标题，模糊查询
		if($param[self::_PARAM_TITLE]){
			$map[self::_TITLE]  = array('like','%'.$param[self::_PARAM_TITLE].'%');
		}

		//条件：状态
		if($param[self::_PARAM_STATUS]){

			if(is_array($param[self::_PARAM_STATUS])){
				//多个状态
				$mapStatus = implode(',', $param[self::_PARAM_STATUS]); //将数组转换成字符串
				$map[self::_STATUS]  = array('in',$param[self::_PARAM_STATUS]);
			}else{
				//单个状态
				$map[self::_STATUS]  = $param[self::_PARAM_STATUS];
			}

		}
		

		//条件：作者
		if($param[self::_PARAM_AUTHOR]){
			$map[self::_AUTHOR]  = $param[self::_PARAM_AUTHOR];
		}

		//每页显示条目数
		$perpage = $param[self::_PARAM_PERPAGE] ? $param[self::_PARAM_PERPAGE] : self::_DEFAULT_PERPAGE;


		//每页最大条目数限制
		if(self::_MAX_PERPAGE){
			$perpage = $parpage > self::_MAX_PERPAGE ? self::_MAX_PERPAGE : $perpage;
		}

		//页码
		$page = $param[self::_PARAM_PAGE] ? $param[self::_PARAM_PAGE] : 1;

		//排序
		$orderBy = $param[self::_PARAM_ORDER_BY] ? $this->_map[$param[self::_PARAM_ORDER_BY]] : self::_DEFAULT_ORDER_BY;
		
		//排序方式
		$order = $param[self::_PARAM_ORDER] ? $param[self::_PARAM_ORDER]  : self::_DEFAULT_ORDER;

		//查询的字段
		$field = $this->_listField();

		//获取文章列表
		$posts = $PostsM
						->field($field)
						->join($join)
						->where($map)
						->order($orderBy.' '.$order)
						->page($page.', '.$perpage)
						->select();

		//批量处理映射
		foreach ($posts as $value) {
			$postsData[] = $this->parseFieldsMap($value);
		}

		//返回文章列表
		$result = ajaxResult(0); 
		$result[self::_JSON_POSTS] = $postsData;	//文章列表

		return $result;
	}

	/**
	* 保存，添加单个文章
	* @param array
	* @return array
	**/

	public function doUpdate($param){

		//标题
		if($param[self::_PARAM_TITLE]) $data[self::_TITLE] = $param[self::_PARAM_TITLE];

		//内容有更新
		if($param[self::_PARAM_CONTENT]){

			 //内容
			$data[self::_CONTENT] = $param[self::_PARAM_CONTENT];

			//更新时间
			$data[self::_MODIFIED] = date('Y-m-d H:i:s'); //当前系统时间 
		} 

		//摘要
		if($param[self::_PARAM_EXCERPT]) $data[self::_EXCERPT] = $param[self::_PARAM_EXCERPT];

		//封面
		if($param[self::_PARAM_COVER]) $data[self::_TITLE] = $param[self::_PARAM_COVER];

		//状态
		if($param[self::_PARAM_STATUS]) $data[self::_STATUS] = $this->verifyStatus($param[self::_PARAM_STATUS]);
		
		

		//实例
		$PostsM = M(self::_TABLE_NAME); 

		if($param[self::_PARAM_ID]){

			//ID
			$data[self::_ID] = $param[self::_PARAM_ID];

			//提交更新
			$r = $PostsM->data($data)->save(); //影响的行数

			$postId = $param[self::_PARAM_ID]; //文章ID

		}else{ //添加

			//创建时间
			$data[self::_DATE] = date('Y-m-d H:i:s'); //当前系统时间 
			//更新时间
			$data[self::_MODIFIED] = date('Y-m-d H:i:s'); //当前系统时间 

			//执行新建
			$postId = $PostsM->data($data)->add(); //得到文章ID

		}

		//分类
		$PostTermM = D(self::_POST_TERM_MODEL);

		if($param[self::_PARAM_TERM]){

			//关联表参数
			$param = array(
				$PostTermM::_PARAM_POST_ID => $postId,
				$PostTermM::_PARAM_TERM_ID => $param[self::_PARAM_TERM]
				);

			//更新关联表
			$PostTermM->doUpdate($param);
		}

		//TAG
		if($param[self::_PARAM_TAG]) $tag = $param[self::_PARAM_TAG];


		//返回的数据
		$result = ajaxResult(0); //成功
		$result[self::_JSON_POST] = array(self::_PARAM_ID => $postId);  //文章ID
		return $result;
	}


	/**
	* 批量更新字段
	* @param array
	* @return array
	**/
	public function doReset($param){
		//处理参数
		if(is_array($param[self::_PARAM_ID])){
			//多个ID
			$ids = implode(',', $param[self::_PARAM_ID]); //数组转换成字符串
			$map[self::_ID] = array('in', $ids);

		}else{
			//单个ID
			$map[self::_ID] = $param[self::_PARAM_ID];
		}

		//状态
		if($param[self::_PARAM_STATUS]) $data[self::_STATUS] = $this->verifyStatus($param[self::_PARAM_STATUS]);

		//分类
		// if($param[self::_PARAM_TERM]) $data[self::_TERM] = $param[self::_PARAM_TERM];

		//分类
		$PostTermM = D(self::_POST_TERM_MODEL);

		if($param[self::_PARAM_TERM]){
			//关联表参数
			$param = array(
				$PostTermM::_PARAM_POST_ID => $param[self::_PARAM_ID],
				$PostTermM::_PARAM_TERM_ID => $param[self::_PARAM_TERM]
				);
			//更新关联表
			$PostTermM->doUpdate($param);
		}

		//TAG
		// if($param[self::_PARAM_TAG]) $tag = $param[self::_PARAM_TAG];

		//文章实例
		$PostsM = M(self::_TABLE_NAME); 

		//执行更新
		$r = $PostsM->where($map)->setField($data);

		//返回数据
		$result = ajaxResult(0);
		$result[self::_JSON_RESULT] = $r;  //影响的行数

		return $result;
	}

	/**
	* 删除文章
	* @param int || array 
	**/
	public function doRemove($param){

		//处理参数
		if(is_array($param[self::_PARAM_ID])){
			//多个ID
			$ids = implode(',', $param[self::_PARAM_ID]); //数组转换成字符串
			$map[self::_ID] = array('in', $ids);

		}else{
			//单个ID
			$map[self::_ID] = $param[self::_PARAM_ID];
		}

		//文章实例
		$PostsM = M(self::_TABLE_NAME); 

		//执行删除
		$r = $PostsM->where($map)->delete(); //返回影响的行数

		//删除文章关联表内容
		$PostTermM = D(self::_POST_TERM_MODEL);
		$postTermParam = array(
				$PostTermM::_PARAM_POST_ID => $param[self::_PARAM_ID], //文章ID
			);
		$PostTermM->doRemove($postTermParam);

		//返回数据
		$result = ajaxResult(0);
		$result[self::_JSON_RESULT] = $r;  //影响的行数

		return $result;
	}



	/**
	* 检查文章状态是否合法
	* @param string status
	* @return sting status
	**/
	protected function verifyStatus($status){

		//允许的状态
		$availableStatus = array(
				self::_STATUS_PUBLISH, 
				self::_STATUS_DRAFT,
				self::_STATUS_TRASH,
			);
		//返回当前状态
		if(in_array($status, $availableStatus)) return $status;

		//返回默认状态
		return self::_STATUS_DEFAULT;
	}

	/**
	* 浏览次数 +1
	* @param int id //post id
	**/
	public function plusViewNum($id){

		$PostsM = M(self::_TABLE_NAME); 

		//查询条件
		$map[self::_ID] = $id; //文章ID

		//处理 文章浏览次数 +1
		$PostsM->where($map)->setInc(self::_VIEW_COUNT); 
	}

}