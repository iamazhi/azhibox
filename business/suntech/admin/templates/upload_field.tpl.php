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
		alert('��ѡ���ļ�!');
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
    <caption>ͼƬ�ϴ�</caption>
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
             <input type="submit" name="dosubmit" value=" �ϴ� ">
         

			 </td>
   </tr>
  <tr>
     <td>
	 �����ϴ����ͣ�<?=$upload_allowext?><br />
	 �����ϴ���С��<?=$attachment->size($upload_maxsize)?><br />
	 ����ͼ��С���� <input type="text" name="width" value="<?=$thumb_width?>" size="3"> px���� <input type="text" name="height" value="<?=$thumb_height?>" size="3"> px
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