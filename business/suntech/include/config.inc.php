<?php

define('FILE_DIR', str_replace("\\", '/', dirname(__FILE__)));
define('MOBAN_DIR', str_replace("\\", '/', dirname(dirname(__FILE__))));


//模板相关配置
define('TPL_ROOT', PHP_ROOT.'templates/'); //模板保存物理路径
define('TPL_NAME', 'default'); //当前模板方案目录
define('TPL_CSS', 'web'); //当前样式目录
define('TPL_CACHEPATH', PHP_ROOT.'data/cache_template/'); //模板缓存物理路径
define('TPL_REFRESH', 1); //是否开启模板缓存自动刷新
define('TPL_STATUS', ''); //模板是否停用

//Session配置
define('SESSION_STORAGE', 'mysql'); //Session 存储方式（files, mysql, apc, eaccelerator, memcache, shmop）
define('SESSION_TTL', 1800); //Session 生命周期（秒）
define('SESSION_SAVEPATH', PHP_ROOT.'/data/sessions/'); //Session 保存路径（files）
define('SESSION_N', 0); //Session 文件分布的目录深度（files）

//网站路径配置
define('PHPWEB_PATH', '/'); //Phpweb框架访问路径，相对于域名

//数据存文本目录
define('CONTENT_ROOT', PHP_ROOT.'data/txt/'); //默认存储路径

//数据库配置信息
define('DB_HOST', 'db942.72dns.net'); //数据库服务器主机地址
define('DB_USER', 'suntech'); //数据库帐号
define('DB_PW', '0756zhh'); //数据库密码
define('DB_NAME', 'db_suntech'); //数据库名
define('DB_PRE', 'sin_'); //数据库表前缀，同一数据库安装多套Phpcms时，请修改表前缀
define('DB_CHARSET', 'gbk'); //数据库字符集
define('DB_PCONNECT', 0); //0 或1，是否使用持久连接
define('DB_DATABASE', 'mysql'); //数据库类型

//Cookie配置
define('COOKIE_DOMAIN', ''); //Cookie 作用域
define('COOKIE_PATH', '/'); //Cookie 作用路径
define('COOKIE_PRE', 'ZwMmPimUVy'); //Cookie 前缀，同一域名下安装多套Phpcms时，请修改Cookie前缀
define('COOKIE_TTL', 0); //Cookie 生命周期，0 表示随浏览器进程

//缓存配置
define('CACHE_STORAGE', 'files'); //Cache 存储方式（files, mysql, apc, eaccelerator, memcache, shmop）
define('CACHE_PATH', PHP_ROOT.'data/cache/'); //缓存默认存储路径
define('CACHE_MODEL_PATH', PHP_ROOT.'data/cache_model/'); //模型缓存存储路径
define('CHARSET', 'GB2312'); //网站字符集

//Ftp相关配置
define('FTP_ENABLE', 0); //Ftp主机
define('FTP_HOST', '127.0.0.1'); //Ftp主机
define('FTP_PORT', '21'); //Ftp端口
define('FTP_USER', ''); //Ftp帐号
define('FTP_PW', ''); //Ftp密码
define('FTP_PATH', '/'); //Ftp默认路径

//附件相关配置
define('UPLOAD_FRONT', 1); //是否允许前台上传附件
define('UPLOAD_ROOT', PHP_ROOT.'uploadfile/'); //附件保存物理路径
define('UPLOAD_FTP_ENABLE', 0); //Ftp附件主机
define('UPLOAD_URL', 'uploadfile/'); //附件目录访问路径
define('UPLOAD_ALLOWEXT', 'doc|docx|xls|ppt|wps|zip|rar|txt|jpg|jpeg|gif|bmp|swf|png'); //允许上传的文件后缀，多个后缀用“|”分隔
define('UPLOAD_MAXSIZE', 1024000); //允许上传的附件最大值
define('UPLOAD_MAXUPLOADS', 10000); //前台同一IP 24小时内允许上传附件的最大个数
define('UPLOAD_FUNC', 'copy'); //文件上传函数（copy, move_uploaded_file）

define('LANG', 'zh-cn'); //网站语言包
define('EXECUTION_SQL', '1'); //是否允许执行SQL        1=是 0=否[安全]

define('CHARSET', 'gbk'); //网站字符集
define('TIMEZONE', 'Etc/GMT-8'); //网站时区（只对php 5.1以上版本有效），Etc/GMT-8 实际表示的是 GMT+8

define('AUTH_KEY', 'rvqNSwciyuvEyqTvqPsY'); //Cookie密钥
?>
