<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<table cellpadding="2" cellspacing="1" class="table_form">
<form action="" method="post" name="myform">
  <input type="hidden" name="mod" value="<?=$mod?>"> 
  <input type="hidden" name="file" value="<?=$file?>"> 
  <input type="hidden" name="action" value="<?=$action?>"> 
  <input type="hidden" name="forward" value="<?=URL?>"> 
  <input type="hidden" name="dosubmit" value="1"> 
  <tr>
    <caption>������Ŀҳ</caption>
  <tr>
	<th width="25%"><strong>ѡ����Ŀ</strong><br />����ͬʱѡ������Ŀ</th>
	<td><?=form::select_category($mod, 0, 'catids[]', 'catids', '������Ŀ', 0, ' multiple="multiple"  style="height:200px;width:250px;" title="��ס��Ctrl����Shift�������Զ�ѡ����ס��Ctrl����ȡ��ѡ��"', 2)?></td>
  </tr>
	<tr> 
      <th><strong>�б�ҳÿҳ��Ϣ����</strong></th>
      <td><?=$PHPSIN['pagesize']?> ����<a href="?file=setting&tab=2">�޸�����</a>��</td>
    </tr>
	<tr> 
      <th><strong>�б�ҳ������ҳ��</strong></th>
      <td><?=$PHPSIN['maxpage']?> ҳ��<a href="?file=setting&tab=2">�޸�����</a>��</td>
    </tr>
	<tr> 
      <th><strong>ÿ�ָ���ҳ��</strong></th>
      <td><input type="text" name="pagesize" value="50" size="4"> ҳ</td>
    </tr>
	<tr> 
      <td></td>
      <td><input type="submit" name="dosubmit" value=" ��ʼ���� "></td>
    </tr>
	</form>
</table>
</body>
</html>