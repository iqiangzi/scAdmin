<?php
/*
 * 用户管理控制器
 * Auth   : 失策
 * Time   : 2016年07月12日 
 * QQ     : 664709989   
 * Email  : 664709989@qq.com
 * Site   : http://www.iamgpj.com/
 */
namespace Admin\Controller;
use Think\Controller;

class UserController extends AdminController{
	private $model;

	public function __construct(){
		parent::__construct();
		$this->model = D('Manager');
	}

	//首页-列表
	public function index(){

		$map = array();

		$name = I('get.name', '', 'trim');
		if ($name) {
			$map['username|nickname'] = $name;
			$this->assign('username', $name);
		}

		$pageCurr = I('get.pageCurrent', 1, 'intval');
		$pageSize = I('get.pageSize', 30, 'intval');

		$userList = $this->model->getUser($map, $pageCurr, $pageSize);
		$userCount = $this->model->getUserCount($map);

		$this->assign('userList', $userList)->assign('userCount', $userCount);
		$this->display();
	}

	//添加
	public function add(){
		if (IS_POST) {
			$post = I('post.');
			if (!empty($post['roles_id'])) {
				$post['roles_id'] = implode(',', $post['roles_id']);
			} else {
				$post['roles_id'] = '';
			}
			
			$data = $this->model->create($post);
			if (!$data) {
				return show(300, $this->model->getError());
			} else {
				if ($data['id']) {
					$data['update_time'] = time();
					if ($data['password']) {
						$data['password'] = getMd5($data['password']);
					} else {
						unset($data['password']);
					}
					$result = $this->model->where(array('id' => intval($data['id'])))->save($data);
				} else {
					$data['password'] = getMd5($data['password']);
					$data['create_time'] = time();
					$result = $this->model->add($data);
				}

				if (!$result) {
					return show(300, '操作失败');
				} else {
					return show(200, '操作成功', true);
				}
			}
		} else {
			$rolesList = D('Roles')->getRoles(array('status' => 1));
			$this->assign('rolesList', $rolesList);

			$this->display();
		}
	}

	//编辑
	public function edit(){
		$id = I('get.id', 0, 'intval');
		if ($id == 0) {
			return show(300, '数据参数错误');
		} 

		$info = $this->model->where(array('id' => $id))->find();
		if (!$info || empty($info)) {
            return show(300, '此数据不存在');
        } else {
            $this->assign('info', $info);
        }

        $rolesList = D('Roles')->getRoles(array('status' => 1));
		$this->assign('rolesList', $rolesList);
		
		$this->display();
	}

	public function del(){
		$id = I('get.id', 0, 'intval');
		if ($id == 0) {
			return show(300, '数据参数错误');
		} else {
			$result = $this->model->delete($id);
			if (!$result) {
				return show(300, '数据删除失败');
			} else {
				return show(200, '数据删除成功');
			}
		}
	}
}