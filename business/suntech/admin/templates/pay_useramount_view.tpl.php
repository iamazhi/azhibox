<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>财务操作</caption>
<tr>
  <td class="align_l"><a href="?file=<?=$file?>&action=manage">支付列表</a></td>
</tr>
</table>
</form>
<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>基本信息</caption>

   <tr>
   <td width="25%" class="align_r"><strong>会员名称：</strong></td><td><?=$info["username"]?></td>
   </tr>
   <tr>
   <td class="align_r"><strong>金额：</strong></td><td><?=$info["amount"]?></td>
   </tr>
   <tr>
   <td class="align_r"><strong>操作日期：</strong></td><td><?=TIME?></td>
   </tr>
   <tr>
   <td class="align_r"><strong>类型：</strong></td><td>充值</td>
   </tr>
   <tr>
   <td class="align_r"><strong>会员描述：</strong></td><td><?=$info["usernote"]?></td>
   </tr>
   <tr>
   <td class="align_r"><strong>管理员备注：</strong></td><td><?=$info["adminnote"]?></td>
   </tr>
   <tr>
   <td class="align_r"><strong>到款状态：</strong></td><td><?=$info["ispay"]==1 ? "已完成" :"未确认"?></td>
   </tr>
  
    </table>
    
   
</form>

</body>
</html>