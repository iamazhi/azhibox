<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<table cellpadding="0" cellspacing="1" class="table_form">
    <caption>�ļ��ϴ�</caption>
	<form name="upload" method="post" action="?file=<?=$file?>&uploadtext=<?=$uploadtext?>&action=<?=$action?>" enctype="multipart/form-data">
  <tr>
     <td height="30">
	         <input type="hidden" name="save" value="1">
             <input type="file" name="uploadfile" size="15">
             <input type="hidden" name="type" value="<?=$type?>">
             <input type="hidden" name="rename" value="<?=$rename?>">
             <input type="hidden" name="catid" value="<?=$catid?> ?>">
			 <input type="hidden" name="oldaid">
             <input type="hidden" name="oldname">
             <input type="hidden" name="MAX_FILE_SIZE" value="<?=$maxfilesize?>"> 
             <input type="submit" name="dosubmit" value=" �ϴ� ">
			 </td>
   </tr>
   <tr>
     <td height="30">
	 �����ϴ����ͣ�<?=UPLOAD_ALLOWEXT?><br />
	 �����ϴ���С��<?=UPLOAD_MAXSIZE?>
	 </td>
   </tr>
	</form>
</table>
<script language="javascript">
<!--
if(window.opener.myform.<?=$uploadtext?>.value!="")
{
	try{
		upload.oldname.value = window.opener.myform.<?=$uploadtext?>.value;
		upload.oldaid.value = window.opener.myform.<?=$uploadtext?>_aid.value;
	}catch(e){}
}
//-->
</script>
</body>
</html>