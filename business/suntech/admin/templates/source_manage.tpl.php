<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form method="post" action="?file=<?=$file?>&action=listorder">
<table cellpadding="0" cellspacing="1" class="table_list">
    <caption>来源管理</caption>
<tr>
	<th width="5%"><strong>排序</strong></th>
	<th width="5%"><strong>ID</strong></th>
	<th width="20%"><strong>来源名称</strong></th>
	<th><strong>来源网址</strong></th>
	<th width="10%"><strong>引用次数</strong></th>
	<th width="25%"><strong>管理操作</strong></th>
</tr>
<?php 
if(is_array($infos)){
	foreach($infos as $info){
?>
<tr>
<td class="align_c"><input type="text" name="info[<?=$info['sourceid']?>]" value="<?=$info['listorder']?>" size="5"></td>
<td class="align_c"><?=$info['sourceid']?></td>
<td class="align_c"><a href="<?=$info['url']?>" target="_blank"><?=$info['name']?></a></td>
<td class="align_c"><?=$info['url']?></td>
<td class="align_c"><?=$info['usetimes']?></td>
<td class="align_c"><a href="?mod=<?=$mod?>&file=<?=$file?>&action=edit&sourceid=<?=$info['sourceid']?>">修改</a>  | <a href="javascript:confirmurl('?file=<?=$file?>&action=delete&sourceid=<?=$info['sourceid']?>','是否删除该来源')">删除</a> </td>
</tr>
<?php 
	}
}
?>
</table>
<div class="button_box"><input name="submit" type="submit" size="4" value=" 更新排序 "></div>
<div id="pages"><?=$source->pages?></div>
</form>
</body>
</html>