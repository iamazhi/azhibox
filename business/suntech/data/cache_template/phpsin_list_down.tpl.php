<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('phpsin','header'); ?>
<div class="bannerer"><script language="javascript" src="<?php echo SITE_URL;?>/data/js.php?id=1"></script></div>
<div class="main">
  <div class="left">
    <div class="title"><h3>栏目导航</h3></div>
    <div class="daohang">
      <ul>
       <?php $DATA = get("SELECT * FROM `sin_category` WHERE `parentid` = '5'", 10, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
        <li><a href="<?php echo $r['url'];?>"><?php echo $r['name'];?></a></li>
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
    <div class="down">
      <ul>
       <?php $data = tag('phpsin', '', "SELECT a.contentid,a.catid,a.title,a.description,b.content,b.downurl,a.url,a.updatetime,a.posids,b.down1,b.down2 FROM `sin_content` a, `sin_c_down` b WHERE a.contentid=b.contentid AND a.status=99  ".get_sql_catid(7)." ORDER BY a.contentid DESC", $page, 10, 7);$pages=$data[pages];$data=$data[data];?>
        <?php if(is_array($data)) foreach($data AS $n => $v) { ?>
         <li>
          <p><span class="biaoti2"><a href="/"><?php echo str_cut($v[title],30);?></a></span><span class="shijian">2014-03-20</span></p>
          <p class="miaoshu"><?php echo $v['description'];?></p>
          <p class="xiazai"><a href="<?php echo $v['down1'];?>">点击下载</a></p>
        </li>
         <?php } ?>
         <?php unset($data); ?>
           </ul>
      <div class="pagess"><?php echo $pages['1'];?></div>
    </div>
  </div>
</div>
<?php include template('phpsin','footer'); ?>
