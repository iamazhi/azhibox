<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<body>
<?php ?>
<form action="" name="myform" method="post">
  <table  align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption class="align_c">自定义变量</caption>
    <tr>
      <td class="align_l"><a href="?file=<?=$file?>&action=<?=$action?>&type=0">自定义变量</a> | <a href="?file=<?=$file?>&action=<?=$action?>&type=1">自定义标签</a></td>
    </tr>
  </table>

 <table align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption class="align_c">自定义变量管理</caption>
    <tr>
      <th width="5%" class="align_c">选中</th>
      <th width="5%" class="align_c">排序</th>
      <th width="5%" class="align_c">ID</th>
      <th width="10%" class="align_c">变量名称</th>
      <th width="10%" >类型</th>
      <th width="30%" class="align_c">调用变量代码</th>
      <th width="10%">操作</th>
    </tr>
    <?php foreach($info as $n=>$v) { ;?>
    <tr>
      <td class="align_c"><input type="checkbox" name="ids[]" value="<?=$v['varid']?>" id="checkbox"/></td>
      <td class="align_c"><input type="text" name="listorders[<?=$v['varid']?>]" value="<?=$v['listorder']?>" size="4" /></td>
      <td class="align_c"><?=$v["varid"]?></td>
      <td class="align_l"><?=$v["varname"]?></td>
      <td class="align_c"><?=$v["type"] ? "<font color='blue'>自定义标签</font>" :"自定义变量";?></td>
      <td class="align_l"><?=$v["type"] ? " <span onMouseOver=\"$('#show_getcode').html($('#".$v["varid"]."').html());$('#show_getcode').show();\" style=\"cursor:pointer\" class=\"click\">查看</span> " : $v["showvar"];?><span style="cursor:pointer" onClick="clipboardData.setData('text', $('#<?=$v["varid"]?>_code').val()); alert('GET调用代码已复制到剪贴板');"><font color="#FF6600">复制</font></span><textarea id="<?=$v["varid"]?>_code" style="display:none;"><?=$v["type"] ? $v["showtag"] : $v["showvar"]?></textarea>
        <div id="<?=$v["varid"]?>" style="display:none;"><?=$v["showtag"]?></div></td>
      <td class="align_c"><a href="javascript:confirmurl('?file=<?=$file?>&action=delete&ids=<?=$v["varid"]?>','确认要删除[<?=$v["varname"]?>]吗？')">删除</a> | <a href="?file=<?=$file?>&action=edit&varid=<?=$v["varid"]?>">修改</a></td>
    </tr>
    <?php }?>
  </table>
<div class="button_box">
        <input type="button" value="全选" onClick="checkall()">
		<input type="button" name="listorder" value=" 排序 " onClick="myform.action='?file=<?=$file?>&action=listorder';myform.submit();"> 
        <input type="button" name="delete" value="删除" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
</div>
<div id="pages"><?=$a->pages?></div>
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
</script>