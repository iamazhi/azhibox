<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>
<?php ?>
<form action="?file=lottery&action=add" method="post">
  <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption class="align_c">��������</caption>
    <tr>
      <th class="align_c">�ں�</th>
      <th class="align_c">��λ</th>
      <th class="align_c">ǧλ</th>
      <th class="align_c">��λ</th>
      <th class="align_c">ʮλ</th>
      <th class="align_c">��λ</th>
      <th class="align_c">¼��ʱ��</th>
      <th class="align_c">����ʱ��</th>
      <th class="align_c">����</th>
    </tr>
    
    <tr>
       <td class="align_c"><input type="text" name="info[lottery_num]"></td>
       <td width="5%" class="align_c"><input name="info[num_info1]"type="text" size="1"></td>
       <td width="5%" class="align_c"><input name="info[num_info2]"type="text" size="1"></td>
       <td width="5%" class="align_c"><input name="info[num_info3]"type="text" size="1"></td>
       <td width="5%" class="align_c"><input name="info[num_info4]"type="text" size="1"></td>
       <td class="align_c"><input type="text" name="info[num_info5]"size="1"></td>
       <td class="align_c"><input type="text" name="info[kjtime]" value="<?=date("Y-m-d H:i:s")?>"size="20"></td>
       <td class="align_c"> <input type="text" name="info[addtime]" value="<?=date("Y-m-d H:i:s")?>"size="20"></td>
       <td class="align_c"><input type="submit" value="���"></td>
    </tr>
  </table>
</form>

 <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption class="align_c">��Ϣ����</caption>
    <tr>
    <th width="5%" >ID</th>
      <th width="15%">�ں�</th>
      <th width="5%" >��λ</th>
      <th  width="5%">ǧλ</th>
      <th  width="5%">��λ</th>
      <th  width="5%">ʮλ</th>
      <th  width="5%">��λ</th>
      <th width="15%">¼��ʱ��</th>
      <th width="15%">����ʱ��</th>
      <th width="10%">����</th>
    </tr>
    <? foreach($info as $v){?>
    <form name="myform" method="post" action="?file=lottery&action=edit" >
    <tr>
    <Td><input name="id" type="text" value="<?=$v["id"]?>"size="2" /></Td>
      <td class="align_c" ><input type="text" name="info[lottery_num]" size="20" value="<?=$v["lottery_num"]?>"></td>
      <td class="align_c" ><input type="text" name="info[num_info1]"size="1" value="<?=$v["num_info1"]?>"></td>
      <td class="align_c" ><input type="text" name="info[num_info2]"size="1" value="<?=$v["num_info2"]?>"></td>
      <td class="align_c" ><input type="text" name="info[num_info3]"size="1" value="<?=$v["num_info3"]?>"></td>
      <td class="align_c" ><input type="text" name="info[num_info4]"size="1" value="<?=$v["num_info4"]?>"></td>
      <td class="align_c"><input type="text" name="info[num_info5]" size="1" value="<?=$v["num_info5"]?>"></td>
      <td class="align_c"><input type="text" name="info[kjtime]" size="20" value="<?=$v["kjtime"]?>"></td>
      <td class="align_c"><input type="text" name="info[addtime]" size="20" value="<?=$v["addtime"]?>"></td>
      <td class="align_c"><input name="modify" type="submit" value="�޸�"/> | <a href="?file=lottery&action=delete&id=<?=$v["id"]?>">ɾ��</a> </td>
    </tr>
    </form>
    <? }?>
  </table>
  
<div id="pages"><?=$a->pages?></div>


</body>
</html>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});
</script>