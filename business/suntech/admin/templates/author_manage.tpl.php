<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form method="post" action="?mod=<?=$mod?>&file=<?=$file?>&action=listorder">
<table cellpadding="0" cellspacing="1" class="table_list">
    <caption>���߹���</caption>
<tr>
	<th width="5%"><strong>����</strong></th>
	<th width="5%"><strong>ID</strong></th>
	<th width="20%"><strong>�û���</strong></th>
	<th width="20%"><strong>����</strong></th>
	<th width="5%"><strong>�Ա�</strong></th>
	<th width="10%"><strong>�Ƽ�</strong></th>
	<th width="20%"><strong>�������</strong></th>
</tr>
<?php 
if(is_array($infos)){
	foreach($infos as $info){
?>
<tr>
    <td class="align_c"><input type="text" name="info[<?=$info['authorid']?>]" value="<?=$info['listorder']?>" size="5"></td>
    <td class="align_c"><?=$info['authorid']?></td>
    <td class="align_c"><?=$info['username']?></td>
    <td class="align_c"><a href="<?=$info['url']?>" target="_blank"><?=$info['name']?></a></td>
    <td class="align_c"><?=$info['gender'] ? '��' : 'Ů'?></td>
    <td class="align_c"><?=$info['elite'] ? '��' : ''?></td>
    <td class="align_c"><a href="?file=<?=$file?>&action=edit&authorid=<?=$info['authorid']?>">�޸�</a>  | 
    <a href="?mod=<?=$mod?>&file=<?=$file?>&action=disable&authorid=<?=$info['authorid']?>&disabled=<?=($info['disabled']==1 ? 0 : 1)?>"><?=($info['disabled']==1 ? '<font color="blue">����</font>' : '����')?></a>  | 
    <a href="javascript:confirmurl('?mod=<?=$mod?>&file=<?=$file?>&action=delete&authorid=<?=$info['authorid']?>', '�Ƿ�ɾ��������')">ɾ��</a> 
    </td>
</tr>
<?php 
	}
}
?>
</table>
<div class="button_box"><input name="submit" type="submit" size="4" value=" �������� "></div>
<div id="pages"><?=$author->pages?></div>
</form>
</body>
</html>