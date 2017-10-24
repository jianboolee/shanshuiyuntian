<?php
namespace Api\Model;
use Think\Model;

class TermsModel extends Model{

	//常量定义
	const _TERM_MODEL = 'term';  //数据库表明

	//返回数据格式常量
	const _JSON_TERMS = 'terms';
	const _JSON_TERM = 'term';
	const _JSON_RESULT = 'result';


	//数据库字段常量
	const _ID = 'term_id';
	const _NAME = 'term_name';
	const _SLUG = 'term_slug';
	const _DESCRIPTION = 'term_description';
	const _COVER = 'term_cover';
	const _STATUS = 'term_status';
	const _PARENT = 'term_parent';

	//接收，返回 参数常量
	const _PARAM_ID = 'id';
	const _PARAM_NAME = 'name';
	const _PARAM_SLUG = 'slug';
	const _PARAM_DESCRIPTION = 'description';
	const _PARAM_COVER = 'cover';
	const _PARAM_STATUS = 'status';
	const _PARAM_PARENT = 'parent';

	const _PARAM_LEVEL = 'level';
	const _PARAM_HTML = 'html';
	const _PARAM_DEFAULT_HTML = '&nbsp;&nbsp;&nbsp;&nbsp;';


	//映射字段
	protected $_map = array(
			self::_PARAM_ID => self::_ID,
			self::_PARAM_NAME => self::_NAME,
			self::_PARAM_SLUG => self::_SLUG,
			self::_PARAM_DESCRIPTION => self::_DESCRIPTION,
			self::_PARAM_COVER => self::_COVER,
			self::_PARAM_STATUS => self::_STATUS,
			self::_PARAM_PARENT => self::_PARENT,
		);

	/**
	* 获取分类列表
	* @return array
	**/
	public function getList($param){

		$pid = $param[self::_PARAM_PARENT] ? $param[self::_PARAM_PARENT] : 0;

		//实例
		$TermsM = M(self::_TERM_MODEL);

		//处理查询
		$terms = $TermsM->select();
		

		//更新映射字段
		foreach ($terms as $value) {
			$termsData[] = $this->parseFieldsMap($value);
		}

		//无限极分类
		$r = self::unlimitedForLevel($termsData, self::_PARAM_DEFAULT_HTML, $pid);

		//返回的数据
		$result = ajaxResult(0);
		$result[self::_JSON_TERMS] = $r;

		return $result;

	}

	public function getPostCategory($param){


	}

	/**
	* 递归无限极分类
	**/
	static Public function unlimitedForLevel($cate, $html='--', $pid=0, $level=0){

		$arr = array();
		foreach ($cate as $v) {
			if($v[self::_PARAM_PARENT]==$pid){
				$v[self::_PARAM_LEVEL] = $level+1;
				$v[self::_PARAM_HTML] = str_repeat($html, $level);
				$arr[] = $v;
				$arr = array_merge($arr, self::unlimitedForLevel($cate, $html, $v['id'], $level+1));
			}
		}

		return $arr;
	}


	/**
	* 单条信息的详情
	* @param array
	* @return array
	**/
	public function getDetail($param){
		//ID
		if($param[self::_PARAM_ID]) $map[self::_ID] = $param[self::_PARAM_ID];

		//实例
		$TermsM = M(self::_TERM_MODEL);

		//处理查询
		$termData = $TermsM->where($map)->find();

		//映射字段
		$term = $this->parseFieldsMap($termData);

		//返回的数据
		$result = ajaxResult(0);
		$result[self::_JSON_TERM] = $term;

		return $result;
	}

	/**
	*更新单条数据
	* @param array
	* @return array
	**/
	public function doUpdate($param){

		//名字
		if($param[self::_PARAM_NAME]) $data[self::_NAME] = $param[self::_PARAM_NAME];

		

		//英文
		if($param[self::_PARAM_SLUG]) $data[self::_SLUG] = $param[self::_PARAM_SLUG];

		//描述
		if($param[self::_PARAM_DESCRIPTION]) $data[self::_DESCRIPTION] = $param[self::_PARAM_DESCRIPTION];

		//封面
		if($param[self::_PARAM_COVER]) $data[self::_COVER] = $param[self::_PARAM_COVER];

		//状态
		if($param[self::_PARAM_STATUS]) $data[self::_STATUS] = $param[self::_PARAM_STATUS];

		//父级
		if($param[self::_PARAM_PARENT]) $data[self::_PARENT] = $param[self::_PARAM_PARENT];

		//实例
		$TermsM = M(self::_TERM_MODEL);

		if($param[self::_PARAM_ID]){

			//ID
			$data[self::_ID] = $param[self::_PARAM_ID];

			//执行更新
			$saveResult = $TermsM->data($data)->save();

		}else{
			//执行添加
			$addResult = $TermsM->data($data)->add();
		}

		if($saveResult){
			//返回数据
			$result = ajaxResult(0);
			$result[self::_JSON_TERM] = array(self::_ID=>$param[self::_PARAM_ID]);
		}elseif($addResult){
			//返回数据
			$result = ajaxResult(0);
			$result[self::_JSON_TERM] = array(self::_ID=>$addResult);
		}else{
			$result = ajaxResult(2001);
		}

		return $result;

	}

	
	/**
	* 删除分类
	* @param array
	* @return array
	**/
	public function doRemove(){

		//处理参数
		if(is_array($param[self::_PARAM_ID])){
			//多个ID
			$ids = implode(',', $param[self::_PARAM_ID]); //数组转换成字符串
			$map[self::_ID] = array('in', $ids);

		}else{
			//单个ID
			$map[self::_ID] = $param[self::_PARAM_ID];
		}

		//实例
		$TermsM = M(self::_TERM_MODEL); 

		//执行删除
		$r = $TermsM->where($map)->delete(); //返回影响的行数

		//返回数据
		$result = ajaxResult(0);
		$result[self::_JSON_RESULT] = $r;  //影响的行数

		return $result;

	}

}