<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>�������</caption>
<tr>
  <td class="align_l"><a href="?file=<?=$file?>&action=manage">֧���б�</a></td>
</tr>
</table>
</form>
<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>������Ϣ</caption>

   <tr>
   <td width="25%" class="align_r"><strong>��Ա���ƣ�</strong></td><td><?=$info["username"]?></td>
   </tr>
   <tr>
   <td class="align_r"><strong>��</strong></td><td><?=$info["amount"]?></td>
   </tr>
   <tr>
   <td class="align_r"><strong>�������ڣ�</strong></td><td><?=TIME?></td>
   </tr>
   <tr>
   <td class="align_r"><strong>���ͣ�</strong></td><td>��ֵ</td>
   </tr>
   <tr>
   <td class="align_r"><strong>��Ա������</strong></td><td><?=$info["usernote"]?></td>
   </tr>
   <tr>
   <td class="align_r"><strong>����Ա��ע��</strong></td><td><?=$info["adminnote"]?></td>
   </tr>
   <tr>
   <td class="align_r"><strong>����״̬��</strong></td><td><?=$info["ispay"]==1 ? "�����" :"δȷ��"?></td>
   </tr>
  
    </table>
    
   
</form>

</body>
</html>