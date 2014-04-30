<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('phpsin','header'); ?>
<div class="bannerer"><script language="javascript" src="<?php echo SITE_URL;?>/data/js.php?id=1"></script></div>
<div class="main">
  <div class="left">
    <div class="title"><h3>栏目导航</h3></div>
    <div class="daohang">
      <ul> <?php $data = tag('phpsin', '', "SELECT * FROM sin_category WHERE ".get_parentid($catid)."", 0, 101);?> <?php if(is_array($data)) foreach($data AS $n => $v) { ?> <li <?php if($catid==$v[catid]) { ?>class="selected"<?php } ?>><a href="<?php echo $v['url'];?>" ><?php echo $v['name'];?></a></li> <?php } ?> <?php unset($data); ?> </ul>
    </div>
    <p style="padding-top:10px;"><img src="skin/images/lianxi.jpg" width="210" height="84" /></p>
  </div>
  <div class="right">
    <div class="hh3">
      <div class="location" style="float:right;">当前位置：<a href="/">网站首页</a><?php echo catpos($catid);?></div>
      <div class="hh4"><?php $DATA = get("SELECT * FROM `sin_category` WHERE `catid` = '$catid'", 10, 0, "", "");foreach($DATA AS $n => $r) { $n++;?><?php echo $r['name'];?> <?php } unset($DATA); ?></div></div>
    <div class="single"> <?php echo $content;?></div>
  </div>
</div>
<?php include template('phpsin','footer'); ?>
