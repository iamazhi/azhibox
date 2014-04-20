<?php
/**define('SMARTY_DIR','f:/Web/Smarty/libs/');
require(SMARTY_DIR.'Smarty.class.php');
define('__SITE_ROOT', 'f:/Web');
$smarty = new Smarty();
//$smarty->compile_check = true;
//$smarty->debugging = true;
$smarty->template_dir = __SITE_ROOT."./templates/";
$smarty->compile_dir  = __SITE_ROOT."./templates_c/";
$smarty->config_dir   = __SITE_ROOT."./configs/";
$smarty->cache_dir    = __SITE_ROOT."./cache/";
//$smarty->left_delimiter="<{"; 
//$smarty->right_delimiter="}>";
$smarty->assign("title","随碟附送打发士大夫");
$smarty->display('index.html');
**/?>
<?php
//define('SMARTY_DIR','f:/Web/Smarty/libs/');
require('./include/Smarty/libs/Smarty.class.php');
//define('__SITE_ROOT', 'f:/Web');
//$smarty = new Smarty();
//$smarty->compile_check = true;
//$smarty->debugging = true;
$smarty->template_dir = "./templates/";
$smarty->compile_dir  = "./templates_c/";
$smarty->config_dir   = "./configs/";
$smarty->cache_dir    = "./cache/";
//$smarty->left_delimiter="<{"; 
//$smarty->right_delimiter="}>";
?>