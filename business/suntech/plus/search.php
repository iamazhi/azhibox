<?php 


$head['title'] = $keyword.'_'.$PHPSIN['sitename'];
$head['keywords'] = $get["keywords"];
$head['description'] = $get["description"];

include template('phpsin',"$file");
?>