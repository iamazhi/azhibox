<?php 
defined('IN_PHPJSJ') or exit('Access Denied');

require_once  FILE_DIR.'/attachment.class.php';

$attachment = new attachment($mob='phpsin');

$upload_allowext = $C['upload_allowext'] ? $C['upload_allowext'] : UPLOAD_ALLOWEXT;
$upload_maxsize = $C['upload_maxsize'] ? $C['upload_maxsize'] : UPLOAD_MAXSIZE;

$iswatermark = isset($C['watermark_enable']) ? $C['watermark_enable'] : ($PHPSIN['watermark_enable'] && $info['iswatermark'] ? 1 : 0);
$thumb_width = isset($width) ? $width : (isset($C['thumb_width']) ? $C['thumb_width'] : ($info['thumb_width'] ? $info['thumb_width'] : $PHPSIN['thumb_width']));
$thumb_height = isset($height) ? $height : (isset($C['thumb_height']) ? $C['thumb_height'] : ($info['thumb_height'] ? $info['thumb_height'] : $PHPSIN['thumb_height']));
if($dosubmit)
{

	$attachment->upload($uploadtext, $upload_allowext, $upload_maxsize, 1);
	if($attachment->error) showmessage($attachment->error());
	$imgurl = UPLOAD_URL.$attachment->uploadedfiles[0]['filepath'];	
	$aid = $attachment->uploadedfiles[0]['aid'];
	$filesize = $attachment->uploadedfiles[0]['filesize'];
	$filesize = $attachment->size($filesize);

	require_once  FILE_DIR. '/image.class.php';
		$image = new image();
		$img = UPLOAD_ROOT.$attachment->uploadedfiles[0]['filepath'];
		$image->thumb($img, $img, $thumb_width, $thumb_height);
    if($isthumb || $iswatermark)
	{
		require_once  FILE_DIR. '/image.class.php';
		$image = new image();
		$img = UPLOAD_ROOT.$attachment->uploadedfiles[0]['filepath'];
		if($isthumb)
		{
			$image->thumb($img, $img, $width, $height);
		}
		if($iswatermark)
		{
			$image->watermark($img, $img, $PHPCMS['watermark_pos'], $PHPCMS['watermark_img'], '', 5, '#ff0000', $PHPSIN['watermark_jpgquality']);
		}
	}

showmessage("文件上传成功！<script type=\"text/javaScript\" src=\"/images/js/jquery.js\"></script><script language='javascript'>$(window.opener.document).find(\"form[@name='myform'] #$uploadtext\").val(\"$imgurl\");$(window.opener.document).find(\"form[@name='myform'] #{$uploadtext}_aid\").val(\"$aid\");</script>", HTTP_REFERER);
}
else
{

	include tpl('upload_field');
}
?>