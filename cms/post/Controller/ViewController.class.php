<?php
namespace Post\Controller;
use Think\Controller;

class ViewController extends Controller{

	public function _empty($id){
		echo $id;
	}

}