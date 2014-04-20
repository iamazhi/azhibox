<?php
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form method="post" action="?file=<?=$file?>&action=listorder">
<table cellpadding="0" cellspacing="1" class="table_list">
    <caption>�ؼ��ʹ���</caption>
    <tr>
        <th width="5%"><strong>����</strong></th>
        <th><strong>�ؼ���</strong></th>
        <th width="10%"><strong>���ô���</strong></th>
        <th width="20%"><strong>�������</strong></th>
        <th width="10%"><strong>�������</strong></th>
        <th width="20%"><strong>������</strong></th>
        <th width="20%"><strong>�������</strong></th>
    </tr>
<?php
if(is_array($infos)){
	foreach($infos as $info){
?>
    <tr>
        <td class="align_c"><input name='listorder[<?=$info['tagid']?>]' type='text' size='3' value='<?=$info['listorder']?>'></td>
        <td class="align_c"><a href="tag.php?tag=<?=urlencode($info['tag'])?>" target="_blank"><span  class="<?=$info['style']?>"><?=$info['tag']?></span></a></td>
        <td class="align_c"><?=$info['usetimes']?></td>
         <td class="align_c"><?=$info['lastusetime'] ? date('Y-m-d H:i', $info['lastusetime']):''?></td>
       <td class="align_c"><?=$info['hits']?></td>
        <td class="align_c"><?=$info['lasthittime']?date('Y-m-d H:i', $info['lasthittime']):''?></td>
        <td class="align_c"><a href="?mod=<?=$mod?>&file=<?=$file?>&action=edit&tag=<?=urlencode($info['tag'])?>">�޸�</a> | <a href="javascript:confirmurl('?file=<?=$file?>&action=delete&tagid=<?=$info['tagid']?>', '�Ƿ�ɾ���ùؼ���')">ɾ��</a> </td>
    </tr>
<?php
	}
}
?>
</table>
<div class="button_box"><input name="submit" type="submit" size="4" value=" ���� "></div>
<div id="pages"><?=$keyword->pages?></div>
</form>
</body>
</html>