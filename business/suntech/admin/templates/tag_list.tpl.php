<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<title>phpcms��վ����ϵͳ��վ���� - Power by PHPCMS 2008</title>
<link href="admin/skin/system.css" rel="stylesheet" type="text/css">
<script type="text/javaScript" src="images/js/common.js"></script>
<script type="text/javaScript" src="images/js/admin.js"></script>
<script type="text/javaScript" src="images/js/jquery.min.js"></script>
<script type="text/javaScript" src="images/js/css.js"></script>
</head>
<body>
<table cellpadding="0" cellspacing="1" class="table_list">
	<caption>��ǩ�б�</caption>
    <tr>
    	<th><strong>��ǩ����</strong></th>
    	<th><strong>����ģ��</strong></th>
        <th><strong>����</strong></th>
    </tr>
	<?php foreach($array as $k=>$v) { ?>
	<tr>
  		<td><?=$v[tagname]?></td>
        <td><?=$v[module]?></td>
        <td><a href="?mod=<?=$v[module]?>&file=tag&action=preview&module=<?=$v[module]?>&tagname=<?=urlencode($v[tagname])?>">Ԥ��</a>|
        <a href="?mod=<?=$v[module]?>&file=tag&action=edit&module=<?=$v[module]?>&tagname=<?=urlencode($v[tagname])?>">�༭</a>|
        <a href="?mod=<?=$v[module]?>&file=tag&action=delete&module=<?=$v[module]?>&tagname=<?=urlencode($v[tagname])?>">ɾ��</a></td>
    </tr>
    <?php } ?>
</table>
<table cellpadding="0" cellspacing="1" class="table_list">
	<caption>δ������ǩ�б�</caption>
    <tr>
    	<th><strong>��ǩ����</strong></th>
    </tr>
	<?php foreach($un_tag as $k=>$v) { ?>
	<tr>
  		<td><?=$v[tagname]?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>