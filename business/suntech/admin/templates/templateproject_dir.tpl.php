<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>
<div>

<form action="" method="post" name="myform">
  <table align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>ģ�巽������</caption>
    <tr>
      <th></th>
      <th width="30%">Ŀ¼�б�</th>
      <th class="align_l"> </th>
      <th > </th>
    </tr>
    <tr><td colspan="5" class="align_l"> ��ǰĿ¼��<?='templates/'.$dirname.'/'?></td></tr>
    <tr><td><img src="images/ext/folder-closed.gif"></td><td colspan="5" class="align_l"><a href="?file=templateproject&action=manage">������һĿ¼</a></td></tr>
<?php 
if(is_array($templateprojects)){
	foreach($templateprojects as $basenames){
?>
    <tr>
      <td width="2%"><img src="images/ext/folder-closed.gif"></td><td><a href="?file=templates&action=manage&dirname=<?=$dirname?>&module=<?=$basenames['dir']?>"><?=$basenames['dir']?></a></td>
      <td class="align_l"><input name="tempname[<?=$basenames['dir']?>]" type="text" value="<?=$filedir[$dirname][$basenames['dir']]?>" size="30"></td>
     <td class="align_c"><a href="javascript:confirmurl('?file=<?=$_GET["file"]?>&action=delete&dirname=<?=$dirname?>&filename=<?=$basenames['dir']?>','ȷ��ɾ���ļ���<?=$basenames['dir']?>����\n���β���������ļ��е�ȫ���ļ�������������')">ɾ��</a> | <a href="javascript:confirmurl('?file=<?=$_GET["file"]?>&action=deldir&dirname=<?=$dirname?>&filename=<?=$basenames['dir']?>','ȷ������ļ���<?=$basenames['dir']?>���µ�ȫ���ļ���')">�������</a></td>
    </tr>
<?php 
	}
}
?>

  </table>
  <div class="button_box"><input type="submit" name="submit" value=" ���ط���б� " onClick="myform.action='?file=templateproject&action=manage';myform.submit();">
  <input type="button" name="submit" value=" �½��ļ��� " onClick="javascript:openwinx('?file=<?=$_GET["file"]?>&action=add&dirname=<?=$dirname?>','upload','480','350')">
  <input type="submit" name="submit" value=" ���� "onClick="myform.action='?file=<?=$_GET["file"]?>&action=updatefile&module=<?=$module?>&dirname=<?=$dirname?>';myform.submit();"></div>
  </form>
  
  
</div>
</body>
</html>
