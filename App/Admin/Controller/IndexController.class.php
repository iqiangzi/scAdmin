<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends AdminController {

    public function index(){
    	$menuList = $this->getMenu();
    	//print_r($menuList);
    	$this->assign('menuList', $menuList);
        $this->display();
    }


    public function index_layout(){

    	$this->display();
    }
}