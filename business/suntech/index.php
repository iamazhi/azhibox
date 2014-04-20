<?php
require dirname(__FILE__).'/include/common.inc.php';
if(!$file)
{
$head['title'] = $PHPSIN['sitename'].'_'.$PHPSIN['meta_title'];
$head['keywords'] = $PHPSIN['meta_keywords'];
$head['description'] = $PHPSIN['meta_description'];
$head['icpno'] = $PHPSIN['icpno'];
$head['copyright'] = $PHPSIN['copyright'];
include template('phpsin',"index");
}
else
{
include "plus/".($file.".php");
}
?>
