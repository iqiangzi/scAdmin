<?php
namespace Admin\Model;
use Think\Model;

class ManagerModel extends Model{
	private $_db;

	public function __construct(){
		parent::__construct();
		$this->_db = M('manager');
	}

	public function getUser($data=array(), $pageCurr=1, $pageSize=10){
		$offset = ($pageCurr - 1) * $pageSize;
		$list = $this->_db->where($data)->limit($offset, $pageSize)->select();
		return $list;
	}

	public function getUserCount($data=array()){
		$count = $this->_db->where($data)->count();
		return $count;
	}
}