<?php
/*
 * 用户角色控制器
 * Auth   : 失策
 * Time   : 2016年07月14日 
 * QQ     : 664709989   
 * Email  : 664709989@qq.com
 * Site   : http://www.iamgpj.com/
 */
namespace Admin\Controller;
use Think\Controller;

class RolesController extends AdminController{
    //系统默认模型
    private $model;

    public function __construct(){
        parent::__construct();
        $this->model = D('Roles');
    }

    //列表(默认首页)
    public function index(){
        $map = array();

        if (IS_POST) { //筛选
            $name = I('post.name', '', 'trim');
            if ($name) {
                $map['name'] = $name;
                $this->assign('name', $name);
            }
        }
        $rolesList = $this->model->getRoles($map);
        $this->assign('rolesList', $rolesList);

        $this->display();
    }

    //添加
    public function add(){
        if (IS_POST) {
            $post = I('post.');
            $data = $this->model->create($post);
            if (!$data) {
                return show(300, $this->model->getError());
            } else {

                if ($data['id']) {   //编辑提交
                    $data['update_time'] = time();
                    $result = $this->model->where(array('id' => intval($post['id'])))->save($data);
                } else {        //添加提交
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
            //所有栏目
            $catList = D('Category')->getTree(1, 1);
            $this->assign('catList', $catList);
            $this->display();
        }
        
    }

    //编辑
    public function edit(){

        $id = I('get.id', 0, 'intval');
        if ($id == 0) {
            return show(300, '数据参数错误');
        } else {
            $info = $this->model->where(array('id' => $id))->find();
            if (!$info || empty($info)) {
                return show(300, '此数据不存在');
            } else {
                $this->assign('info', $info);
            }
        }

        $catList = D('Category')->getTree(1, 1);
        $this->assign('catList', $catList);

        $this->display();
    }

    //删除
    public function del(){
        $id = I('get.id', 0, 'intval');
        if ($id == 0) {
            return show(300, '数据参数错误');
        } else {
            $result = $this->model->delete($id);
            if (!$result) {
                return show(300, '删除数据失败');
            } else {
                return show(200, '删除数据成功');
            }
        }

        
    }
}