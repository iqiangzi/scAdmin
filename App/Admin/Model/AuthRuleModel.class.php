<?php
/*
 * 菜单栏目模型类
 * Auth   : 失策
 * Time   : 2016年07月12日 
 * QQ     : 664709989   
 * Email  : 664709989@qq.com
 * Site   : http://www.iamgpj.com/
 */
namespace Admin\Model;
use Think\Model;

class AuthRuleModel extends Model{
	//模型默认表
	private $_db;

	public function __construct(){
		parent::__construct();
		$this->_db = M('auth_rule');
	}

	/**
	 * 获取栏目列表
	 * @param  [int]   $type     1:后台，0:前台
	 * @param  [int]   $status   1:开启，0:关闭
	 * @param  [array] $authRule 用户权限
	 * @return [array]          
	 */
	public function getCate($type=null, $status=null, $authRule=array()){
		$map = array();
		if (!is_null($type) && in_array($type, array(0, 1))) {
			$map['type'] = $type;
		}

		if (!is_null($status) && in_array($status, array(0, 1))) {
			$map['status'] = $status;
		}

		if (!empty($authRule)) {
			$map['id'] = array('in', $authRule);
		}

		$menuList = $this->_db->where($map)->order('sort, id')->select();
		return $menuList;
	}

	/**
	 * 获取指定栏目下格式化列表
	 * @param  [int]    $type      1:后台，0:前台
	 * @param  [int]    $status    1:开启，0:关闭
	 * @param  [array]  $authRule  用户权限
	 * @param  [string] $parent_id 父栏目ID
	 * @return [array]          
	 */
	public function getTree($type=null, $status=null, $authRule=array(), $parent_id=0){
		
		$menuList = $this->getCate($type, $status, $authRule);
		$result = tree($menuList, $parent_id);
		return $result;
	}

	//获取单行分类信息
	public function getInfo($id){
		$info = $this->_db->where(array('id' => $id))->find();
		return $info ? $info : array();
	}

	//检查父栏目是否正确选择
	public function checkPid($id, $pid) {
		$cateList = $this->getCate();
		$plist = ptree($cateList, $pid);
		foreach ($plist as $v) {
			if ($v['id'] == $id) {
				return false;
			}
		}

		return true;
	} 

}