<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('phpsin','header'); ?>
<div class="bannerer"><script language="javascript" src="<?php echo SITE_URL;?>/data/js.php?id=1"></script></div>
<div class="main">
  <div class="left">
    <div class="hh2">栏目导航</div>
    <div class="daohang">
      <ul> <?php $data = tag('phpsin', '', "SELECT * FROM sin_category WHERE ".get_parentid($catid)."", 0, 101);?> <?php if(is_array($data)) foreach($data AS $n => $v) { ?> <li><a href="<?php echo $v['url'];?>" ><?php echo $v['name'];?></a></li> <?php } ?> <?php unset($data); ?> </ul>
    </div>
    <p style="padding-top:10px;"><img src="skin/images/lianxi.jpg" width="210" height="84" /></p>
  </div>
  <div class="right">
    <div class="hh3">
      <div class="location" style="float:right;">当前位置：<a href="/">网站首页</a><?php echo catpos($catid);?></div>
      <div class="hh4"><?php $DATA = get("SELECT * FROM `sin_category` WHERE `catid` = '$catid'", 10, 0, "", "");foreach($DATA AS $n => $r) { $n++;?><?php echo $r['name'];?> <?php } unset($DATA); ?></div>
    </div>
    <div class="neirong">
      <div class="title"><?php echo $title;?></div>
      <div class="fabu">发布日期：<?php echo date("Y-m-d",$updatetime);?><span style="padding-left:15px;">浏览次数：<span id="hits">0</span>
  <script language="JavaScript" src="index.php?file=count&contentid=<?php echo $contentid;?>"></script></span></div>
      <div class="content"> <?php echo $content;?> </div>
      <div class="fenye"> <span style="padding-left:15px;">上一篇：
  	 <a href="<?php echo $pre['url'];?>" title="<?php echo $pre['title'];?>"><?php echo $pre['title'];?></a></span> <span style="padding-left:100px;">下一篇：<a href="<?php echo $next['url'];?>" title="<?php echo $next['title'];?>"><?php echo $next['title'];?></a></span> </div>
    </div>
  </div>
</div><?php include template('phpsin','footer'); ?>
