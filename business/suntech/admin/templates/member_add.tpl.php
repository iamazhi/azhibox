<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>��ӻ�Ա</caption>
    <tr >
    <th class="align_r" width="30%"><STRONG>�û�����</STRONG>
      </td>
    <td class="align_l"><input name="info[username]" type="text" size="15" require="true" datatype="limit|ajax" url="?file=member&action=checkuser" min="3" max="20" msg="�û�����������3���ַ�����20���ַ� ��"/></td>
    </tr>
   <tr >
    <th class="align_r" width="30%"><STRONG>���룺</STRONG><Br/>6��16���ַ�
      </td><td class="align_l"><input name="new_password" type="password" id="new_password" size="15" require="true" datatype="limit" min="6" max="16" msg="���벻������6���ַ��򳬹�16���ַ���" /></td>
    </tr>
    
    <tr >
    <th class="align_r" width="30%"><STRONG>ȷ�����룺</STRONG>
      </td>
    <td class="align_l"><input name="chk_password" type="password" id="chk_password" size="15" require="true" datatype="limit|repeat"  min="6" max="16" to="new_password" msg="���벻������6���ַ��򳬹�16���ַ�|������������벻һ��" /></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><STRONG>��Ա�飺</STRONG>
      </td>
    <td class="align_l"><select name="info[groupid]"/>
     <?php foreach($group as $v){ if($v["groupid"]!=1){?> <option value="<?=$v["groupid"]?>" <?=$v["groupid"]==6 ? "selected":""?> ><?=$v["name"]?></option><?php }}?>
      </select></td>
    </tr>
    <tr >
      <th class="align_r" width="30%"></td>
        <STRONG>��Աģ�ͣ�</STRONG>
      <td class="align_l"><select name="info[modelid]" require="true" datatype="number" min="1" max="16" msg="��ѡ����࣡"/>
      <option value="">��ѡ��</option>
      <?php foreach($model as $r){?><option value="<?=$r["modelid"]?>" <?=$r["modelid"]==8 ? "selected":""?>><?=$r["name"]?></option><?php }?></select></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>E-mail��</STRONG>
      <td class="align_l"><input type="text" name="info[email]" value="" require="true" datatype="email|limit|ajax" url="?file=member&action=email" min="1" max="20" msg="�ʼ���ʽ����ȷ ��"/></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>������</STRONG><BR>
      
      <td class="align_l"><select name="info[areaid]">
        <?=$is_tree?>
        </select></td>
    </tr>
    <tr >
      <th class="align_r" width="30%"></td>
      <td class="align_l"><input name="info[disabled]" type="hidden" value="1"><input type="submit" name="dosubmit" value=" ȷ�� " /> <input type="reset" name="reset" value=" ��� "></td>
    </tr>
    </table>
</form>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});
</script>
</body>
</html>
