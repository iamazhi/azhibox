<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<form name="myform" action="" method="post" target="">
<table cellpadding="0" cellspacing="1" class="table_form">
	<caption>���ݿ����</caption>
    <tr>
    	<th width="10%"><strong>ѡ��ʽ��</strong></th>
        <td>
        <input type="radio" name="dbsolution" value="1" title="����ģʽ�ʺ�ʹ�ö����������û�����������޶�����ϵͳ�ٶȣ����Ƚ�ռ�����ݿ�����" onclick="alert(this.title);" checked>����ģʽ
		<input type="radio" name="dbsolution" value="0" title="��Чģʽ�ʺ�ʹ�������������û����ڲ����ٹ��ܵ�ǰ���¾�������С���ݿ��Լ�û��ɱ�" onclick="alert(this.title);">��Чģʽ
        </td>
    </tr>
    <tr>
    	<th><strong></strong></th>
        <td>
        <input type="submit" name="dosubmit" value=" �� �� " />
        <input type="reset" name="reset" value="����"  />
        </td>
    </tr>
</table>
</form>
<table cellpadding="0" cellspacing="1" class="table_info">
	<caption>�� ʾ</caption>
    <tr>
    	<td>
        <font color="red">���и�������������������ѹ���������ʹ�á�</font><br />
        ����ģʽ�ʺ�ʹ�ö����������û�����������޶�����ϵͳ�ٶȣ����Ƚ�ռ�����ݿ⡣<br />
        ��Чģʽ�ʺ�ʹ�������������û����ڲ����ٹ��ܵ�ǰ���¾�������С���ݿ��Լ�û��ɱ���
        </td>
    </tr>
</table>
</body>
</html>