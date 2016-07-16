<?php
/*
 * 用户角色模型类
 * Auth   : 失策
 * Time   : 2016年07月12日 
 * QQ     : 664709989   
 * Email  : 664709989@qq.com
 * Site   : http://www.iamgpj.com/
 */
namespace Admin\Model;
use Think\Model;

class AuthGroupModel extends Model{
	private $_db;
	//自动验证
	protected $_validate = array(
			array('name', 'require', '角色标题必须'),
			array('sort', 'number', '排序必须为数字'),
			array('status', array(0, 1), '状态所属区间错误', 1, 'in'),
		);

	public function __construct(){
		parent::__construct();
		$this->_db = M('auth_group');
	}

	//获取角色列表 $map => 查询条件
	public function getRoles($map=array()){
		$list = $this->_db->where($map)->order('sort, id')->select();
		return $list;
	}
}