<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>�޸Ķ��� </caption>
   <tr>
    <td class="align_r" width="20%">��Ʒ��</td>
    <td> <a href="<?=$info["goodsurl"]?>" target="_blank"><?=$info["goodsname"]?></a></td>
   </tr>
   
   <tr>
    <td class="align_r">���ۣ�</td>
    <td><input type="text" name="info[amount]" value="<?=$info["amount"]?>" size="10">Ԫ/<?=$info["unit"]?></td>
   </tr>
   
   <tr>
    <td class="align_r">������</td>
    <td><input type="text" name="info[number]"  value="<?=$info["number"]?>"size="5"></td>
   </tr>
   
   <tr>
    <td class="align_r">�˷ѣ�</td>
    <td><input type="text" name="" value="<?=$info["carriage"]?>"  size="5"></td>
   </tr>
   
   <tr>
    <td class="align_r">�����</td>
    <td><font color="#FF0000"><strong><?=$info["amount"]?>Ԫ</strong></font></td>
   </tr>
   
   <tr>
    <td class="align_r">����״̬��</td>
    <td><? if($info["status"]==0){?><font color="#FF0000"><strong>������</strong></font><? }elseif($info["status"]==1){?><font color="#FF6600">�Ѹ���</font><? }?></td>
   </tr>
   
   <tr>
    <td class="align_r">��ң�</td>
    <td><?=$info["username"]?></td>
   </tr>
   
   <tr>
    <td class="align_r">�µ�ʱ�䣺</td>
    <td><?=date("Y-m-d H:i:s",$info["time"])?></td>
   </tr>
   
   <tr>
    <td class="align_r"></td>
    <td> <input type="submit"  name="dosubmit"value="ȷ��"></td>
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