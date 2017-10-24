<?php
//JSON数据格式常量定义
define('_JSON_STATUS', 'status'); //状态码
define('_JSON_INFO', 'info'); //提示信息
define('_JSON_POST', 'post'); //文章
define('_JSON_POSTS', 'posts'); //文章列表

/**
* JSON返回数据格式状态码表
* @param intger status
* @return array 
**/
function ajaxResult($status){

	//错误信息字典
	$info = array(
		0 => 'success', //成功
		1 => 'unknown error', // 未知错误信息
		2 => 'access key is null!', //access key 为空
		3 => 'access key is not avaliable!', //access key 不可用
		4 => 'no result',
		1001 => 'post id is null!', // 文章ID为空
		1002 => 'can not find post, maybe it does not exist or is a draft or in trash.', // 找不到文章
		1003 => 'categroy id is null', //分类ID为空
		1004 => 'post ids is null', //文章的ids 为空
		1005 => 'add post error!',//添加文章出错
		1006 => 'unknown method !', //未知操作方法
		2001 => 'can not save, may be slug is exist, or nothing change',
		);

	//状态码
	$status = $status ? $status : 0;

	//返回的数据
	$result = array(
		_JSON_STATUS => $status,
		_JSON_INFO => $info[$status] ? $info[$status] : $info[1]
		);

	return $result;
}







