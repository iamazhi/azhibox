<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<form action="" method="post" name="myform">
  <table width="482" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>�޸ĸ�������</caption>

    <tr>
      <td height="23" class="align_r">�û�����</td>
      <td align="left"><?php echo "$_username"  ;?> </td>
    </tr>
    <tr>
      <td height="23" class="align_r">E-Mail��</td>
      <td ><input name="infos[email]" type="text" value="<?=$info["email"]?>" require="true" datatype="email" min="6" max="16" msg="Email��ʽ����ȷ��"/></td>
    </tr>
    
    <tr>
      <td height="23" class="align_r">���ڵ�����</td>
      <td ><select name="infos[areaid]"><? foreach($area as $r){?><option value="<?=$r["areaid"]?>"<?=$r["areaid"]==$info["areaid"] ? "selected='selected'" :""?> ><?=$r["name"]?></option><? }?></select></td>
    </tr>
    
    <tr>
      <td height="23" class="align_r">������</td>
      <td><label>
        <input name="info[truename]" type="text" value="<?=$info["truename"]?>" require="false" datatype="limit|ajax" url="?file=member&action=checkuser" min="2" max="20" msg="������������2���ַ�����20���ַ� ��"/>
      </label></td>
    </tr>
    <tr>
      <td height="23" class="align_r">�ձ�</td>
      <td >
          <input type="radio" name="info[gender]" value="0" <?=$info["gender"]==0 ? "checked" :""?>  />
          ��
          <input type="radio" name="info[gender]" value="1" <?=$info["gender"]==1 ? "checked" :""?> />
          Ů</td>
    </tr>
    <tr>
      <td height="23" class="align_r">���գ�</td>
      <td ><label>
        <input name="info[birthday]" type="text" value="<?=date("Y-m-d",strtotime($info["birthday"]))?>"  />
      </label></td>
    </tr>
    <tr>
      <td class="align_r">�ֻ���</td>
      <td ><label>
        <input name="info[mobile]" type="text" value="<?=$info["mobile"]?>"  require="false" datatype="limit|mobile"  min="2" max="20" msg="�ֻ����벻��ȷ ��"/>
      </label></td>
    </tr>
    <tr>
      <td class="align_r">�绰��</td>
      <td ><label>
        <input name="info[telephone]" type="text" value="<?=$info["telephone"]?>"  require="false" datatype="limit|phone"  min="2" max="20" msg="�绰���벻��ȷ ��"/>
      </label></td>
    </tr>
    <tr>
      <td class="align_r">QQ��</td>
      <td ><label>
        <input name="info[qq]" type="text" value="<?=$info["qq"]?>"  />
      </label></td>
    </tr>
    <tr>
      <td class="align_r">MSN��</td>
      <td ><label>
        <input name="info[msn]" type="text" value="<?=$info["msn"]?>"  />
      </label></td>
    </tr>
    <tr>
      <td class="align_r">��ַ��</td>
      <td ><label>
        <input name="info[address]" type="text" value="<?=$info["address"]?>" size="40" />
      </label></td>
    </tr>
    <tr>
      <td class="align_r">�ʱࣺ</td>
      <td ><label>
        <input name="info[postcode]" type="text" value="<?=$info["postcode"]?>"  />
      </label></td>
    </tr>
    <tr>
      <td width="111" class="align_r">&nbsp;</td>
      <td ><label>
        <input type="submit" name="dosubmit" value="�ύ" />
        <input type="reset" name="button2" value="����" />
      </label></td>
    </tr>
    


  </table>
  </form>
</body>
</html>

<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});

</script>