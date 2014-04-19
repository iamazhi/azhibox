<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>添加财务</caption>
    <tr >
    <th class="align_r" width="20%"><STRONG>操作类型:</STRONG>
      </td>
    <td class="align_l">
        <input name="typeid" type="radio" id="1_0" value="1" checked>
        入款(+)   
        <input type="radio" name="typeid" value="2" id="1_1">
      扣款(-)  </td>
    </tr>
   <tr >
    <th class="align_r" width="20%"><STRONG>充值类型:</STRONG>
      </td><td class="align_l">
        <input name="info[type]" type="radio" id="2_0" value="amount" onclick="javascript:change(1);" checked />
        资金  
        <input type="radio" name="info[type]" value="point" id="2_1"onclick="javascript:change();"/>
        点数  </td>
    </tr>
    
    <tr >
    <th class="align_r" width="20%"><STRONG><font color="red">*</font>用户名:</STRONG>
      </td>
    <td class="align_l"><input type="text" name="info[username]" require="false" datatype="limit|ajax" url="?file=<?=$file?>&action=checkuser" min="3" max="20" msg="用户名不得少于3个字符超过20个字符 ！"/></td>
   
    <tr >
      <th class="align_r"><STRONG>数量:</STRONG>          
      <td class="align_l"><input type="text" name="info[number]" size="10" require="true" datatype="currency|limit" min="1" max="16" msg="请输入数字！">&nbsp;<font id = "numberid" name="numberid" style="color:red">元</font><span id="code1"></span></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>交易事由:</STRONG>    
      <td class="align_l"><textarea name="info[note]" cols="30" rows="10"></textarea></td>
    </tr>
    <tr >
      <th class="align_r" width="20%"></td>
      <td class="align_l"><input type="submit" name="dosubmit" value=" 确定 " /> <input type="reset" name="reset" value=" 清除 "></td>
    </tr>
    </table>
</form>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});
function change(msg)
{
    if(msg == 1)
    {
        $('#numberid').html("元");
    }
    else
    {
        $('#numberid').html("点");
    }
}
$().ready(function() {
	  $('form').checkForm(1);
	});
</script>
</body>
</html>