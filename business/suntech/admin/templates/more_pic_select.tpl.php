<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<base target='_self'>
<body leftmargin='2' topmargin='0' marginwidth='0' marginheight='0'>
    <form name='myform' method='Post' action='?mod=<?=$mod?>&file=<?=$file?>&catid=<?=$catid?>&parentdir=<?=$parentdir?>&currentdir=<?=$currentdir?>&realdir=<?=$realdir?>&isimage=<?=$isimage?>'>
<br>
<table width='100%' border='0' cellspacing='0' cellpadding='0' >
<tr>
<td>��ǰĿ¼��./<?=$currentdir?></td>
<td align='right'>
<?php if($currentdir){ ?>
<a href='?mod=<?=$mod?>&file=<?=$file?>&catid=<?=$catid?>&type=<?=$type?>&parentdir=<?=$backparentdir?>&currentdir=<?=$parentdir?>&realdir=<?=$realdir?>&isimage=<?=$isimage?>'>�������ϼ�Ŀ¼</a>
<?php } ?>
</td>
</tr>
</table>
  <table cellpadding="0" cellspacing="1" class="table_list">
  <caption>�ļ�ѡ��</caption>
    <tr>
    <th class="align_c">�ļ���</th>
    <th>��С</th>
   <?php if(is_array($listfiles) && !empty($listfiles)) echo "<th>�ߴ�</th>";?>
    <th class="align_c">����</th>
    <th>�ϴ��޸�ʱ��</th>
    </tr>
<?php
if(is_array($listdirs))
{
	foreach($listdirs as $ldir)
	{
?>
<tr>
<td align='left' height='20'><img src='images/ext/dir.gif'>
<a href='?mod=<?=$mod?>&file=<?=$file?>&catid=<?=$catid?>&type=<?=$type?>&parentdir=<?=$currentdir?>&currentdir=<?=$ldir['path']?>&realdir=<?=$realdir?>&isimage=<?=$isimage?>'><?=$ldir['name']?></a></td>
 <td width='55' class="align_c"><?=$ldir['size']?>&nbsp;</td>
 <td class="align_c">&nbsp;<?=$ldir['type']?></td>
 <td width='140' class="align_c"><?=$ldir['mtime']?></td>
</tr>
<?php
       }
}
?>

<?php
if(!empty($listfiles) && is_array($listfiles))
{
	?>
<tr>
<td colspan="5"><input type='button' name='submit' value='�������' onClick="returnvalue('<?=$currentdir?>');"></td>
</tr>
<?php
	foreach($listfiles as $lfile)
	{
?>
<tr>
<td align='left' height='20'>
<?php if($type!="thumb"){ ?><img src='images/ext/<?=$lfile['ext']?>.gif' width='24' height='24'><?php } ?><?=$lfile['name']?></td>
 <td width='60' class="align_c"><?=$lfile['size']?>&nbsp;K</td>
  <?php if(is_array($listfiles)) echo "<td width='60' class='align_c'>$lfile[imagesize]</td>";?>
 <td width='180' class="align_c">&nbsp;<?=$lfile['type']?></td>
 <td width='140' class="align_c"><?=$lfile['mtime']?></td>
</tr>
<?php
       }
?>
<tr>
<td colspan="5"><input type='button' name='submit' value='�������' onClick="returnvalue('<?=$currentdir?>');"></td>
</tr>
<?php 
}
?>
    </table>
</form>
<BR>

<SCRIPT LANGUAGE="JavaScript">
<!--
	function returnvalue(currentdir)
	{
		window.returnValue = currentdir;
		window.close();
	}
//-->
</SCRIPT>
</body>
</html>