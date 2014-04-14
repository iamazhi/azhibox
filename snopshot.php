<?php
$url  = "http://www.baidu.com";
$out  = 'D:/taobao.png';
$path = 'D:/CutyCapt.exe';
$cmd  = "$path --url=$url --out=$out";
echo $cmd;
system($cmd);
?>

