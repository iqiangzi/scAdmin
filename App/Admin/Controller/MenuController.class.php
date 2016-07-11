<?php
namespace Admin\Controller;
use Think\Controller;

class MenuController extends AdminController{

	public function index(){
		$menuList = D('Category')->getTree(1);

		$this->assign('menuList', $menuList);
		$this->display();
	}

	public function add(){
		if (IS_POST) {
			return show(1,'添加菜单成功');
		} else {
			$menuList = D('Category')->getTree(1);
			$this->assign('menuList', $menuList);
			$this->display();
		}
	}

	
}