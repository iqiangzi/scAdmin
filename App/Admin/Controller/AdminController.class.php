<?php
namespace Admin\Controller;
use Think\Controller;

class AdminController extends Controller{

	public function __construct(){
		parent::__construct();
		if (!is_login()) {
			$this->redirect('Login/index');
		}
	}

	public function getMenu(){
		if (in_array(is_login(), array(1, 2))) {   //超级管理员
			$list = D('AuthRule')->getTree(1, 1);
		} else {
			$list = D('AuthRule')->getTree(1, 1, getAuthRules());
		}
		
		return $list;
	}
} 