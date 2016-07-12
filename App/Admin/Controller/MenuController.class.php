<?php
namespace Admin\Controller;
use Think\Controller;

class MenuController extends AdminController{
	private $model;

	public function __construct(){
		parent::__construct();
		$this->model = D('Category');
	}

	public function index(){
		$menuList = $this->model->getTree(1);

		$this->assign('menuList', $menuList);
		$this->display();
	}

	public function add(){
		if (IS_POST) {
			$post = I('post.');
			if (!$post['title']) {
				return show(300, '菜单标题必须填写');
			}

			if ($post['id']) {  //编辑菜单
				if (!$this->model->checkPid($post['id'], $post['pid'])) {
					return show(300, '上级栏目错误');
				}

				$post['update_time'] = time();
				$result = $this->model->where(array('id' => $post['id']))->save($post);
			} else {   //添加菜单
				$post['create_time'] = time();
				$result = $this->model->add($post);
			}
			
			if (!$result) {
				return show(300, '操作菜单失败');
			} else {
				return show(200, '操作菜单成功');
			}
		} else {
			$menuList = $this->model->getTree(1);
			$this->assign('menuList', $menuList);
			$this->display();
		}
	}

	public function edit(){
		$menuList = $this->model->getTree(1);
		$this->assign('menuList', $menuList);

		$id = I('get.id', 0, 'intval');
		if ($id == 0) {
			return show(300, '数据参数错误');
		}

		$info = $this->model->getInfo($id);
		if (empty($info)) {
			return show(300, '此项数据为空');
		} else{
			if ($info['pid'] != 0) {
				$parent_info = $this->model->getInfo($info['pid']);
				$info['ptitle'] = $parent_info['title']; 
			}
			$this->assign('info', $info);
		}
		
		$this->display();
		
	}

	public function del(){
		$id = I('get.id', 0, 'intval');
		if ($id == 0) {
			return show(300, '数据参数错误');
		}
		$result = $this->model->delete($id);
		if (!$result) {
			return show(300, '删除数据失败');
		} else {
			return show(200, '删除数据成功');
		}
	}

	
}