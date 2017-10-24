<?php
namespace Admin\Controller;
use Think\Controller;

class UploadController extends Controller{
	public function index(){

		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath  =     'attachment/'; // 设置附件上传目录
		// 上传单个文件 
		$info   =   $upload->uploadOne($_FILES['Filedata']);
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{// 上传成功 获取上传文件信息
			echo $info['savepath'].$info['savename'];
		}
	}

	public function imageUpload(){

		$type = $_REQUEST['type'];
    	$editorId=$_GET['editorid'];

		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->subName   =  	 array('date', 'Y/m/d'); //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
		$upload->rootPath  =	 './attachment';
		$upload->savePath  =     '/'; // 设置附件上传目录
		// 上传单个文件 
		$info   =   $upload->uploadOne($_FILES['upfile']);
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}
		if($type == "ajax"){// 上传成功 获取上传文件信息
			echo $info['savepath'].$info['savename'];
		}else{
			$url = $upload->rootPath.$info['savepath'].$info['savename'];
			echo "<script>parent.UM.getEditor('". $editorId ."').getWidgetCallback('image')('" . $url . "','SUCCESS')</script>";
		}

	}

	public function jqueryImageUpload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->subName   =  	 array('date', 'Y/m/d'); //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
		$upload->rootPath  =	 './attachment';
		$upload->savePath  =     '/'; // 设置附件上传目录
		// 上传单个文件 
		$info   =   $upload->uploadOne($_FILES['files']);
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{// 上传成功 获取上传文件信息
			
			$file = array(
				'name' => '',
				'url'=>	$upload->rootPath.$info['savepath'].$info['savename'],
				'site'=> $_SERVER['SERVER_NAME'].'/'.__ROOT__
				);
			$result  = array(
				'status'=>1,
				'file' => $file,
				'info' => $info
				);
			$this->ajaxReturn($result);
		}
	}
}