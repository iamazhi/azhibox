<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>添加推荐位</caption>
   
   <tr>
     <th class="align_r" width="25%"><font color="red">*</font> <STRONG>推荐位名称</STRONG></th>
     <Td class="align_l"><input type="text" name="info[name]" value="" size="30" require="true" datatype="require" msg="请填写推荐位名称" /></Td>
   </tr>
   
   <tr>
     <th class="align_r"><font color="red">*</font> <STRONG>排序权值</STRONG></th>
     <Td class="align_l"><input type="text" name="info[listorder]" size="5" value="0"require="true" datatype="number" msg="必须为数字" msgid="point"/><span id="point"/></Td>
   </tr>
   
   <tr>
     <th class="align_r"><STRONG>拥有推荐权限的角色</STRONG></th>
     <Td class="align_l"><? foreach($info as $r){?><input boxid="roleids" name="roleids[]" id="roleids"  type="checkbox" value="<?=$r["roleid"]?>"><?=$r['name']?><? }?> </Td>
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