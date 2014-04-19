<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<table  cellpadding="1" align="center"  cellspacing="1" class="table_list">
<caption>查询点卡</caption>
<tr>
  <Td><a href="?file=<?=$file?>&action=manage">全部点卡</a> | <a href="?file=<?=$file?>&action=manage&status=1">未使用的点卡</a> | <a href="?file=<?=$file?>&action=manage&status=2">已使用的点卡</a> </Td>
</tr>
</table>

<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>批量产生点卡</caption>
    <tr >
    <th class="align_r" width="20%"><STRONG>点卡数量:</STRONG>
      </td>
    <td class="align_l"><input type="text" name="cardnum" value="100" require="true" datatype="currency|limit" min="1" max="16" msg="请输入数字！"> (只能是数字)  </td>
    </tr>
   <tr >
    <th class="align_r" width="20%"><STRONG>点卡类型:</STRONG>
      </td><td class="align_l"><select name="ptypeid"><? foreach($ptype as $r){?><option value="<?=$r["ptypeid"]?>"><?=$r["name"]?></option><? }?></select></td>
    </tr>
    
    <tr >
    <th class="align_r" width="20%"><STRONG>卡号前缀:</STRONG>
      </td>
    <td class="align_l"><input type="text" name="prefix" value="<?=date("Y")?>" require="true" datatype="currency|limit" min="1" max="16" msg="请输入数字！"> (只能是数字)</td>
   
    <tr >
      <th class="align_r"><STRONG>卡号长度:</STRONG>          
      <td class="align_l"><input type="text" name="carlength" size="10" value="16" require="true" datatype="currency|limit" min="1" max="16" msg="请输入数字！"> (只能是数字)</td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>有效期:</STRONG>    
      <td class="align_l"><?=form::date('endtime','','endtime')?>(留空默认过期时间为2年)</td>
    </tr>
    <tr >
      <th class="align_r" width="20%"></td>
      <td class="align_l"><input type="submit" name="dosubmit" value=" 产生点卡 " /> <input type="reset" name="reset" value=" 重置 "></td>
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