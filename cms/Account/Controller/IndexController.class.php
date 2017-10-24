<?php
namespace Account\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        $this->redirect(__APP__.'/Account/Profile'); //跳转到我的资料页
    }
}