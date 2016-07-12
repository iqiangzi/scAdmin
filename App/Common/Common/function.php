<?php 

/**
 * 返回 json 数据
 * @param  [int] $status    300:失败，200:成功
 * @param  [string] $msg    返回信息
 * @param  [array] $data    其他信息
 * @return [json]         
 */
function show($status, $msg, $closeCurrent=false, $data=array()){
	
	$tmpArr = array(
			'statusCode' => $status,
			'message'    => $msg,
			'closeCurrent' => $closeCurrent
		);
	$tmpArr = array_merge($tmpArr, $data);
	exit(json_encode($tmpArr));
}

// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
function check_verify($code, $id = ''){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

//md5 加密密码
function getMd5($password){
	return md5($password . C('PASSWORD'));
}

/**
 * 检测用户是否登录
 * @return integer 0-未登录，大于0-当前登录用户ID
 */
function is_login(){
    $mid = session('mid');
    return $mid ? $mid : 0;
}

/**
 * 读取子孙树
 * @param  array   $list 栏目列表
 * @param  integer $pid  父栏目ID
 * @param  integer $lev  分级
 * @return array
 */
function tree($list, $id=0, $lev=1){
	$tmpArr = array();
	foreach ($list as $k => $v) {
		if ($v['pid'] == $id) {
			$v['lev'] = $lev;
			$tmpArr[] = $v;
			
			$tmpArr = array_merge($tmpArr, tree($list, $v['id'], $lev+1));
		}
	}
	
	return $tmpArr;
} 

/**
 * 获取族谱数
 * @param  [array] $list 栏目列表
 * @param  [integer] $id   栏目ID
 * @return [array]
 */
function ptree($list, $id) {
	$tmpArr = array();
	foreach ($list as $v) {
		if ($v['id'] == $id) {
			$tmpArr[] = $v;

			$tmpArr = array_merge($tmpArr, ptree($list, $v['pid']));
		}
	}
	return $tmpArr;
}

function showStatus($status){
	if ($status == 1) {
		$str = '<i style="color:green" class="fa fa-check" aria-hidden="true"></i>';
	} else {
		$str = '<i style="color:red" class="fa fa-times" aria-hidden="true"></i>';
	}
	return $str;
}
