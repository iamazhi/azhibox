<?php

define('FILE_DIR', str_replace("\\", '/', dirname(__FILE__)));
define('MOBAN_DIR', str_replace("\\", '/', dirname(dirname(__FILE__))));


//ģ���������
define('TPL_ROOT', PHP_ROOT.'templates/'); //ģ�屣������·��
define('TPL_NAME', 'default'); //��ǰģ�巽��Ŀ¼
define('TPL_CSS', 'web'); //��ǰ��ʽĿ¼
define('TPL_CACHEPATH', PHP_ROOT.'data/cache_template/'); //ģ�建������·��
define('TPL_REFRESH', 1); //�Ƿ���ģ�建���Զ�ˢ��
define('TPL_STATUS', ''); //ģ���Ƿ�ͣ��

//Session����
define('SESSION_STORAGE', 'mysql'); //Session �洢��ʽ��files, mysql, apc, eaccelerator, memcache, shmop��
define('SESSION_TTL', 1800); //Session �������ڣ��룩
define('SESSION_SAVEPATH', PHP_ROOT.'/data/sessions/'); //Session ����·����files��
define('SESSION_N', 0); //Session �ļ��ֲ���Ŀ¼��ȣ�files��

//��վ·������
define('PHPWEB_PATH', '/'); //Phpweb��ܷ���·�������������

//���ݴ��ı�Ŀ¼
define('CONTENT_ROOT', PHP_ROOT.'data/txt/'); //Ĭ�ϴ洢·��

//���ݿ�������Ϣ
define('DB_HOST', 'db942.72dns.net'); //���ݿ������������ַ
define('DB_USER', 'suntech'); //���ݿ��ʺ�
define('DB_PW', '0756zhh'); //���ݿ�����
define('DB_NAME', 'db_suntech'); //���ݿ���
define('DB_PRE', 'sin_'); //���ݿ��ǰ׺��ͬһ���ݿⰲװ����Phpcmsʱ�����޸ı�ǰ׺
define('DB_CHARSET', 'gbk'); //���ݿ��ַ���
define('DB_PCONNECT', 0); //0 ��1���Ƿ�ʹ�ó־�����
define('DB_DATABASE', 'mysql'); //���ݿ�����

//Cookie����
define('COOKIE_DOMAIN', ''); //Cookie ������
define('COOKIE_PATH', '/'); //Cookie ����·��
define('COOKIE_PRE', 'ZwMmPimUVy'); //Cookie ǰ׺��ͬһ�����°�װ����Phpcmsʱ�����޸�Cookieǰ׺
define('COOKIE_TTL', 0); //Cookie �������ڣ�0 ��ʾ�����������

//��������
define('CACHE_STORAGE', 'files'); //Cache �洢��ʽ��files, mysql, apc, eaccelerator, memcache, shmop��
define('CACHE_PATH', PHP_ROOT.'data/cache/'); //����Ĭ�ϴ洢·��
define('CACHE_MODEL_PATH', PHP_ROOT.'data/cache_model/'); //ģ�ͻ���洢·��
define('CHARSET', 'GB2312'); //��վ�ַ���

//Ftp�������
define('FTP_ENABLE', 0); //Ftp����
define('FTP_HOST', '127.0.0.1'); //Ftp����
define('FTP_PORT', '21'); //Ftp�˿�
define('FTP_USER', ''); //Ftp�ʺ�
define('FTP_PW', ''); //Ftp����
define('FTP_PATH', '/'); //FtpĬ��·��

//�����������
define('UPLOAD_FRONT', 1); //�Ƿ�����ǰ̨�ϴ�����
define('UPLOAD_ROOT', PHP_ROOT.'uploadfile/'); //������������·��
define('UPLOAD_FTP_ENABLE', 0); //Ftp��������
define('UPLOAD_URL', 'uploadfile/'); //����Ŀ¼����·��
define('UPLOAD_ALLOWEXT', 'doc|docx|xls|ppt|wps|zip|rar|txt|jpg|jpeg|gif|bmp|swf|png'); //�����ϴ����ļ���׺�������׺�á�|���ָ�
define('UPLOAD_MAXSIZE', 1024000); //�����ϴ��ĸ������ֵ
define('UPLOAD_MAXUPLOADS', 10000); //ǰ̨ͬһIP 24Сʱ�������ϴ�������������
define('UPLOAD_FUNC', 'copy'); //�ļ��ϴ�������copy, move_uploaded_file��

define('LANG', 'zh-cn'); //��վ���԰�
define('EXECUTION_SQL', '1'); //�Ƿ�����ִ��SQL        1=�� 0=��[��ȫ]

define('CHARSET', 'gbk'); //��վ�ַ���
define('TIMEZONE', 'Etc/GMT-8'); //��վʱ����ֻ��php 5.1���ϰ汾��Ч����Etc/GMT-8 ʵ�ʱ�ʾ���� GMT+8

define('AUTH_KEY', 'rvqNSwciyuvEyqTvqPsY'); //Cookie��Կ
?>
