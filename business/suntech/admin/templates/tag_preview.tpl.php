<?php 
defined('IN_PHPCMS') or exit('Access Denied');
include admin_tpl('header');
?>
<body>
<table cellpadding="0" cellspacing="1" class="table_list">
  <caption>{tag_<?=$tagname?>} ��ǩԤ��</caption>
  <tr>
    <td>
	<?php tag($tag['module'], $tag['template'], $tag['sql'], $tag['page'], $tag['number'], $tag['var_description']); ?>
	</td>
  </tr>
<tr>
<td>
<input type="button" value="������һ��" onClick="javascript:history.back();">
<?php if($job == 'edittemplate'){ ?>
&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="�༭��ǩ" onClick="javascript:window.location='?mod=phpcms&file=tag&action=quickoperate&operate=edit&job=edittemplate&tagname=<?=urlencode($tagname)?>';">
&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="�رմ���" onClick="javascript:window.close();">
<?php } ?>
</td>
</tr>
</table>
</body>
</html>