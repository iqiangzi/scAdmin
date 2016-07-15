<?php
/*
 * 数据库备份还原模型
 * Auth : 失策
 * Time : 2016-07-15
 * QQ : 664709989
 * Email : 664709989@qq.com
 * Site : http://www.iamgpj.com/
 */
namespace Common\Libs;
use Think\Db;

class Database{
	//文件指针
	private $fp;

	//备份文件信息 part - 卷号，name - 文件名
	private $file;

	//当前打开文件大小
	private $size = 0;

	//备份配置
	private $config;

	/**
	 * 数据库备份构造方法
	 * @param array $file   备份或还原的文件信息
	 * @param array $config 备份配置信息
	 * @param string $type  执行类型 bak => 备份数据; back => 还原数据
	 */
	public function __construct($file, $config, $type='bak'){
		$this->file = $file;
		$this->config = $config;
	}

	/**
	 * 打开一个卷, 用于写入数据
	 * @param  int $size 写入数据的大小
	 * @return [type]       [description]
	 */
	private function open($size){

	}

}