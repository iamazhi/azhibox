<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<table cellpadding="2" cellspacing="1" class="table_list">
<form action="" method="post" name="myform">
  <input type="hidden" name="mod" value="<?=$mod?>"> 
  <input type="hidden" name="file" value="<?=$file?>"> 
  <input type="hidden" name="action" value="<?=$action?>"> 
  <input type="hidden" name="forward" value="<?=URL?>"> 
  <input type="hidden" name="dosubmit" value="1"> 
  <input type="hidden" name="type" value="lastinput"> 
  <tr>
    <caption>��������ҳ</caption>
  <tr>
	<th>ѡ����Ŀ��Χ</th>
	<th>����html</th>
  </tr>
	<tr> 
      <td align="center" rowspan="5"><?=form::select_category($mod, 0, 'catids[]', 'catids', '������Ŀ', 0, ' multiple="multiple"  style="height:200px;width:250px;" title="��ס��Ctrl����Shift�������Զ�ѡ����ס��Ctrl����ȡ��ѡ��"', 2)?></td>
      <td><font color="red">ÿ�ָ��� <input type="text" name="pagesize" value="100" size="4"> ����Ϣ</font></td>
    </tr>
	<tr> 
      <td>����������Ϣ <input type="button" name="dosubmit1" value=" ��ʼ���� " onClick="myform.type.value='all';myform.submit();"></td>
    </tr>
	<tr> 
      <td>�������·����� <input type="text" name="number" value="100" size="5"> ����Ϣ <input type="button" name="dosubmit2" value=" ��ʼ���� " onClick="myform.type.value='lastinput';myform.submit();"></td>
    </tr>
	<tr> 
      <td>���·���ʱ��� <?=form::date('fromdate')?> �� <?=form::date('todate')?> ����Ϣ <input type="button" name="dosubmit3" value=" ��ʼ���� " onClick="myform.type.value='date';myform.submit();"></td>
    </tr>
	<tr> 
      <td>����ID�� <input type="text" name="fromid" value="0" size="8"> �� <input type="text" name="toid" size="8"> ����Ϣ <input type="button" name="dosubmit4" value=" ��ʼ���� " onClick="myform.type.value='id';myform.submit();"></td>
    </tr>
	</form>
</table>
</body>
</html>