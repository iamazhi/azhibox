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
		alert("请填写模板文件名！\n命名规则：模板类型-特征名，同类型模板特征名不同");
		myform.template.focus();
		return false;
	}
	if(myform.template.value == '<?=$templatetype?>-')
	{
		alert("请把模板文件名填写完整！\n命名规则：模板类型-特征名，同类型模板特征名不同");
		myform.template.focus();
		return false;
	}
	if(myform.templatename.value == '')
	{
		alert('请填写模板中文名！');
		myform.templatename.focus();
		return false;
	}
	if(myform.createtype[0].checked && myform.content.value == '')
	{
		alert('请填写模板内容！');
		myform.content.focus();
		return false;
	}
	if(myform.createtype[1].checked && myform.uploadfile.value == '')
	{
		alert('请选择要上传的模板文件！');
		myform.uploadfile.focus();
		return false;
	}
	return true;
}
</script>

<body >
<form name="myform" method="post" action="?mod=<?=$mod?>&file=<?=$file?>&action=<?=$action?>&dirname=<?=$dirname?>&module=<?=$module?>" enctype="multipart/form-data" onSubmit="return docheck()">
<table cellpadding="0" cellspacing="1" class="table_form">
  <caption>添加模板</caption>
	<tr>
		<th width="15%"><strong>所属方案</strong></th>
		<td>
			<input type="hidden" name="project" value="<?=$project?>">
			<?=$projectname?>
		</td>
	</tr>
	<tr>
		<th><strong>所属模块</strong></td>
		<td>
		<input type="hidden" name="module" value="<?=$module?>">
		<?=$MODULE[$module]['name']?>
		</td>
	</tr>
		<?php if($templatetype){ ?>
	<tr>
		<th><strong>模板类型</strong></td>
		<td><?=$templatename?>(<?=$templatetype?>)</td>
	</tr>
	<?php } ?>
	<tr>
		<th><strong>模板名称</strong></th>
		<td><input type="text" name="templatename" size=25> 可以是中文</td>
	</tr>
	<tr>
		<th><strong>模板路径</strong></th>
		<td><font color="blue">templates/<?=$project?>/<?=$module?>/<input type="text" name="template" <?php if($templatetype){ ?>value="<?=$templatetype?>_"<?php } ?> size="25"> .html</font><br/>
        <font color="red">*</font>&nbsp;&nbsp;(命名规则：<font color="blue">模板类型_</font><font color="red">特征名</font>，同类型模板特征名不同)</td>
	</tr>
	
	
	<tr>
		<th><strong>创建方式</strong></th>
		<td><input type="radio" name="createtype" value="0" checked onClick="$('#createtype1').show();$('#createtype2').hide()"> 在线创建 <input type="radio" name="createtype" value="1"  onclick="$('#createtype2').show();$('#createtype1').hide()"> 本地上传 </td>
	</tr>
</table>
<table cellpadding="0" cellspacing="1" class="table_form">

<tbody id="createtype2" style="display:none;">
<tr>
	<th width="10%"><strong>模板文件</strong></td>
	<td><input type="file" name="uploadfile" size="20"> <font color="red">*</font></td>
</tr>
</tbody>
<tr>
    	<td align="center" colspan="2">
 <input type="submit" name="dosubmit" value=" 保存 ">&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="reset" name="submit" value=" 重置 ">&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
  </tr>
</table>
</form>
<br/>


</body>
</html>
