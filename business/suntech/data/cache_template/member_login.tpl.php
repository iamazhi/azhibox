<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('member','header'); ?>
<div class="container">
<div class="content" id="top_t">
     <div class="login_l"><img src="../style/images/login_banner.jpg" /></div>
     <div class="login_box">
       <ul class="login_ul">
        <div class="caption f_d f_c">��Ա��½</div>
        <form action="?login=login" method="post">
        <label>�˻�����<input name="username" type="text" value="�û���/�ֻ�����"  id="field"/></label>
        
        <label>�ܡ��룺<input name="password" type="password" id="field"/>
        </label>
        
        <p><input name="" type="checkbox" value="" />һ�����Զ���½</p>
        
         <li class="login_btn"><div class="btn"><input name="submit" type="image" src="../style/images/login_btn.gif" style="width:86px;height:26px; border:0px;" /></div>
         <span class="f_blue"><a href="register.php?mod=member">�������룿</a></span>
         </li>
        </form>
        
       
        <li><font class="f_blue"><a href="register.php?mod=member">���ע��</a></font></li>
       </ul>
     </div>
  </div>
  <div class="content" id="top_t">
   <?php include template('member','footer'); ?>
</div>