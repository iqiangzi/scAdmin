<?php
namespace Admin\Model;
use Think\Model;

class CategoryModel extends Model{
	private $_db;

	public function __construct(){
		parent::__construct();
		$this->_db = M('category');
	}

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