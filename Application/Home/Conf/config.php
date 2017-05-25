<?php
return array(
	/* 数据库设置 */
    'DB_TYPE'               =>  'MYSQL',     // 数据库类型
    'DB_HOST'               =>  'Localhost', // 服务器地址
    'DB_NAME'               =>  'bookstore',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
   
    /*地址替换*/
	'TMPL_PARSE_STRING'=>array(
	'__UPLOAD__'=>__ROOT__.'/Public/Uploads',
    ),

);