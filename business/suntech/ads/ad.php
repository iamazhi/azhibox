<?php
require '../include/common.inc.php';
require PHP_ROOT."ads/include/global.func.php";
require CLASS_PATH."ads_place.class.php";

$place = new place();
$year = date('ym',TIME);
$table_status = $db->table_status(DB_PRE.'ads_'.$year);
if(!$table_status) {
	
	include 'include/create.table.php';
}

$place->show($id);//show  placeоб
//echo "sdf";
?>