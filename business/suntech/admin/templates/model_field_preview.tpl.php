<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include admin_tpl('header');
?>
<body>
<?=$menu?>
<table cellpadding="0" cellspacing="1" class="table_from">
<form action="?mod=<?=$mod?>&file=<?=$file?>&action=<?=$action?>&modelid=<?=$modelid?>" method="post" name="myform">
    <caption>ģ��Ԥ��</caption>
 <?php 
 foreach($forminfos as $fieldid=>$info)
 {
 ?>
	<tr> 
      <th><strong><?=$info['name']?></strong><br />
	  <?=$info['tips']?>
	  </th>
      <td><?=$info['form']?> <?php if($info['minlength']){ ?><font color="red">*</font><?php } ?></td>
    </tr>
<?php 
}
?>
    <tr> 
      <td></td>
      <td> 
	  <input type="hidden" name="forward" value="<?=$forward?>"> 
	  <input type="submit" name="dosubmit" value=" ȷ�� "> 
      &nbsp; <input type="reset" name="reset" value=" ��� ">
	  </td>
    </tr>
	</form>
</table>
</body>
</html>