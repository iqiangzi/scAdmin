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


function tree($list, $pid=0, $lev=1){
	$tmpArr = array();
	foreach ($list as $k => $v) {
		if ($v['pid'] == $pid) {
			$v['lev'] = $lev;
			$tmpArr[] = $v;
			
			$tmpArr = array_merge($tmpArr, tree($list, $v['id'], $lev+1));
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
