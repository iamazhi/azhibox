<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<form action="" method="post" name="myfrom">
  <table width="710" align="center" cellpadding="0" cellspacing="1" class="table_form">
    <caption>
    ��ϸ��Ϣ
    </caption>
    <tr>
      <th width="10%"><strong>�û�����</strong></th>
      <th class="align_l"width="30%"><?=$member["username"]?></th>
      <th width="13%" class="align_r"><strong>��Ա���ͣ�</strong></th>
      <th width="20%" class="align_l"><?=$model["name"]?></th>
      <th rowspan="5" class="align_l">&nbsp;</th>
    </tr>
   
    <tr>
      <th><strong>��Ա�飺</strong></th>
      <th class="align_l"><?=$group["name"]?></th>
      <th><strong>��չ��Ա�飺</strong></th>
      <th></th>
    </tr>
    
    <tr>
      <th><strong>��</strong></th>
      <th class="align_l"><?=$member["amount"]?></th>
       <th><strong>������</strong></th>
      <th class="align_l"><?=$member["point"]?></th>
    </tr>
    
    <tr>
      <th><strong>����¼IP��</strong></th>
      <th class="align_l"><?=$member["lastloginip"]?></th>
      <th><strong>����¼ʱ�䣺</strong></th>
      <th class="align_l"><?=$member["lastlogintime"]?></th>
    </tr>
    
    <tr>
      <th><strong>ע��IP��</strong></th>
      <th class="align_l"><?=$member["regip"]?></th>
      <th><strong>ע��ʱ�䣺</strong></th>
      <th class="align_l"><?=date("Y-m-d H:i:s",$member["regtime"])?></th>
    </tr>
    
    <tr>
      <th><strong>������</strong></th>
      <th colspan="4" class="align_l"><?=$member["username"]?></th>
    </tr>
    
    <tr>
      <th><strong>�ʼ���</strong></th>
      <th class="align_l" colspan="4"><?=$member["email"]?></th>
    </tr>
    
     <tr>
      <th><strong>��ע��</strong></th>
      <th class="align_l" colspan="4"><?=$member["note"]?></th>
    </tr>
    
 
    <?php if($model["tablename"]=="detail") {?>
    
    
     <tr>
      <th><strong>������</strong></th>
      <th colspan="4" class="align_l"><?=$detail["truename"]?></th>
    </tr>
     <tr>
      <th><strong>�Ա�</strong></th>
      <th colspan="4" class="align_l"><?=$detail["gender"]==1 ? "��" : $detail["gender"]==2 ? "Ů":""?></th>
    </tr>
    
     <tr>
      <th><strong>���գ�</strong></th>
      <th colspan="4" class="align_l"><?=$detail["birthday"]?></th>
    </tr>
    
     <tr>
      <th><strong>�ֻ���</strong></th>
      <th colspan="4" class="align_l"><?=$detail["mobile"]?></th>
    </tr>
    
    <tr>
      <th><strong>�绰��</strong></th>
      <th colspan="4" class="align_l"><?=$detail["telephone"]?></th>
    </tr>
    
    <tr>
      <th><strong>QQ��</strong></th>
      <th colspan="4" class="align_l"><?=$detail["qq"]?></th>
    </tr>
    <tr>
      <th><strong>MSN��</strong></th>
      <th colspan="4" class="align_l"><?=$detail["msn"]?></th>
    </tr>
    
    <tr>
      <th><strong>��ַ��</strong></th>
      <th colspan="4" class="align_l"><?=$detail["address"]?></th>
    </tr>
    
    <tr>
      <th><strong>�ʱࣺ</strong></th>
      <th colspan="4" class="align_l"><?=$detail["postcode"]?></th>
    </tr>
    
    <?php }elseif($model["tablename"]=="company"){?>
    
   <?php }else{?>
   
   <?php }?>
  </table>
  
 
</form>
</body>
</html>
