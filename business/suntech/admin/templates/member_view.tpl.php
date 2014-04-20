<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<form action="" method="post" name="myfrom">
  <table width="710" align="center" cellpadding="0" cellspacing="1" class="table_form">
    <caption>
    详细信息
    </caption>
    <tr>
      <th width="10%"><strong>用户名：</strong></th>
      <th class="align_l"width="30%"><?=$member["username"]?></th>
      <th width="13%" class="align_r"><strong>会员类型：</strong></th>
      <th width="20%" class="align_l"><?=$model["name"]?></th>
      <th rowspan="5" class="align_l">&nbsp;</th>
    </tr>
   
    <tr>
      <th><strong>会员组：</strong></th>
      <th class="align_l"><?=$group["name"]?></th>
      <th><strong>扩展会员组：</strong></th>
      <th></th>
    </tr>
    
    <tr>
      <th><strong>余额：</strong></th>
      <th class="align_l"><?=$member["amount"]?></th>
       <th><strong>点数：</strong></th>
      <th class="align_l"><?=$member["point"]?></th>
    </tr>
    
    <tr>
      <th><strong>最后登录IP：</strong></th>
      <th class="align_l"><?=$member["lastloginip"]?></th>
      <th><strong>最后登录时间：</strong></th>
      <th class="align_l"><?=$member["lastlogintime"]?></th>
    </tr>
    
    <tr>
      <th><strong>注册IP：</strong></th>
      <th class="align_l"><?=$member["regip"]?></th>
      <th><strong>注册时间：</strong></th>
      <th class="align_l"><?=date("Y-m-d H:i:s",$member["regtime"])?></th>
    </tr>
    
    <tr>
      <th><strong>地区：</strong></th>
      <th colspan="4" class="align_l"><?=$member["username"]?></th>
    </tr>
    
    <tr>
      <th><strong>邮件：</strong></th>
      <th class="align_l" colspan="4"><?=$member["email"]?></th>
    </tr>
    
     <tr>
      <th><strong>备注：</strong></th>
      <th class="align_l" colspan="4"><?=$member["note"]?></th>
    </tr>
    
 
    <?php if($model["tablename"]=="detail") {?>
    
    
     <tr>
      <th><strong>姓名：</strong></th>
      <th colspan="4" class="align_l"><?=$detail["truename"]?></th>
    </tr>
     <tr>
      <th><strong>性别：</strong></th>
      <th colspan="4" class="align_l"><?=$detail["gender"]==1 ? "男" : $detail["gender"]==2 ? "女":""?></th>
    </tr>
    
     <tr>
      <th><strong>生日：</strong></th>
      <th colspan="4" class="align_l"><?=$detail["birthday"]?></th>
    </tr>
    
     <tr>
      <th><strong>手机：</strong></th>
      <th colspan="4" class="align_l"><?=$detail["mobile"]?></th>
    </tr>
    
    <tr>
      <th><strong>电话：</strong></th>
      <th colspan="4" class="align_l"><?=$detail["telephone"]?></th>
    </tr>
    
    <tr>
      <th><strong>QQ：</strong></th>
      <th colspan="4" class="align_l"><?=$detail["qq"]?></th>
    </tr>
    <tr>
      <th><strong>MSN：</strong></th>
      <th colspan="4" class="align_l"><?=$detail["msn"]?></th>
    </tr>
    
    <tr>
      <th><strong>地址：</strong></th>
      <th colspan="4" class="align_l"><?=$detail["address"]?></th>
    </tr>
    
    <tr>
      <th><strong>邮编：</strong></th>
      <th colspan="4" class="align_l"><?=$detail["postcode"]?></th>
    </tr>
    
    <?php }elseif($model["tablename"]=="company"){?>
    
   <?php }else{?>
   
   <?php }?>
  </table>
  
 
</form>
</body>
</html>
