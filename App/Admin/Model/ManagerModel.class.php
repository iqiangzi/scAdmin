<?php
/*
 * 用户模型类
 * Auth   : 失策
 * Time   : 2016年07月12日 
 * QQ     : 664709989   
 * Email  : 664709989@qq.com
 * Site   : http://www.iamgpj.com/
 */
namespace Admin\Model;
use Think\Model;

class ManagerModel extends Model{
	private $_db;
	//自动验证
	protected $_validate = array(
			array('roles_id', 'require', '所属用户组必须'),
			array('username', 'require', '用户名必须'),
			array('nickname', 'require', '昵称/姓名必须'),
			array('password', 'require', '密码必须'),
			array('repassword','password','确认密码不正确',0,'confirm'),
			array('email', 'email', '邮箱格式错误', 2),
			array('mobile','/^1[3|4|5|7|8]\d{9}$/','手机号码错误！', 2, 'regex'),
			array('status', array(0, 1), '状态所属区间错误', 1, 'in'),
		);

	public function __construct(){
		parent::__construct();
		$this->_db = M('manager');
	}

	/**
	 * 获取用户分页列表
	 * @param  array   $data     条件
	 * @param  integer $pageCurr 当前页
	 * @param  integer $pageSize 每页条数
	 * @return array            
	 */
	public function getUser($data=array(), $pageCurr=1, $pageSize=10){
		$offset = ($pageCurr - 1) * $pageSize;
		$list = $this->_db->where($data)->limit($offset, $pageSize)->select();
		return $list;
	}

	/**
	 * 获取用户总条数
	 * @param  array  $data 条件
	 * @return int
	 */
	public function getUserCount($data=array()){
		$count = $this->_db->where($data)->count();
		return $count;
	}

}