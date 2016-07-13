<?php

namespace Admin\Controller;
use Think\Controller;

class UserController extends AdminController{
	private $model;

	public function __construct(){
		parent::__construct();
		$this->model = D('Manager');
	}

	public function index(){
		$map = array();

		$name = I('get.name', '', 'trim');
		if ($name) {
			$map['username|nickname'] = $name;
		}

		$pageCurr = I('get.pageCurrent', 1, 'intval');
		$pageSize = I('get.pageSize', 30, 'intval');

		$userList = $this->model->getUser($map, $pageCurr, $pageSize);
		$userCount = $this->model->getUserCount($map);

		$this->assign('userList', $userList)->assign('userCount', $userCount);
		$this->display();
	} 
}