<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>


<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>基本信息</caption>
   
   <tr>
     <th class="align_r" width="25%"><STRONG>支付方式名称</STRONG></th>
     <Td class="align_l"><?=$info["pay_name"]?></Td>
   </tr>
   
   <tr>
     <th class="align_r"><STRONG>支付方式描述</STRONG></th>
     <Td class="align_l"><textarea name="pay_desc" cols="60" rows="10"><?=$info["pay_desc"]?></textarea></Td>
   </tr>
   
   <tr>
     <th class="align_r"><STRONG>排序</STRONG></th>
     <Td class="align_l"><input type="text" name="pay_order"value="<?=$info["pay_order"]?>" size="5" require="true" datatype="number" msg="必须为数字"/> </Td>
   </tr>
   
   <tr>
     <td class="align_r">支付手续费</td>
     <Td class="align_l"><input type="text" name="pay_fee" value="<?=$info["pay_fee"]?>" size="5"> %</Td>
   </tr>
   
   
   <?php foreach ($info['config'] as $conf => $name) {?>
 <tr>
  <th><strong><?=$name['name']?></strong></th>
  <td>
  <?php if($name['type'] == 'text'){?>
	<input type="text" size="40" name="config_value[]" value="<?=$name['value']?>" />
	<?php } elseif($name['type'] == 'select') { ?>
	 <select name="config_value[]" value="0">
	 <?php foreach ($name['range'] as $key => $v) {?>
		<option value="<?=$key?>" <?php if($key == $name['value']){ ?> selected="" <?php } ?> ><?=$v?></option>
	  <?php }?>
	</select>
<?php }?>
	<input type="hidden" value="<?=$conf?>" name="config_name[]"/>
  </td>
</tr>
<?php }?>
    <th>&nbsp;</th>
    <td>
	  <input name="pay_name" type="hidden" value="<?=$info['pay_name']?>" />
	  <input type="hidden"  name="pay_id" value=<?=$info['pay_id']?> />
      <input type="hidden"  name="pay_code" value=<?=$info['pay_code']?> />
      <input type="hidden"  name="is_cod" value=<?=$info['is_cod']?> />
      <input type="hidden"  name="is_online" value=<?=$info['is_online']?> />
      <input type="submit" class="button" name="dosubmit"  value=" 确定 " />
      <input type="reset" class="button"  name="Reset"  value=" 重置 " /></td>
    </table>
   
</form>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});

</script>
</body>
</html>