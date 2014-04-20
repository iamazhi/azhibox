<?php 
defined('IN_PHPJSJ') or exit('Access Denied');

require_once  FILE_DIR.'/attachment.class.php';

$attachment = new attachment($mob='phpjs9');

$upload_allowext = $C['upload_allowext'] ? $C['upload_allowext'] : UPLOAD_ALLOWEXT;
$upload_maxsize = $C['upload_maxsize'] ? $C['upload_maxsize'] : UPLOAD_MAXSIZE;
if($dosubmit)
{
	$attachment->upload('uploadfile', $upload_allowext, $upload_maxsize, 1);
	if($attachment->error) showmessage($attachment->error());
	$imgurl = UPLOAD_URL.$attachment->uploadedfiles[0]['filepath'];	
	$aid = $attachment->uploadedfiles[0]['aid'];
	$filesize = $attachment->uploadedfiles[0]['filesize'];
	$filesize = $attachment->size($filesize);
	
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
			$image->watermark($img, $img, $PHPCMS['watermark_pos'], $PHPCMS['watermark_img'], '', 5, '#ff0000', $PHPCMS['watermark_jpgquality']);
		}
	}
	showmessage("文件上传成功！<script type=\"text/javaScript\" src=\"/images/js/jquery.js\"></script><script language='javascript'>	
try{ $(window.opener.document).find(\"form[@name='myform'] #$uploadtext\").val(\"$imgurl\");
$(window.opener.document).find(\"form[@name='myform'] #{$uploadtext}_aid\").val(\"$aid\");
$(window.opener.document).find(\"form[@name='myform'] #$filesize\").val(\"$filesize\");}catch(e){} window.close();
</script>", HTTP_REFERER);
}
else
{

	include tpl('upload');
}
?>