<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

<form name="myform" method="post" action="?file=<?=$file?>&action=updatefile&module=<?=$module?>&dirname=<?=$dirname?>">
<table cellpadding="0" cellspacing="1" class="table_list">
  <caption>模板管理</caption>
<tr>
<th width="2%"></th>
<th width="30%">文件名</th>
<th>模板名称</th>

<th width="180">管理操作</th>
</tr>
<tr><td colspan="5" class="align_l"> 当前目录：<?='templates/'.$dirname.'/'.$module?></td></tr>
<tr><td><img src="images/ext/folder-closed.gif"></td><td colspan="5" class="align_l"><a href="?file=templateproject&action=dir&dirname=<?=$dirname?>">返回上一目录</a></td></tr>
<?php 
if(is_array($templates)){
	foreach($templates as $template){
?>
<tr><td width="2%"><img src="images/ext/file.gif"></td><td><a href="?file=<?=$file?>&action=edit&dirname=<?=$dirname?>&module=<?=$module?>&template=<?=$template['template']?>" title="上次修改时间：<?=date("Y-m-d H:i:s",$template['mtime'])?>"><?=$template['file']?></a></td>
<td class="align_c" width="150"><input type="text" name="templatename[<?=$template['file']?>]" value="<?=$template['name']?>" style="width:100%"></td>

<td class="align_c" >
<a href="?file=<?=$file?>&action=edit&dirname=<?=$dirname?>&module=<?=$module?>&template=<?=$template['template']?>">修改</a>
<a href="?file=<?=$file?>&action=view&module=<?=$module?>&template=<?=$template['template']?>" target="_blank">可视化</a>

<a href="?file=<?=$file?>&action=down&template=<?=$template['template']?>&module=<?=$module?>&dirname=<?=$dirname?>&filename=<?=$template['file']?>" title="上次修改时间：<?=date("Y-m-d H:i:s",$template['mtime'])?>">下载</a> | 
<a href="javascript:confirmurl('?file=<?=$file?>&action=delete&template=<?=$template['template']?>&module=<?=$module?>&dirname=<?=$dirname?>&template=<?=$template['template']?>','确认删除模板“<?=$template['template']?>.html”吗？')" title="上次修改时间：<?=date("Y-m-d H:i:s",$template['mtime'])?>">删除</a>
</td>
</tr>
<?php 
	}
}
?>
</table>
<div class="button_box"><input type="submit" name="submit" value="返回风格列表" onClick="myform.action='?file=templateproject&action=manage';myform.submit();">
  <input type="button" name="submit" value=" 新建模板 " onClick="javascript:openwinx('?mod=phpsin&file=templates&action=add&dirname=<?=$dirname?>&module=<?=$module?>','upload','480','350')">
  <input type="submit" name="submit" value=" 更新 ">
</div>
</form>

</body>
</html>