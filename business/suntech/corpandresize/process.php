<?php
include("config.php");

//extract($_GET);

settype($x,'int');
settype($y,'int');
settype($w,'int');
settype($h,'int');
settype($iw,'int');
settype($ih,'int');
settype($pic,'string');

$pic = @trim($pic);
if(empty($pic)){
	printf("error:%s\n\n\n","1");
	//printf("������ʾ��%s","��ѡ����Ҫ���е�ͼƬ��");
	exit;
}
elseif(!preg_match(FILENAME_CHECK,$pic))
{
	printf("error:%s\n\n\n","2");
	//printf("������ʾ��%s","����ȷѡ����Ҫ��ͼƬ��");
	exit;
}

$imagecontent = @file_get_contents($pic);

if(!$imagecontent){
	printf("error:%s\n\n\n","3");
	//printf("������ʾ��%s","ͼƬ��ȡʧ��");
	exit;
}

if(strlen($imagecontent)<1024){
	printf("error:%s\n\n\n","4");
	//printf("������ʾ��%s","ͼƬ�ļ�̫С�����ܴ���");
	exit;
}

$source = @imagecreatefromstring($imagecontent);
if($source!==false){
	$width = @imagesx($source);
	$height = @imagesx($source);
}
else
{
	printf("error:%s\n\n\n","5");
	//printf("������ʾ��%s","ͼƬ��ʽ����ȷ���޷�����");
	exit;
}

if(!$width || !$height || $width<10 || $height<10){
	printf("error:%s\n\n\n","6");
	//printf("������ʾ��%s","ͼƬ�ߴ�̫С���޷�����");
	exit;
}

$percent = $width/$iw;

$thumb = @imagecreatetruecolor($w, $h);
$thumbfile = $_COOKIE['thumbfile'];
if($thumbfile) @unlink(TMP_PATH.'/'.$thumbfile);
$thumbfile = sprintf("%s_%s.jpg",date("ymsHis"),substr(md5($pic),8,16));
setcookie('thumbfile',$thumbfile);
if(!@imagecopyresized($thumb, $source, 0, 0, $x * $percent, $y * $percent, $w, $h, $w * $percent, $h * $percent))
{
	printf("error:%s\n\n\n","7");
	//printf("������ʾ��%s","ͼƬ����ʧ��");
	exit;
}
if(@imagejpeg($thumb,TMP_PATH.'/'.$thumbfile,100))
{
	@imagedestroy($thumb);
	printf("url:%s",TMP_URL.'/'.$thumbfile);
}
else
{
	printf("error:%s\n\n\n","8");
	//printf("������ʾ��%s","ͼƬд��ʧ��");
	exit;
}
?>