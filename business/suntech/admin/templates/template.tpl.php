<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

<form name="myform" method="post" action="?file=<?=$file?>&action=updatefile&module=<?=$module?>&dirname=<?=$dirname?>">
<table cellpadding="0" cellspacing="1" class="table_list">
  <caption>ģ�����</caption>
<tr>
<th width="2%"></th>
<th width="30%">�ļ���</th>
<th>ģ������</th>

<th width="180">�������</th>
</tr>
<tr><td colspan="5" class="align_l"> ��ǰĿ¼��<?='templates/'.$dirname.'/'.$module?></td></tr>
<tr><td><img src="images/ext/folder-closed.gif"></td><td colspan="5" class="align_l"><a href="?file=templateproject&action=dir&dirname=<?=$dirname?>">������һĿ¼</a></td></tr>
<?php 
if(is_array($templates)){
	foreach($templates as $template){
?>
<tr><td width="2%"><img src="images/ext/file.gif"></td><td><a href="?file=<?=$file?>&action=edit&dirname=<?=$dirname?>&module=<?=$module?>&template=<?=$template['template']?>" title="�ϴ��޸�ʱ�䣺<?=date("Y-m-d H:i:s",$template['mtime'])?>"><?=$template['file']?></a></td>
<td class="align_c" width="150"><input type="text" name="templatename[<?=$template['file']?>]" value="<?=$template['name']?>" style="width:100%"></td>

<td class="align_c" >
<a href="?file=<?=$file?>&action=edit&dirname=<?=$dirname?>&module=<?=$module?>&template=<?=$template['template']?>">�޸�</a>
<a href="?file=<?=$file?>&action=view&module=<?=$module?>&template=<?=$template['template']?>" target="_blank">���ӻ�</a>

<a href="?file=<?=$file?>&action=down&template=<?=$template['template']?>&module=<?=$module?>&dirname=<?=$dirname?>&filename=<?=$template['file']?>" title="�ϴ��޸�ʱ�䣺<?=date("Y-m-d H:i:s",$template['mtime'])?>">����</a> | 
<a href="javascript:confirmurl('?file=<?=$file?>&action=delete&template=<?=$template['template']?>&module=<?=$module?>&dirname=<?=$dirname?>&template=<?=$template['template']?>','ȷ��ɾ��ģ�塰<?=$template['template']?>.html����')" title="�ϴ��޸�ʱ�䣺<?=date("Y-m-d H:i:s",$template['mtime'])?>">ɾ��</a>
</td>
</tr>
<?php 
	}
}
?>
</table>
<div class="button_box"><input type="submit" name="submit" value="���ط���б�" onClick="myform.action='?file=templateproject&action=manage';myform.submit();">
  <input type="button" name="submit" value=" �½�ģ�� " onClick="javascript:openwinx('?mod=phpsin&file=templates&action=add&dirname=<?=$dirname?>&module=<?=$module?>','upload','480','350')">
  <input type="submit" name="submit" value=" ���� ">
</div>
</form>

</body>
</html>