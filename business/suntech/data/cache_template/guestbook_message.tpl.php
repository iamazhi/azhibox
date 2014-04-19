<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('phpsin','header'); ?>
 <div class="bannerer"><img src="skin/images/ban.jpg" width="960" height="163" /></div>
<div class="main">
  <div class="left">
    <div class="hh2">栏目导航</div>
    <div class="daohang">
      <ul>
        <li><a href="index.php?file=list&catid=3">关于我们</a></li>
        <li><a href="index.php?file=list&catid=9">联系我们</a></li>
        <li><a href="index.php?file=list&catid=6">销售网络</a></li>
      </ul>
    </div>
    <p style="padding-top:10px;"><img src="skin/images/lianxi.jpg" width="210" height="84" /></p>
  </div>
  <div class="right">
    <div class="hh3">
      <div class="location" style="float:right;">当前位置：<a href="/">网站首页</a>留言板</div>
      <div class="hh4">留言板</div>
    </div>
    <div class="single"> 
          <div style="width:90%;height:auto;margin:0px auto;"> 
         
<div style="width:50%;height:50px;line-height:50px;border:1px solid #F90; background-color:#f9eab5;text-align:center;margin:0px auto;"><?php echo $message;?></div>

            </div></div>
  </div>
</div><?php include template('phpsin','footer'); ?>
