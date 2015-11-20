<?php
return array(
	//'配置项'=>'配置值'
	
    
    //设置默认主题目录
    'DEFAULT_THEME'=>'default',
    
    // 站点公共目录
    '__PUBLIC__'    =>  __ROOT__.'/Public',
    
    //页面Trace
    'SHOW_PAGE_TRACE' =>false,
    
    
    
    //修改定界符
    'TMPL_L_DELIM'=>'<{',
    'TMPL_R_DELIM'=>'}>',
    
    
    //mysql全局定义
    /*
     'DB_TYPE'=>'mysql',
     'DB_HOST'=>'localhost',
     'DB_USER'=>'root',
     'DB_PWD'=>'123456',
     'DB_NAME'=>'thinkphp',
     'DB_PORT'=>3306,
     'DB_PREFIX'=>'think_',
     */
    //PDO专用定义
    'DB_TYPE'=>'mysql',
    'DB_USER'=>'root',
    'DB_PWD'=>'',
    'DB_PREFIX'=>'smart_',
    'DB_DSN'=>'mysql:host=localhost;dbname=smartcms;charset=UTF8',
    
    //字段缓存
    'DB_FIELDS_CACHE'=>false
    
    
);