<?php defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form name="myform" method="post" action="">
<table class="table_form" cellspacing="1" cellpadding="0">
<caption><?=$M['name']?>ģ������</caption>
	<tr>
      <th><strong>Meta Keywords����ҳ�ؼ��ʣ�</strong><br>��������������õĹؼ���</th>
      <td><textarea name='setting[seo_keywords]' cols='60' rows='2' id='seo_keywords'><?=$seo_keywords?></textarea></td>
    </tr>
    <tr>
      <th><strong>Meta Description����ҳ������</strong><br>��������������õ���ҳ����</th>
      <td><textarea name='setting[seo_description]' cols='60' rows='2' id='seo_description'><?=$seo_description?></textarea></td>
    </tr>
    <tr>
      <th><strong>ģ�������</strong></td></th>
      <td><input name='setting[url]' type='text' id='url' value='<?=$url?>' size='40' maxlength='50'></td>
    </tr>
    <tr>
      <th><strong>ÿҳ��ʾ���Ը���</strong></td></th>
      <td><input name='setting[pagesize]' type='text' id='pagesize' value='<?=$pagesize?>' size='10' maxlength='50'></td>
    </tr>
	 <tr>
      <th><strong>��������ַ���</strong></td></th>
      <td><input name='setting[maxcontent]' type='text' id='maxcontent' value='<?=$maxcontent?>' size='10' maxlength='50'></td>
    </tr>
	<tr>
      <th><strong>�Ƿ�����֤��</strong></th>
      <td>
	  <input type='radio' name='setting[enablecheckcode]' value='1'  <?php if($enablecheckcode){ ?>checked <?php } ?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[enablecheckcode]' value='0'  <?php if(!$enablecheckcode){ ?>checked <?php } ?>> ��
     </td>
    </tr>
	 <tr>
      <th><strong>�Ƿ���ǰ̨��ʾ����</strong></th>
      <td>
	  <input type='radio' name='setting[show]' value='1'  <?php if($show){ ?>checked <?php } ?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[show]' value='0'  <?php if(!$show){ ?>checked <?php } ?>> ��
     </td>
    </tr>
	<tr>
      <th><strong>�Ƿ������ο�����</strong></th>
      <td>
	  <input type='radio' name='setting[enableTourist]' value='1'  <?php if($enableTourist){ ?>checked <?php } ?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[enableTourist]' value='0'  <?php if(!$enableTourist){ ?>checked <?php } ?>> ��
     </td>
    </tr>
	<tr>
      <th><strong>�����Ƿ���Ҫ���</strong></th>
      <td>
	  <input type='radio' name='setting[checkpass]' value='1'  <?php if($checkpass){ ?>checked <?php } ?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[checkpass]' value='0'  <?php if(!$checkpass){ ?>checked <?php } ?>> ��
     </td>
    </tr>
</table>

<div style="text-align:center;width:100%;padding-top:10px;">
<input type="submit" name="dosubmit" value=" ȷ�� ">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" ���� ">
</div>
</form>
</body>
</html>