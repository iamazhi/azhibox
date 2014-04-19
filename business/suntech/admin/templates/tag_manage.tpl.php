<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<table cellpadding="0" cellspacing="1" class="table_form">
    <caption>中文标签快速操作</caption>
	<tr>
	  <td class="align_c"  height="30">
	  <input name="tagname" id="tagname" type="text" value="请输入标签名" size="30" onClick="if(this.value == '请输入标签名') this.value=''"> 
	  <input name="preview" id="preview" type="button" value=" 预览 "> &nbsp;&nbsp;
	  <input name="edit" id="edit" type="button" value=" 编辑 "> &nbsp;&nbsp;
	  <input name="copy" id="copy" type="button" value=" 复制 "> &nbsp;&nbsp;
	  <input name="delete" id="delete" type="button" value=" 删除 ">
	  </td>
	</tr>
</table>

<form name="myform" method="post" action="">
<table cellpadding="0" cellspacing="1" class="table_list">
    <caption>管理<?=$types[$type]?>标签</caption>
<tr>
<th width="5%">排序</th>
<th width="5%">ID</th>
<th width="15%">标签名称</th>
<th width="10%">中文标签</th>
<th>GET 调用代码</th>
<th>类型</th>
<th>管理操作</th>
</tr>
<?php 
foreach($tags AS $tagname => $tag)
{
	$sql = $tag['sql'];
	eval("\$sql = \"$sql\";");
	$getcode = '';
	if(strpos($sql, '"') === false)
	{
		$page = $pages = $showvars = '';
		if($tag['page'] == '$page')
		{
			$page = ' page="$page"';
			$pages = '{$pages}';
		}
		if(isset($tag['selectfields']))
		{
			if(is_array($tag['selectfields']))
			{
			foreach($tag['selectfields'] as $field)
			{
				$showvars .= '{$r['.$field.']}<br />';
			}
			}
		}
	$getcode = '<font color="red">{get sql="'.$sql.'" rows="'.$tag['number'].'"'.$page.'}</font><br />'.$showvars.'<font color="red">{/get}</font><br />'.$pages;
	}
?>
<tr>
<td><input type="text" name="listorders[<?=$tag['tagid']?>]" value="<?=$tag['listorder']?>" size="4" /></td>
<Td class="align_c"><?=$tag["tagid"]?></Td>
<td><a href="?file=<?=$file?>&action=edit&type=<?=$tag["iscustom"] ? "sql" : $tag["type"]?>&tagid=<?=$tag["tagid"]?>"><?=$tag["tagname"]?></a></td>
<td class="align_c" title="提示：双击鼠标复制标签内容至剪贴板...">
<input type='text' value="{tag_<?=$tag["tagname"]?>}" size='25' name='tag_<?=$tag["tagname"]?>' onDblClick="clipboardData.setData('text',this.value); alert(this.value +'已复制到剪贴板');"><br/>
</td>
<td class="align_c">
  <?php if($getcode){ ?>
  <span onMouseOver="$('#show_getcode').html($('#<?=$tagname?>').html());$('#show_getcode').show();" style="cursor:pointer" class="click">查看</span> | <span style="cursor:pointer" onClick="clipboardData.setData('text', $('#<?=$tag["tagid"]?>_code').val()); alert('GET调用代码已复制到剪贴板');">复制</span>
  <div id="<?=$tagname?>" style="display:none;"><?=$getcode?></div>
  <textarea id="<?=$tag["tagid"]?>_code" style="display:none;"><?=str_replace("}", "}\r\n", strip_tags($getcode))?></textarea>
  <?php }else{ ?>
  <font color="#cccccc">查看 | 复制</font>
  <?php } ?>
</td>
<td class="align_c"><?=$types[$tag["type"]]?></td>
<td class="align_c"><a href="?file=<?=$file?>&action=edit&type=<?=$tag["iscustom"] ? "sql" : $tag["type"]?>&tagid=<?=$tag["tagid"]?>">修改</a> | <a href="#" onClick="javascript:confirmurl('?file=<?=$file?>&action=delete&tagname=<?=urlencode($tag["tagname"])?>','确认删除标签 {tag_<?=$tag["tagname"]?>} 吗？如果您在模板中使用了此标签，请不要删除！')">删除</a></td>
</tr>
<?php 
}
?>



</table>
<div class="button_box">
		<input type="button" name="listorder" value=" 排序 " onClick="myform.action='?file=<?=$file?>&action=listorder';myform.submit();"> 
</div>
<div id="pages"><?=$t->pages?></div>
<div id="show_getcode" style="display:none;position:absolute; width:500px; border:1px solid #fc9; background-color:#ffc;word-wrap:break-word; word-break:break-all;z-index:9999999; padding:5px; text-align:left"></div>
</form>
</body>
</html>
<script language="javascript">

hide = setInterval("hideshow();",3000);

$(".click").mouseover(function(e)
{
	var divoffset = 2;
	mouse = new MouseEvent(e);
    leftpos = mouse.x + divoffset;
    toppos = mouse.y + divoffset;
	$("#show_getcode").css('left', leftpos);
	$("#show_getcode").css('top', toppos);
	clearInterval(hide);
});
$(".click").mouseout(function(){hide = setInterval("hideshow();",3000);})
$("#show_getcode").mouseover(function(){clearInterval(hide);})
$("#show_getcode").mouseout(function(){hideshow();})

function hideshow()
{
	$('#show_getcode').hide();
	clearInterval(hide);
}

       //获取鼠标坐标函数
var MouseEvent = function(e) {
            this.x = e.pageX
            this.y = e.pageY
        }



$('#edit').click(function(){
	var tagname = $('#tagname').val();
	window.open('?mod=phpcms&file=template&action=gettag&operate=edit&job=edittemplate&tagname='+tagname,'tag','height=500,width=700,,top=0,left=0,toolbar=no,menubar=no,scrollbars=yes,resizable=no,location=no,status=no');
});

$('#preview').click(function(){
	var tagname = $('#tagname').val();
	var url = '?mod=phpcms&file=tag&action=preview&tagname='+tagname;
	window.open(url,'tag','height=500,width=700,,top=0,left=0,toolbar=no,menubar=no,scrollbars=yes,resizable=no,location=no,status=no');
});

$('#delete').click(function(){
	var mod = "<?=$mod?>";
	var file = "<?=$file?>";
	var module = "<?=$module?>";
	var tagname = $('#tagname').val();
	confirmurl('?mod='+mod+'&file='+file+'&action=delete&module='+module+'&tagname='+tagname,'确认删除此标签吗？如果您在模板中使用了此标签或JS调用，则请不要删除！');
});

$('#copy').click(function(){
	var mod = "<?=$mod?>";
	var file = "<?=$file?>";
	var module = "<?=$module?>";
	var tagname = $('#tagname').val();
	var url = '?mod='+mod+'&file='+file+'&action=copy&type=content&module='+module+'&tagname='+tagname;
	window.open(url,'tag','height=500,width=700,,top=0,left=0,toolbar=no,menubar=no,scrollbars=yes,resizable=no,location=no,status=no');
});
</script>