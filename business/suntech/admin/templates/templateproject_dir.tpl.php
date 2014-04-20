<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>
<div>

<form action="" method="post" name="myform">
  <table align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>模板方案管理</caption>
    <tr>
      <th></th>
      <th width="30%">目录列表</th>
      <th class="align_l"> </th>
      <th > </th>
    </tr>
    <tr><td colspan="5" class="align_l"> 当前目录：<?='templates/'.$dirname.'/'?></td></tr>
    <tr><td><img src="images/ext/folder-closed.gif"></td><td colspan="5" class="align_l"><a href="?file=templateproject&action=manage">返回上一目录</a></td></tr>
<?php 
if(is_array($templateprojects)){
	foreach($templateprojects as $basenames){
?>
    <tr>
      <td width="2%"><img src="images/ext/folder-closed.gif"></td><td><a href="?file=templates&action=manage&dirname=<?=$dirname?>&module=<?=$basenames['dir']?>"><?=$basenames['dir']?></a></td>
      <td class="align_l"><input name="tempname[<?=$basenames['dir']?>]" type="text" value="<?=$filedir[$dirname][$basenames['dir']]?>" size="30"></td>
     <td class="align_c"><a href="javascript:confirmurl('?file=<?=$_GET["file"]?>&action=delete&dirname=<?=$dirname?>&filename=<?=$basenames['dir']?>','确认删除文件“<?=$basenames['dir']?>”吗？\n本次操作会清空文件夹的全部文件，谨慎操作！')">删除</a> | <a href="javascript:confirmurl('?file=<?=$_GET["file"]?>&action=deldir&dirname=<?=$dirname?>&filename=<?=$basenames['dir']?>','确认清空文件“<?=$basenames['dir']?>”下的全部文件吗？')">清空内容</a></td>
    </tr>
<?php 
	}
}
?>

  </table>
  <div class="button_box"><input type="submit" name="submit" value=" 返回风格列表 " onClick="myform.action='?file=templateproject&action=manage';myform.submit();">
  <input type="button" name="submit" value=" 新建文件夹 " onClick="javascript:openwinx('?file=<?=$_GET["file"]?>&action=add&dirname=<?=$dirname?>','upload','480','350')">
  <input type="submit" name="submit" value=" 更新 "onClick="myform.action='?file=<?=$_GET["file"]?>&action=updatefile&module=<?=$module?>&dirname=<?=$dirname?>';myform.submit();"></div>
  </form>
  
  
</div>
</body>
</html>
