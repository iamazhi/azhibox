<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>

<body>
<form name="myform" method="post" action="?file=<?=$file?>&action=setting">
<table cellpadding="0" cellspacing="1" class="table_form">
<caption>������Ϣ</caption>
<tr>
  <th width="25%"><strong>�Ƿ������οͷ�������</strong></th>
  <td width="75%"><input type='radio' name='setting[ischecklogin]' id='ischecklogin' value='1' <?php echo $ischecklogin == 1 ? 'checked' : '' ?>> �� <input type='radio' name='setting[ischecklogin]' id='ischecklogin' value='0' <?php echo $ischecklogin == 0 ? 'checked' : '' ?>> ��</td>
</tr>
<tr>
  <th><strong>�����Ƿ���Ҫ���</strong></th>
  <td><input type='radio' name='setting[ischeckcomment]' id='ischeckcomment' value='1' <?php echo $ischeckcomment == 1 ? 'checked' : '' ?>> �� <input type='radio' name='setting[ischeckcomment]' id='ischeckcomment' value='0' <?php echo $ischeckcomment == 0 ? 'checked' : '' ?>> ��</td>
</tr>
<tr>
  <th><strong>�ύ�����Ƿ�����֤��</strong></th>
  <td><input type='radio' name='setting[enablecheckcode]' id='enablecheckcode' value='1' <?php echo $enablecheckcode == 1 ? 'checked' : '' ?>> �� <input type='radio' name='setting[enablecheckcode]' id='enablecheckcode' value='0' <?php echo $enablecheckcode == 0 ? 'checked' : '' ?>> ��</td>
</tr>
<tr>
  <th><strong>ÿҳ���������</strong></th>
  <td><input type="text" name='setting[maxnum]' value="<?=$maxnum ?>" ></td>
</tr>
<tr>
    <th>&nbsp;</th>
    <td><input type="submit" name="dosubmit" value="ȷ��">&nbsp;&nbsp;<input type="reset" name="reset" value="����"></td>
</tr>
</table>
</form>
</body>
</html>