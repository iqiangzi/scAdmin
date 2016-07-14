<?php
namespace Admin\Controller;
use Think\Controller;

class ImageController extends AdminController{
	
	const UPLOAD = '/Public/';

	public function uploadOne(){

		$config = array(    
			'maxSize'    =>    3145728,
			'rootPath'   =>    '.'.self::UPLOAD,
			'savePath'   =>    'Uploads/',    
			'saveName'   =>    array('uniqid',''),    
			'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),    
			'autoSub'    =>    true,    
			'subName'    =>    array('date','Y/m/d'),
		);

		$upload = new \Think\Upload($config);// 实例化上传类     
		$info   =   $upload->uploadOne($_FILES['file']);    
		if(!$info) {// 上传错误提示错误信息        
			return show(300, $upload->getError());
		}else{// 上传成功        
			$pathName = self::UPLOAD.'/'.$info['savepath'].$info['savename'];
			return show(200, '上传成功', false, array('filename' => $pathName));
		}
	}
}