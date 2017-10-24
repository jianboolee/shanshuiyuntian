<?php
namespace Posts\Model;
use Think\Model;
class PostsModel extends Model{
	/**
	* 获取文章列表
	* @param string status[publish, draft, trash]
	***/
	public function getPosts($status,$page,$key){
		$Posts = D('Posts');

		//文章状态
		if($status) $map['post_status'] =array('in',$status);
		//关键词
		if($key) $map['post_title'] = array('like','%'.$key.'%');
		//排序
		$order = 'post_date desc';
		//列表
		$r['data'] = $Posts->where($map)->order($order)->page($page)->select();
		//总数
		$r['count'] = $Posts->where($map)->count();
		//数据集
		return $r;
	}

	//添加文章
	public function doAdd(){
		$Posts = M('Posts');

		$data = array(
			'post_title'=>'未命名标题',
			'post_author'=>session(CURRENT_USER)['user_id'],
			'post_author_name'=>session(CURRENT_USER)['display_name'],
			'post_date'=>date('Y-m-d H:i:s'),
			'post_status'=>'draft',
			'post_modified'=>date('Y-m-d H:i:s'),
			'post_type'=>'post',
		);

		$r = $Posts->data($data)->add();

		$data['post_id'] = $r;
		$data['post_name'] = md5($r);

		$Posts->save($data);

		return $data['post_name'];
	}
	//根据文章名字字段获取文章内容
	public function getPostByName($name){
		$Posts = M('Posts');
		$map['post_name'] = $name;
		$r = $Posts->where($map)->find();
		return $r;
	}

	//根据ID获取文章
	public function getPostById($id){
		$Posts = D('Posts');
		$map['post_id'] = $id;
		$r = $Posts->where($map)->find();
		return $r;
	}

	//更新文章
	public function doUpdate($id,$data){

		$Posts = D('Posts');
		$post_data = $this->checkData($data);
		$map['post_id'] = $id;
		$r = $Posts->where($map)->data($post_data)->save();

		return $r;
	}

	//预处理数据
	public function checkData($data){
		$r = $data;
		$r['post_author'] = $_SESSION['login_user']['user_id'];
		$r['post_author_name'] = $_SESSION['login_user']['display_name'];
		$r['post_modified'] = date('Y-m-d H:i:s');

		return $r;
	}
	/**
	* 将文章放到回收站
	**/
	public function moveToTrash($pId){
		$PostsM = M('Posts'); //直接操作数据库

		$map['post_id'] = $pId;//文章ID

		//要更新的数据
		$data = array(
				'post_status'=>'trash',
			);

		return $PostsM->where($map)->setField($data);
	}


	/**
	* 将文章放到已发布
	**/
	public function moveToPublish($pId){
		$PostsM = M('Posts'); //直接操作数据库

		$map['post_id'] = $pId;//文章ID

		//要更新的数据
		$data = array(
				'post_status'=>'publish',
			);
		
		return $PostsM->where($map)->setField($data);
	}

	/**
	* 删除文章
	**/
	public function remove($pId){
		$PostsM = M('Posts'); //直接操作数据库

		$map['post_id'] = $pId;//文章ID

		return $PostsM->where($map)->delete();
	}

}