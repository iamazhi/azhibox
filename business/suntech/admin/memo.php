<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
require PHP_ROOT."include/memo.class.php";
$memo = new memo();
switch($action)
{
    case 'get':
		echo $memo->mtime().$memo->get();
		break;
    case 'set':
		$memo->set($data);
	    echo $memo->mtime();
		break;
    case 'mtime':
		echo $memo->mtime();
		break;
}
?>