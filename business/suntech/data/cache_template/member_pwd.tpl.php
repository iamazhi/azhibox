<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('member','header'); ?>
<div class="container">
  
  <div class="content" id="top_t">
  <ul id="menu">
            <li class="sec1"><a href="../member">我的首页</a></li>
            <li class="sec1"><a href="../member/index.php?template=order">订单管理</a></li>
            <li class="sec1"><a href="../member/index.php?template=pay&type=amount">财务管理</a></li>
            <li class="sec2"><a href='index.php?template=account'>账户管理</a></li>
        </ul>
        
        <ul id="main">
               <li class=block id="m_left">
                 
<dl class='bitem'>
        <dt onClick='showHide("items1_1")'><b>基本操作</b></dt>
        <dd style='display:block' class='sitem' id='items1_1'>
          <div class='sitemu'>
            <p><a href='index.php?template=account'>账户管理</a></p>
            <p><a href='index.php?template=modify' >修改资料</a></p>
            <p><a href='index.php?template=pwd'>修改密码</a></p>
            <p><a href='../' target='_blank'>返回首页</a></p>
          </div>
        </dd>
      </dl>
                 
               </li>
               <li class=unblock id="m_left"></li>
               
              
               </ul>

<div id="m_right">
                  <ul class="my_nav" id="top_t">
                    <li class="sec_2">修改资料</li>
                  </ul>
                  <form action="" method="post">
                  
    <table cellpadding="0" cellspacing="1" class="table_list">
                  <tr>
                    <td class="align_r" width="20%">用户名：</td>
                    <td><?php echo $username;?></td>
                  </tr>
                  <tr>
                    <td class="align_r">原密码：</td>
                    <td><input type="password"  name="old_password" require="true" datatype="limit" min="6" max="16" msg="密码不得少于6个字符或超过16个字符！" /></td>
                  </tr> 
                  <tr>
                    <td class="align_r">新密码：</td>
                    <td><input type="password"  name="new_password" id="new_password" size="30" require="true" datatype="limit" min="6" max="16" msg="密码不得少于6个字符或超过16个字符！" /></td>
                  </tr>
                 <tr>
                 <td></td>
                 <td><div class="pw_box">
<div id="pw_check_1" class="pw_check" style="display:none;"><span><strong class="c_orange">弱</strong></span><span>中</span><span>强</span></div>
<div id="pw_check_2" class="pw_check" style="display:none;"><span>弱</span><span><strong class="c_orange">中</strong></span><span>强</span></div>
<div id="pw_check_3" class="pw_check" style="display:none;"><span>弱</span><span>中</span><span><strong class="c_orange">强</strong></span></div>
            </div></td>
                 </tr>
                  <tr>
                    <td class="align_r">确认新密码：</td>
                    <td><input type="password" name="chk_password" id="chk_password"  size="30" require="true" datatype="limit|repeat"  min="6" max="16" to="new_password" msg="密码不得少于6个字符或超过16个字符|两次输入的密码不一致" /></td>
                  </tr>
                  <tr>
                    <td class="align_r"></td>
                    <td><input type="submit" name="submit" value="确定" />  <input name="" value="重置"type="reset" /></td>
                  </tr>
                  </table>
  </form>
   
       
       </div>
  </div>
</div>
<?php include template('member','footer'); ?>
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
