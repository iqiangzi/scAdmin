<?php
namespace Admin\Model;
use Think\Model;

class CategoryModel extends Model{
	private $_db;

	public function __construct(){
		parent::__construct();
		$this->_db = M('category');
	}

	public function getTree($type=null, $parent_id=0, $authRule=array()){
		$map = array('status' => 1);
		if (!is_null($type) && in_array($type, array(0, 1))) {
			$map['type'] = $type;
		}

		if (!empty($authRule)) {
			$map['id'] = array('in', $authRule);
		}

		$menuList = $this->_db->where($map)->order('sort, id')->select();
		$result = tree($menuList, $parent_id);
		return $result;
	}

}