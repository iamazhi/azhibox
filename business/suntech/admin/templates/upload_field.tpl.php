<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<script type="text/javascript">
<!--
function doCheck() 
{
	if(upload.<?=$uploadtext?>.value == '') {
		alert('请选择文件!');
		return false;
	}
	return true;
}
function previewimage()
{
	if(upload.<?=$uploadtext?>.value) $("#previewpic").attr("src", upload.<?=$uploadtext?>.value);
}
//-->
</script>
<form name="upload" method="post" action="?file=upload_field&uploadtext=<?=$uploadtext?>" enctype="multipart/form-data" onSubmit="return doCheck();">
<table cellpadding="2" cellspacing="1" class="table_form">
    <caption>图片上传</caption>
  <tr>
     <td> 
             <input type="hidden" name="save" value="1">
             <input name="<?=$uploadtext?>" type="file" size="15" onChange="previewimage()">
             <input type="hidden" name="type" value="<?=$type?>">
             <input type="hidden" name="rename" value="<?=$rename?>">
             <input type="hidden" name="catid" value="<?=$catid?>">
			 <input type="hidden" name="oldaid">
             <input type="hidden" name="oldname">
             <input type="hidden" name="MAX_FILE_SIZE" value="<?=$maxfilesize?>"> 
             <input type="submit" name="dosubmit" value=" 上传 ">
         

			 </td>
   </tr>
  <tr>
     <td>
	 允许上传类型：<?=$upload_allowext?><br />
	 允许上传大小：<?=$attachment->size($upload_maxsize)?><br />
	 缩略图大小：宽 <input type="text" name="width" value="<?=$thumb_width?>" size="3"> px，高 <input type="text" name="height" value="<?=$thumb_height?>" size="3"> px
	 </td>
   </tr>
  <tr>
     <td>
<img id="previewpic" onload="setpicWH(this,300,300)">
<script type="text/javascript">
<!--
if($(window.opener.document).find("form[@name='myform'] #<?=$uploadtext?>").val())
{
    $("#previewpic").attr("src", $(window.opener.document).find("form[@name='myform'] #<?=$uploadtext?>").val()); 
}
else
{
	$("#previewpic").attr("src","../images/nopic.gif"); 
}
//-->
</script>
			 </td>
   </tr>
</table>
</form>
</body>
</html>