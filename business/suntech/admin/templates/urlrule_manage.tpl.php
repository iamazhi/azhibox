<?php
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<table cellpadding="0" cellspacing="1" class="table_list">
    <caption>URL�������</caption>
    <tr>
        <th width="8%">ģ��</th>
        <th width="10%">����</th>
        <th width="5%">HTML</th>
        <th>URL����</th>
        <th>URLʾ��</th>
        <th width="10%">�������</th>
    </tr>
<?php
if(is_array($data)){
	foreach($data as $r){
?>
    <tr>
        <td class="align_c"><?=$MODULE[$r['module']]['name']?></td>
        <td><?=$r['file']?></td>
        <td class="align_c"><?=($r['ishtml'] ? '<font color="red">��</font>' : '��')?></td>
        <td><?=$r['urlrule']?></td>
        <td><?=$r['example']?></td>
        <td class="align_c">
        <a href="?mod=<?=$mod?>&file=<?=$file?>&action=edit&urlruleid=<?=$r['urlruleid']?>">�޸�</a>
        | <a href="#" onClick="confirmurl('?mod=<?=$mod?>&file=<?=$file?>&action=delete&urlruleid=<?=$r['urlruleid']?>', '�Ƿ�ɾ���ù���')">ɾ��</a></td>
    </tr>
<?php
	}
}
?>
</table>
<div id="pages"><?=$urlrule->pages?></div>
</body>
</html>