<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>
<table cellpadding="0" cellspacing="1" class="table_form">
<form action="?file=<?=$file?>&action=<?=$action?>" method="post" name="myform">
    <caption>�������</caption>
 	<tr> 
      <th width="20%"><strong>�û���</strong></th>
      <td><input type="text" name="info[username]" value="<?=$username?>" size="20"> <font color="red">*</font></td>
    </tr>
	<tr> 
      <th><strong>����</strong></th>
      <td><input type="text" name="info[name]" value="<?=$name?>" size="15"> <font color="red">*</font></td>
    </tr>
	<tr> 
      <th><strong>��Ƭ</strong></th>
      <td><?=form::upload_image('info[photo]', 'photo', $photo, 40)?></td>
    </tr>
	<tr> 
      <th><strong>�Ա�</strong></th>
      <td><input type="radio" name="info[gender]" value="1" checked> �� <input type="radio" name="info[gender]" value="0"> Ů</td>
    </tr>
	<tr> 
      <th><strong>����</strong></th>
      <td><?=form::date('info[birthday]', $birthday)?></td>
    </tr>
	<tr> 
      <th><strong>E-mail</strong></th>
      <td><input type="text" name="info[email]" value="<?=$email?>" size="30"></td>
    </tr>
	<tr> 
      <th><strong>QQ</strong></th>
      <td><input type="text" name="info[qq]" value="<?=$qq?>" size="20"></td>
    </tr>
	<tr> 
      <th><strong>MSN</strong></th>
      <td><input type="text" name="info[msn]" value="<?=$msn?>" size="30"></td>
    </tr>
	<tr> 
      <th><strong>��ҳ</strong></th>
      <td><input type="text" name="info[homepage]" value="<?=$homepage?>" size="50"></td>
    </tr>
	<tr> 
      <th><strong>�绰</strong></th>
      <td><input type="text" name="info[telephone]" value="<?=$telephone?>" size="20"></td>
    </tr>
	<tr> 
      <th><strong>��ַ</strong></th>
      <td><input type="text" name="info[address]" value="<?=$address?>" size="50"></td>
    </tr>
	<tr> 
      <th><strong>�ʱ�</strong></th>
      <td><input type="text" name="info[postcode]" value="<?=$postcode?>" size="6"></td>
    </tr>
	<tr> 
      <th><strong>���˼��</strong></th>
      <td><textarea name="info[introduce]" id="introduce"><?=$introduce?></textarea><?=form::editor('introduce', 'basic', '','100%', 350)?></td>
    </tr>
	<tr> 
      <th><strong>����</strong></th>
      <td><input type="radio" name="info[disabled]" value="1"> �� <input type="radio" name="info[disabled]" value="0" checked> ��</td>
    </tr>
    <tr> 
      <td></td>
      <td> 
	  <input type="hidden" name="forward" value="?file=<?=$file?>&action=manage"> 
	  <input type="submit" name="dosubmit" value=" ȷ�� "> 
      &nbsp; <input type="reset" name="reset" value=" ��� ">
	  </td>
    </tr>
	</form>
</table>
</body>
</html>