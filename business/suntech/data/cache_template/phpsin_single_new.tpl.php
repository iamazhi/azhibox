<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('phpsin','header'); ?>
 <div class="bannerer"><script language="javascript" src="<?php echo SITE_URL;?>/data/js.php?id=1"></script></div>
<div class="main">
  <div class="left">
    <div class="hh2">栏目导航</div>
    <div class="daohang">
      <ul>
<?php $DATA = get("SELECT * FROM `sin_category` WHERE `parentid` = '5'", 100, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
<li><a href="<?php echo $r['url'];?>" ><?php echo $r['name'];?></a></li>
<?php } unset($DATA); ?>
      </ul>
    </div>
    <p style="padding-top:10px;"><img src="skin/images/lianxi.jpg" width="210" height="84" /></p>
  </div>
  <div class="right">
    <div class="hh3">
      <div class="location" style="float:right;">当前位置：<a href="/">网站首页</a><?php echo catpos($catid);?></div>
      <div class="hh4"><?php $DATA = get("SELECT * FROM `sin_category` WHERE `catid` = '$catid'", 10, 0, "", "");foreach($DATA AS $n => $r) { $n++;?><?php echo $r['name'];?>

<?php } unset($DATA); ?></div>
    </div>
    <div class="single"> 
     <?php echo $content;?></div>
  </div>
</div><?php include template('phpsin','footer'); ?>
