<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>


<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>添加点卡类型</caption>
   
   <tr>
     <th class="align_r" width="25%"><STRONG>名称</STRONG></th>
     <Td class="align_l"><input type="text" name="info[name]" value="" size="30" require="true" datatype="require" msg="请填写类型名称" /></Td>
   </tr>
   
   <tr>
     <th class="align_r"><STRONG>点数</STRONG></th>
     <Td class="align_l"><input type="text" name="info[point]" size="10"require="true" datatype="number" msg="必须为数字" msgid="point"/> 点<span id="point"/></Td>
   </tr>
   
   <tr>
     <th class="align_r"><STRONG>价格</STRONG></th>
     <Td class="align_l"><input type="text" name="info[amount]" value="" size="10" require="true" datatype="number" msg="必须为数字" msgid="amount"/> 元<span id="amount"/></Td>
   </tr>
   
   <tr>
     <td class="align_r"></td>
     <Td class="align_l"><input type="submit" name="dosubmit" value="确定"> <input type="reset" name="reset" value="清除" /></Td>
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