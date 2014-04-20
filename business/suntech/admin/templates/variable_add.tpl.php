<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<SCRIPT LANGUAGE="JavaScript">
<!--

function alterUC(eID) {
	$("#table tbody").hide();
	$("#"+eID).show();
}

//-->
</SCRIPT>
<body>
<?php ?>
<form action="" name="myform" method="post">
  <table  align="center" cellpadding="0" cellspacing="1" class="table_form">
    <caption class="align_c">添加自定义代码</caption>
    <tr>
      <th class="align_r" width="25%"><strong>调用名称：</strong></th>
      <td><input type="text" name="info[varname]" size="15" require="true" datatype="limit|ajax" url="?file=<?=$file?>&action=varname" min="3" max="15" msg="名称必填,不得少于3个字符超过20个字符 ！"></td>
       
    </tr>
    <tr>
      <th class="align_r"><strong>类型：</strong></th>
      <td>
        <input name="info[type]" type="radio" value="0" onClick="alterUC('var')" checked>自定义变量
        <input name="info[type]" type="radio" value="1" onClick="alterUC('tag')">自定义标签
        </td>
    </tr>
    <tr>
      <th class="align_r"><strong>自定义代码：</strong><br/>不能用'号来定义，规则""号，或不用！</th>
      <td>
      <table cellpadding="0" cellspacing="0" id="table">
       <tbody id="var" style="display:none">
       <tr>
       <td><textarea name='info[showvar]' cols='84' rows='1'></textarea></td>
       </tr>
       </tbody>
       
       <tbody id="tag" style="display:none">
       <tr>
       <td><textarea name='info[showtag]' cols='84' rows='15'></textarea></td>
       </tr>
       </tbody>
       </table>
       
      </td>
    </tr>
    
    <tr>
    <Td></Td>
    <td> <input type="submit" name="dosubmit" value=" 添加 ">&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="reset" name="submit" value=" 重置 ">&nbsp;&nbsp;&nbsp;&nbsp;
</td>
    </tr>
  </table>

</form>
</body>
</html>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});
alterUC('var');
</script>