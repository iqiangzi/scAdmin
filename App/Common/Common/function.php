<?php 

/**
 * 返回 json 数据
 * @param  [int] $status    0:失败，1:成功
 * @param  [string] $msg    返回信息
 * @param  [array] $data    其他信息
 * @return [json]         
 */
function show($status, $msg, $data=array()){
	$tmpArr = array(
			'status' => $status,
			'msg'    => $msg,
			'data'   => $data
		);

	exit(json_encode($tmpArr));
}

// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
function check_verify($code, $id = ''){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

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
