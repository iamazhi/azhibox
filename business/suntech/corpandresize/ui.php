<?php
include './config.php';
$query_string = htmlspecialchars($_SERVER['QUERY_STRING']);
$dirnames = dirname($query_string);
$tmp = PHP_ROOT.str_replace(SITE_URL,'',$dirnames).'/';
$tmp_url = str_replace(SITE_URL,'',$dirnames);

if(preg_match("/http:/",$tmp))
{
	$tmp = PHP_ROOT.UPLOAD_URL.date('Y').'/'.date('md').'/';
	$tmp_url = UPLOAD_URL.date('Y').'/'.date('md');
	dir_create($tmp);

}
setcookie('tmp',$tmp);
setcookie('tmp_url',$tmp_url);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=".CHARSET />

<?php

$pic = @trim($query_string);
if(empty($pic)){
	echo '<script language="javascript">alert("��ѡ����Ҫ���е�ͼƬ��");window.opener=null;window.close();</script>';
	exit;
}
elseif(!preg_match(FILENAME_CHECK,$pic))
{
	echo '<script language="javascript">alert("����ȷѡ����Ҫ��ͼƬ��");window.opener=null;window.close();</script>';
	exit;
}
?>
	<title>����ͼƬ���� V1.1</title>
	<link rel="stylesheet" type="text/css" href="css/cropandresize.css" />
	<script type="text/javascript" src="js/lib/prototype.js"></script>
</head>
<body OnContextMenu="return false;" onselectstart="return true;">
<table border="0" cellpadding="0" cellspacing="0" align="center" style="display:" id="coordlayer">
	<tr>
	<td>
		<div id="element_container" class="element_container">
			<img src="<?php echo $pic;?>" alt="" id="sampleid"/>
			<img src="images/uploading.gif" id="uploadingid" class="uploading" width="78" height="7"/>
		</div>
	</td>
	</tr>
	<tr>
		<td class="track_bg">
		  <div id="track" class="track">
			<div id="handle" class="handle"><img src="images/magnoliacom.png"></div>
		  </div>
		</td>
	</tr>
	<tr>
		<td>
			<form name="coordsform" id="coordsform" action="process.php" method="post" onsubmit="return false;">
			<input type="hidden" name="x" value="0" id="coord_x" />
			<input type="hidden" name="y" value="0" id="coord_y" />
			<input type="hidden" name="w" value="0" id="coord_w" />
			<input type="hidden" name="h" value="0" id="coord_h" />
			<input type="hidden" name="iw" value="0" id="coord_iw" />
			<input type="hidden" name="ih" value="0" id="coord_ih" />
			<input type="hidden" name="phpweb_path" value="<?=PHPWEB_PATH?>" id="phpweb_path" />
			<input type="hidden" name="pic" value="<?php echo $pic;?>" id="coord_pic" />
			<table border="0" cellpadding="0" cellspacing="0" id="coordinates" width="500">
				<tr>
					<td align="center" width="500" nowrap="nowrap">
					<span style="display:none">
					<strong>x:</strong><span id="sample_x">0</span>px&nbsp;
					<strong>y:</strong><span id="sample_y">0</span>px&nbsp;
					<strong>w:</strong><span id="sample_w">0</span>px&nbsp;
					<strong>h:</strong><span id="sample_h">0</span>px&nbsp;
					<strong>iw:</strong><span id="sample_iw">0</span>px&nbsp;
					<strong>ih:</strong><span id="sample_ih">0</span>px&nbsp;&nbsp;
					</span>
					���п�
					���=<input type="text" name="c_w" value="160" id="c_w" size=3 onmouseover="this.focus()" onfocus="this.select()" />px
					&nbsp;
					�߶�=<input type="text" name="c_h" value="120" id="c_h" size=3 onmouseover="this.focus()" onfocus="this.select()" />px
					<input type="button" value="ȷ��" onclick="setCustomCoord()"/>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="button" value="����ͼƬ" onclick="sendCropAndResize()"/>
					</td>
				</tr>
				<tr>
					<td align="center" nowrap="nowrap">
					<input type="hidden" value="Zoom out" onclick="imageZoomOut();" />
					&nbsp;
					<input type="hidden" value="Zoom in" onclick="imageZoomIn();" />
					&nbsp;
					<input type="button" value="����" onclick="resetSelection();" />
					&nbsp;
					<input type="button" value="��λ" onclick="resetImage();" />
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>
<table border="0" cellpadding="0" cellspacing="0" width="500" height="450" align="center" style="display:none" id="processlayer">
	<tr>
		<td align="center" valign="middle" height="375">
			<img src="images/uploading.gif" alt="" id="processid" />
		</td>
	</tr>
	<tr>
		<td align="center" valign="middle">
			<div id="processcompleteid" style="display:none">
				<input type="button" value="����" onclick="redoImage();" />
				<span id="fished"></span>
			</div>
		</td>
	</tr>
</table>
<textarea id="error_list" style="display:none">
0.δ֪������������
1.��ѡ����Ҫ���е�ͼƬ��
2.����ȷѡ����Ҫ��ͼƬ��
3.ͼƬ��ȡʧ��
4.ͼƬ�ļ�̫С�����ܴ���
5.ͼƬ��ʽ����ȷ���޷�����
6.ͼƬ�ߴ�̫С���޷�����
7.ͼƬ����ʧ��
8.ͼƬд��ʧ��
</textarea>
<script type="text/javascript" src="js/src/scriptaculous.js?load=effects,slider,rectmarquee,cropandresize,previewtt"></script>
</body>
</html>