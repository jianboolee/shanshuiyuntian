<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        $this->redirect('/Admin/Post'); //跳转到文章列表
    }
}