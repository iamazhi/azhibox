<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('phpsin','header'); ?>
<div class="bannerer"><script language="javascript" src="<?php echo SITE_URL;?>/data/js.php?id=1"></script></div>
<div class="main">
  <div class="left">
    <div class="title"><h3>栏目导航</h3></div>
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
      <div class="pro-top">
        <div id="preview">
<div class="jqzoom" id="spec-n1">
   	      <?php $DATA = get("SELECT * FROM `sin_attachment` WHERE `contentid` = '$contentid'", 1, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
          <IMG height=350 src="<?php echo UPLOAD_URL;?><?php echo $r['filepath'];?>" jqimg="<?php echo UPLOAD_URL;?><?php echo $r['filepath'];?>" width=350> 
          <?php } unset($DATA); ?>
</div>
<div id="spec-n5">
<div class="control" id="spec-left">
<img src="skin/images/left.gif" />
</div>
<div id="spec-list">
  <ul class="list-h">
          <?php $DATA = get("SELECT * FROM `sin_attachment` WHERE `contentid` = '$contentid'", 10, 0, "", "");foreach($DATA AS $n => $r) { $n++;?> <li><img src="<?php echo UPLOAD_URL;?><?php echo $r['filepath'];?>" > </li> <?php } unset($DATA); ?>
      </ul>
</div>
<div class="control" id="spec-right"> <img src="skin/images/right.gif" /> </div>
    </div>
</div>  
       <SCRIPT type=text/javascript>
$(function(){			
   $(".jqzoom").jqueryzoom({
xzoom:400,
yzoom:400,
offset:10,
position:"right",
preload:1,
lens:1
});
$("#spec-list").jdMarquee({
deriction:"left",
width:350,
height:56,
step:2,
speed:4,
delay:10,
control:true,
_front:"#spec-right",
_back:"#spec-left"
});
$("#spec-list img").bind("mouseover",function(){
var src=$(this).attr("src");
$("#spec-n1 img").eq(0).attr({
src:src.replace("/n5/","/n1/"),
jqimg:src.replace("/n5/","/n0/")
});
$(this).css({
"border":"2px solid #ff6600",
"padding":"1px"
});
}).bind("mouseout",function(){
$(this).css({
"border":"1px solid #ccc",
"padding":"2px"
});
});				
})
</SCRIPT>
<script src="skin/lib.js" type="text/javascript"></script>
    <script src="skin/163css.js" type="text/javascript"></script>
        <p class="biaoti3"><?php echo $title;?></p>
        <p class="miaoshu1"><?php echo $description;?></p>
        <p class="fenxiang">
        
        <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
        <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
        </p>
      </div>
      
      <div class="hhh">
        <div class="hh5">
          <p class="hh6">产品介绍</p>
        </div>
      </div>
      <div class="content"> <?php echo $content;?> </div>
      <div class="fenye1"> <span style="padding-left:15px;">上一个：<a href="<?php echo $pre['url'];?>" title="<?php echo $pre['title'];?>"><?php echo $pre['title'];?></a></span> <span style="padding-left:180px;">下一个：<a href="<?php echo $next['url'];?>" title="<?php echo $next['title'];?>"><?php echo $next['title'];?></a></span> </div>
    </div>
  </div>
</div>
<?php include template('phpsin','footer'); ?>
