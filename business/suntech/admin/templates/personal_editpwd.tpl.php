<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>


<form action="?file=personal&action=editpwd" method="post" name="myform">
  <table width="482" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    修改密码</caption>

    <tr>
      <td height="23" class="align_r">用户名：</td>
      <td align="left"><?php echo "$_username"  ;?> </td>
    </tr>
    <tr>
      <td height="23" class="align_r">原密码：</td>
      <td ><input name="old_password" type="password" id="old_password" size="15" require="true" datatype="limit" min="6" max="16" msg="密码不得少于6个字符或超过16个字符！" /></td>
    </tr>
    <tr>
      <td height="23" class="align_r">新密码：</td>
      <td><label>
        <input name="new_password" type="password" id="new_password" size="15" require="true" datatype="limit" min="6" max="16" msg="密码不得少于6个字符或超过16个字符！" />
      </label></td>
    </tr>
    <tr>
      <td height="23" class="align_r">密码强度：</td>
      <td ><div id="pw_check_1" class="pw_check" style="display:none;"><span><strong class="c_orange">弱</strong></span><span>中</span><span>强</span></div>
          <div id="pw_check_2" class="pw_check" style="display:none;"><span>弱</span><span><strong class="c_orange">中</strong></span><span>强</span></div>
          <div id="pw_check_3" class="pw_check" style="display:none;"><span>弱</span><span>中</span><span><strong class="c_orange">强</strong></span></div></td>
    </tr>
    <tr>
      <td height="23" class="align_r">确认新密码：</td>
      <td ><label>
        <input name="chk_password" type="password" id="chk_password" size="15" require="true" datatype="limit|repeat"  min="6" max="16" to="new_password" msg="密码不得少于6个字符或超过16个字符|两次输入的密码不一致" />
      </label></td>
    </tr>
    <tr>
      <td width="111" class="align_r">&nbsp;</td>
      <td ><label>
        <input type="submit" name="dosubmit"  value="提交" />
        <input type="reset" name="button2"  value="重置" />
      </label></td>
    </tr>
    


  </table>
  </form>
</body>
</html>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});


function CharMode(iN)
{
if (iN>=65 && iN <= 90)
return 2;
if (iN>=97 && iN <= 122)
return 4;
else
return 1;
}

function bitTotal(num)
{
modes = 0;
for(i=0; i<3; i++)
{
if (num & 1) modes++;
num >>>= 1;
}
return modes;
}

function checkStrong(sPW){
Modes=0;

for (i=0;i<sPW.length;i++){
Modes|=CharMode(sPW.charCodeAt(i));
}
var btotal = bitTotal(Modes);
if (sPW.length >= 10) btotal++;
switch(btotal) {
case 1:
return "pw_check_1";
break;
case 2:
return "pw_check_2";
break;
case 3:
return "pw_check_3";
break;
default:
return "pw_check_1";
}
}

function ShowStrong(){
data = checkStrong($('#new_password').val());
pw_id = '#' + data;
$(".pw_check").hide();
$(pw_id).show();
}

$('#new_password').blur(function(){
 ShowStrong();
});
</script>