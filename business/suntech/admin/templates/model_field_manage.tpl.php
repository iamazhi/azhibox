<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<?=$menu?>
<form method="post" name="myform" action="?mod=<?=$mod?>&file=<?=$file?>&action=listorder&modelid=<?=$modelid?>">
<table cellpadding="2" cellspacing="1" class="table_list">
<caption><?=$modelname?>ģ���ֶι���</caption>
<tr>
<th>����</th>
<th>�ֶ���</th>
<th>����</th>
<th>����</th>
<th>ϵͳ</th>
<th>����</th>
<th>����</th>
<th>����</th>
<th>Ͷ��</th>
<th>�������</th>
</tr>
<?php 
if(is_array($infos)){
	foreach($infos as $info){
?>
<tr>
<td class="align_c"><input type="text" name="info[<?=$info['fieldid']?>]" value="<?=$info['listorder']?>" size="3"/></td>
<td><?=$info['field']?></td>
<td><?=$info['name']?></td>
<td><?=$fields[$info['formtype']]?></td>
<td class="align_c"><?=($info['issystem'] ? '<font color="red">��</font>' : '')?></td>
<td class="align_c"><?=($info['minlength'] ? '<font color="red">��</font>' : '')?></td>
<td class="align_c"><?=($info['issearch'] ? '<font color="red">��</font>' : '')?></td>
<td class="align_c"><?=($info['isorder'] ? '<font color="red">��</font>' : '')?></td>
<td class="align_c"><?=($info['isadd'] ? '<font color="red">��</font>' : '')?></td>
<td class="align_c">
<?php if($info['iscore']){ ?>
	<span style="color:#cccccc">�޸� | ���� | ���� | ɾ��</span>
<?php }else{ ?>
	<a href="?mod=<?=$mod?>&file=<?=$file?>&action=edit&modelid=<?=$modelid?>&fieldid=<?=$info['fieldid']?>">�޸�</a> | 
	<a href="?mod=<?=$mod?>&file=<?=$file?>&action=copy&modelid=<?=$modelid?>&fieldid=<?=$info['fieldid']?>">����</a> | 
	<a href="?mod=<?=$mod?>&file=<?=$file?>&action=disable&modelid=<?=$modelid?>&fieldid=<?=$info['fieldid']?>&disabled=<?=($info['disabled']==1 ? 0 : 1)?>"><?=($info['disabled']==1 ? '<font color="red">����</font>' : '����')?></a> | 
	<?php if($info['issystem']){ ?>
	<span style="color:#cccccc">ɾ��</a></span>
	<?php }else{ ?>
	<a href=javascript:confirmurl("?mod=<?=$mod?>&file=<?=$file?>&action=delete&modelid=<?=$modelid?>&fieldid=<?=$info['fieldid']?>","ȷ��Ҫɾ����<?=$info['name']?>���ֶ���")>ɾ��</a>
	<?php } ?>
<?php } ?>
</td>
</tr>
<?php 
	}
}
?>
</table>
<div class="button_box"><input type="submit" name="dosubmit" value=" ���� "></div>
</form>
</body>
</html>