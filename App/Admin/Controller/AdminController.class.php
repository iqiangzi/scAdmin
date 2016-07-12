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
		$list = D('Category')->getTree(1, 1);
		return $list;
	}
} 