<?php
define('CURRENT_USER', 'current_user');

return array(

//数据库配置信息
'DB_TYPE'   => 'mysql', // 数据库类型
'DB_HOST'   => 'localhost', // 服务器地址
'DB_NAME'   => 'me_cms', // 数据库名
'DB_USER'   => 'root', // 用户名
'DB_PWD'    => 'root', // 密码
'DB_PORT'   => 3306, // 端口
'DB_PREFIX' => 'jb_', // 数据库表前缀 
'DB_CHARSET'=> 'utf8', // 字符集

//模板路径
'TMPL_PARSE_STRING'  =>array(
		 '__STATIC__'     => __ROOT__.'/static', // 增加新的JS类库路径替换规则
		 '__ATTACHMENT__' => __ROOT__.'/attachment', // 增加新的上传路径替换规则
	),

//站点信息
'SITE_INFO'=>array(
		'name'=>'后台管理'
		,'beian'=>''
		,'copy'=> '2012-'.date('Y')
		,'author'=>'Jianbo'
		,'author_blog'=>'http://jianbo.me'
	),

'ACCESS_KEY'=>'0b454310b1ee2c902eb90bf02b5cf0bc',
);