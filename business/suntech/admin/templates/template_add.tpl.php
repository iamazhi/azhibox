<?php
defined('IN_PHPJSJ') or exit('Access Denied');
include TPL('header');
?>
<script type="text/javascript" src="images/js/jqModal.js"></script>
<script type="text/javascript" src="images/js/jqDnR.js"></script>
<script type="text/javascript">


function docheck()
{
	if(myform.template.value == '')
	{
		alert("����дģ���ļ�����\n��������ģ������-��������ͬ����ģ����������ͬ");
		myform.template.focus();
		return false;
	}
	if(myform.template.value == '<?=$templatetype?>-')
	{
		alert("���ģ���ļ�����д������\n��������ģ������-��������ͬ����ģ����������ͬ");
		myform.template.focus();
		return false;
	}
	if(myform.templatename.value == '')
	{
		alert('����дģ����������');
		myform.templatename.focus();
		return false;
	}
	if(myform.createtype[0].checked && myform.content.value == '')
	{
		alert('����дģ�����ݣ�');
		myform.content.focus();
		return false;
	}
	if(myform.createtype[1].checked && myform.uploadfile.value == '')
	{
		alert('��ѡ��Ҫ�ϴ���ģ���ļ���');
		myform.uploadfile.focus();
		return false;
	}
	return true;
}
</script>

<body >
<form name="myform" method="post" action="?mod=<?=$mod?>&file=<?=$file?>&action=<?=$action?>&dirname=<?=$dirname?>&module=<?=$module?>" enctype="multipart/form-data" onSubmit="return docheck()">
<table cellpadding="0" cellspacing="1" class="table_form">
  <caption>���ģ��</caption>
	<tr>
		<th width="15%"><strong>��������</strong></th>
		<td>
			<input type="hidden" name="project" value="<?=$project?>">
			<?=$projectname?>
		</td>
	</tr>
	<tr>
		<th><strong>����ģ��</strong></td>
		<td>
		<input type="hidden" name="module" value="<?=$module?>">
		<?=$MODULE[$module]['name']?>
		</td>
	</tr>
		<?php if($templatetype){ ?>
	<tr>
		<th><strong>ģ������</strong></td>
		<td><?=$templatename?>(<?=$templatetype?>)</td>
	</tr>
	<?php } ?>
	<tr>
		<th><strong>ģ������</strong></th>
		<td><input type="text" name="templatename" size=25> ����������</td>
	</tr>
	<tr>
		<th><strong>ģ��·��</strong></th>
		<td><font color="blue">templates/<?=$project?>/<?=$module?>/<input type="text" name="template" <?php if($templatetype){ ?>value="<?=$templatetype?>_"<?php } ?> size="25"> .html</font><br/>
        <font color="red">*</font>&nbsp;&nbsp;(��������<font color="blue">ģ������_</font><font color="red">������</font>��ͬ����ģ����������ͬ)</td>
	</tr>
	
	
	<tr>
		<th><strong>������ʽ</strong></th>
		<td><input type="radio" name="createtype" value="0" checked onClick="$('#createtype1').show();$('#createtype2').hide()"> ���ߴ��� <input type="radio" name="createtype" value="1"  onclick="$('#createtype2').show();$('#createtype1').hide()"> �����ϴ� </td>
	</tr>
</table>
<table cellpadding="0" cellspacing="1" class="table_form">

<tbody id="createtype2" style="display:none;">
<tr>
	<th width="10%"><strong>ģ���ļ�</strong></td>
	<td><input type="file" name="uploadfile" size="20"> <font color="red">*</font></td>
</tr>
</tbody>
<tr>
    	<td align="center" colspan="2">
 <input type="submit" name="dosubmit" value=" ���� ">&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="reset" name="submit" value=" ���� ">&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
  </tr>
</table>
</form>
<br/>


</body>
</html>
