<?php
/*
 * 数据库管理控制器
 * Auth : 失策
 * Time : 2016-07-15
 * QQ : 664709989
 * Email : 664709989@qq.com
 * Site : http://www.iamgpj.com/
 */
namespace Admin\Controller;
use Think\Controller;

class DbController extends AdminController{

	//主页--列出所有数据表
	public function index(){
		$list = M()->query('SHOW TABLE STATUS');
		$list  = array_map('array_change_key_case', $list);

		$this->assign('list', $list);
		$this->display();
	}
}