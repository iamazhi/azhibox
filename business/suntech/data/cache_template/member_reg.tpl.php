<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<base href="<?php echo SITE_URL;?>" />
<script type="text/javascript" src="../images/js/jquery.js"></script>
<script type="text/javascript" src="../images/js/common.js"></script>
<style  type="text/css">
*{ margin:0; padding:0;}
body{ font:12px Arial, Helvetica, sans-serif;background:#9f0304;}
img{ border:0;}
ul,dl{ list-style:none;}
a{text-decoration:none;}

.wrapper{ width:837px; height:475px; margin-top:-237px; margin-left:-418px; position:absolute;left:50%; top:50%; background:#9f0304;}
.logo{width:100%;height:100px; text-align:center;margin-top:10px;}
.content{ width:600px; margin:0 auto; background:#fff; border:1px solid #640000;}
.content h3{ display:block; font-size:14px; margin:0 15px; height:30px; line-height:30px; background:url(xuxian.gif) bottom repeat-x; padding-top:10px;}
.form{ padding:15px 0;  margin:0 15px; background:url(xuxian.gif) bottom repeat-x; font-size:14px;}
input{ border-left:1px solid #25552f; border-top:1px solid #25552f; line-height:30px;}
.form span{ color:#d11c15;}
.form a.qq{ padding-left:6px;}
.form label{width:550px;height:auto;margin:0px auto;margin-top:10px;text-align:center;padding:10px 0px;border-top:1px solid #ccc;display:block}
.btn{ margin:10px auto; height:20px; width:230px;}
.sure,.cancle{ float:left;width:100px; height:20px; background:#dcfe9d; margin-right:10px; border-bottom:1px solid #2e7f3c; border-right:1px solid #2e7f3c;}
.sure a{ display:block; height:20px; line-height:20px; padding-left:40px; background:url(sure_03.gif) left center no-repeat; color:black;}
.cancle a{ display:block; height:20px; line-height:20px; padding-left:40px; background:url(cancel_03.gif) left center no-repeat; color:black;}
.footer{ width:615px; height:20px; margin:30px auto; background:#9f0304; }
.footer p{ font-size:14px; text-align:center; color:#5a7300; height:20px; line-height:20px;color:#fff}
.footer p a{color:#fff}
.footer p a:hover{color:#ccc}
</style>
</head>

<body>
<div class="wrapper">
 <div class="logo"><img src="skin/logo.jpg" /></div>
  <div class="content">
   <h3>新会员注册</h3>
   <div class="form">
  <form action="?mod=member" method="post" >
    用户账号：<input type="text" name="info[username]"  datatype="limit" min="6" max="16" msg="不得少于6个字符超过16个字符" value=""/><span>(随意填写，以后以此账户登陆教学平台)</span><br />
    <a class="qq">QQ号码：</a><input type="text"  name="into[qq]"/><span>(必填)请确保QQ真实，导师将通过此QQ联系您</span><br />
    真实姓名：<input type="text" name="into[truename]"/><span>(必填)填写您的真实姓名</span>
   
    <label>
      <input name="" type="image" src="skin/btn_1.jpg" />　<input name="" type="image" src="skin/btn_2.jpg" />
    </label>
   </form>
   </div>
 
 </div>
 <div class="footer"><p>Powered by PV1010.Com@2012,PV1010 Inc</p></div>
</div>
</body>
</html>
