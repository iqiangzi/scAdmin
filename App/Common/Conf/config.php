<?php
return array(
	//'配置项'=>'配置值'

	/* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__BJUI__' => __ROOT__ . '/Public/BJUI',
        '__ADMIN__' => __ROOT__ . '/Public/Admin',
        '__HOME__' => __ROOT__ . '/Public/Home',
    ),

    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'sc_admin',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'sc_',    // 数据库表前缀

    /* 个人配置 */
    'PASSWORD'   =>   'scAdmin',  //md5加密
    
    /* 权限配置 */
    'AUTH_ON'           => true,                 // 认证开关
    'AUTH_TYPE'         => 1,                    // 认证方式，1为实时认证；2为登录认证。
    'AUTH_GROUP'        => 'auth_group',         // 用户组数据表名
    'AUTH_GROUP_ACCESS' => 'auth_group_access',  // 用户-用户组关系表
    'AUTH_RULE'         => 'auth_rule',          // 权限规则表
    'AUTH_USER'         => 'manager',             // 管理员信息表
    'AUTH_KEY'          => 'uid',    //登录用户id
);