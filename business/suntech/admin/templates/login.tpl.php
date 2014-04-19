<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>美睿网络-后台管理 Meiray.Com</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<style type="text/css">
body{font-size:12px; margin:0; padding:0;}
img{ border:0;}
ul,dl{ list-style:none;}
a{ text-decoration:none; color:#414141;}
a:hover{ color:#666;}
.login{ width:599px; margin-top:-192px; margin-left:-299px; position:absolute;left:50%; top:50%;}
.banner{ border:1px solid black; border-bottom:none; }
.center{ width:597px; background:url(admin/skin/images/login.gif) bottom no-repeat; height:82px; border-left:1px solid black; border-right:1px solid black; margin-top:-28px;}
.center form{float:left;width:100%;height:auto;margin:0px;padding:0px; padding-top:43px;overflow:hidden;}
.center label{ float:right;width:100px; display:block}
.button{  width:50px; height:29px;}
.footer{ width:597px; height:32px; background:url(admin/skin/images/footer.gif) no-repeat;border-left:1px solid black; border-right:1px solid black; color:white; text-align:center; line-height:31px;}
.footer a{color:#FFF}
.footer a:hover{color:#CCC}
.text{line-height:24px;}
.name{width: auto; position:relative}
.name span{ display:block; height:26px; line-height:26px; color:#fff;float:left; padding-left:20px;}
.input{ width:105px; float:left;}
.input1{ width:60px; float:left;}
#code{ display:none; z-index:9999;}
</style>
<script language="javascript">
function CheckForm()
{
if (myform.username.value=='') 
{ 
window.alert("请输入用户名！"); 

return false; 
} 

if (myform.password.value=='') 
{ 
window.alert("请输入密码！"); 

return false; 
} 
if (myform.yanzheng.value=='') 
{ 
window.alert("请输入验证码！"); 
return false; 
} 
}
</script>
</head>
<body>
<div class="login">
  <div class="banner"><?=$isimg?></div>
  <div class="center">
    <form name="myform"action="?m=login" method="post">
      <label>
        <input type="image" class="button"  onclick="return CheckForm()" src="admin/skin/images/button.gif" tabindex="4"/>
      </label>
      <div class="name"><span>用户名：</span></div>
      <div class="input"><input type="text" name="username"  id="textfield" style="width:105px; height:24px; background:url(admin/skin/images/input.gif) repeat-x; border:0px;" class="text" maxlength="16" tabindex="1"/></div>
      <div class="name"><span>密码：</span></div>
      <div class="input"><input type="password"name="password" id="textfield2"  style="width:105px; height:24px; border:0px;background:url(admin/skin/images/input.gif) repeat-x;" class="text" maxlength="16" tabindex="2"/></div>
      <div class="name">
      <div id="code" style="position:absolute; top:-51px; left:400px "><img src="?api=code" onclick="this.src=this.src+'&'+Math.random();" >
</div>
      <span>验证码：</span></div>
      <div class="input1"><input type="text"name="yanzheng" id="yazh" style="width:60px; height:24px; border:0px;background:url(admin/skin/images/input.gif) repeat-x;" class="text" maxlength="4" onfocus="document.getElementById('code').style.display='block';" tabindex="3"/></div>
    </form>
  </div>
  <div class="bottom"></div>
  <div class="footer">
    CopyRight 2006-2014 石家庄美睿科技发展有限公司 <a href="http://www.meiray.com" target="_blank">MEIRAY.COM</a>
  </div>
<div style="width:100%;height:15px; background:url(admin/skin/images/admin_login_03.gif) no-repeat"/></div> </div>
</body>
</html>
