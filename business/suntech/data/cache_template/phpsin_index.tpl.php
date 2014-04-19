<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('phpsin','header'); ?>
<div class="banner">
       <div class="select"><a href="/" class="cur"></a><a href="/"></a><a href="/"></a><a href="/"></a> </div>
  <ul>
    <li style="display:block;">
      <div class="demo">
        <ul>
           <?php $DATA = get("SELECT * FROM `sin_focus` WHERE passed=1 and typeid=2", 4, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
          <?php if($r[elite]==1) { ?>
           <li <?php if($n==1) { ?>style="display:block;background:url(<?php echo $r['thumb'];?>) ;background-position:top center;width:100%; height:327px;"<?php } ?>><a href="<?php echo $r['url'];?>" target="_blank" ></a></li>
         <?php } else { ?>
         <li <?php if($n==1) { ?>style="display:block;background:url(<?php echo $r['thumb'];?>) ;background-position:top center;width:100%; height:327px;"<?php } ?>><a href="<?php echo $r['url'];?>" target="_blank"></a></li>
          <?php } ?>
          <?php } unset($DATA); ?>
        </ul>
      </div>
    <a href="/" target="_blank"></a></li>
  </ul>
</div>
<div class="main">
  <div class="main-left">
    <div><span class="more"><a href="index.php?file=list&catid=3">点击更多>></a></span><span class="hh"><a href="index.php?file=list&catid=3">关于我们</a></span><span class="hh1"><a href="index.php?file=list&catid=3">about us</a></span></div>
    <div class="abo">
   <?php $DATA = get("SELECT * FROM `sin_content` WHERE `contentid` = '1'", 10, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
    <?php echo str_cut($r[description],200);?>
  <?php } unset($DATA); ?>
  </div>
    <div class="tupian"><a href="index.php?file=list&catid=6"><img src="skin/images/yingxiao.jpg" width="135" height="80" /></a><a href="index.php?file=list&catid=7"><img src="skin/images/xiazai.jpg" width="135" height="80" class="img" /></a></div>
    <div class="sousuo">
      <select name="" class="sel">
        <option>-友情链接-</option>
        <?php $DATA = get("SELECT * FROM `sin_link` WHERE linktype=2 AND passed=1", 20, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
         <option><a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['name'];?></a></option>
         <?php } unset($DATA); ?>
      </select>
    </div>
  </div>
  <div class="main-center">
    <div class="tab">
      <ul>
        <li id="a1" onmouseover="setTab('a',1,4)" class="curr"><a href="index.php?file=list&catid=10">公司新闻</a></li>
        <li id="a2" onmouseover="setTab('a',2,4)" ><a href="index.php?file=list&catid=11">行业动态</a></li>
        <li id="a3" onmouseover="setTab('a',3,4)" >媒体报道</li>
        <li id="a4" onmouseover="setTab('a',4,4)" >焊接知识</li>
      </ul>
    </div>
    <div id="con_a_1" class="cc">
     <?php $DATA = get("SELECT * FROM `sin_content` WHERE `catid` = '10'", 1, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
      <?php if($n ==1) { ?>
      <p class="biaoti"><a href="<?php echo $r['url'];?>"><?php echo str_cut($r[title],40);?></a></p>
      <div class="ccc">
         <img src="<?php echo $r['thumb'];?>" width="128" height="86" />
        <p class="miaoshu"><?php echo str_cut($r[description],80);?></p>
        <p class="xiangxi"><a href="<?php echo $r['url'];?>">详细内容>></a></p>
      </div>
  <?php } ?>
  <?php } unset($DATA); ?>
      <ul>
     <?php $DATA = get("SELECT * FROM `sin_content` WHERE `catid` = '10'", 6, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
    <?php if($n !=1) { ?>
        <li><span style="float:right;">[<?php echo date("Y-m-d",$r[updatetime]);?>]</span><a href="<?php echo $r['url'];?>"><?php echo str_cut($r[title],40);?></a></li>
     <?php } ?>
     <?php } unset($DATA); ?>
      </ul>
    </div>
    <div id="con_a_2" class="cc" style="display:none;" >
     <?php $DATA = get("SELECT * FROM `sin_content` WHERE `catid` = '11'", 1, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
      <?php if($n ==1) { ?>
      <p class="biaoti"><a href="<?php echo $r['url'];?>"><?php echo str_cut($r[title],40);?></a></p>
      <div class="ccc">
         <img src="<?php echo $r['thumb'];?>" width="128" height="86" />
        <p class="miaoshu"><?php echo str_cut($r[description],80);?></p>
        <p class="xiangxi"><a href="<?php echo $r['url'];?>">详细内容>></a></p>
      </div>
     <?php } ?>
     <?php } unset($DATA); ?>      
      <ul>
         <?php $DATA = get("SELECT * FROM `sin_content` WHERE `catid` = '11'", 6, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
    <?php if($n !=1) { ?>
        <li><span style="float:right;">[<?php echo date("Y-m-d",$r[updatetime]);?>]</span><a href="<?php echo $r['url'];?>"><?php echo str_cut($r[title],40);?></a></li>
     <?php } ?>
     <?php } unset($DATA); ?>
      </ul>
    </div>
    <div id="con_a_3" class="cc" style="display:none;" >
       <?php $DATA = get("SELECT * FROM `sin_content` WHERE `catid` = '13'", 1, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
      <?php if($n ==1) { ?>
      <p class="biaoti"><a href="<?php echo $r['url'];?>"><?php echo str_cut($r[title],40);?></a></p>
      <div class="ccc">
         <img src="<?php echo $r['thumb'];?>" width="128" height="86" />
        <p class="miaoshu"><?php echo str_cut($r[description],80);?></p>
        <p class="xiangxi"><a href="<?php echo $r['url'];?>">详细内容>></a></p>
      </div>
     <?php } ?>
     <?php } unset($DATA); ?> 
      <ul>
    <?php $DATA = get("SELECT * FROM `sin_content` WHERE `catid` = '13'", 6, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
    <?php if($n !=1) { ?>
        <li><span style="float:right;">[<?php echo date("Y-m-d",$r[updatetime]);?>]</span><a href="<?php echo $r['url'];?>"><?php echo str_cut($r[title],40);?></a></li>
     <?php } ?>
     <?php } unset($DATA); ?>
      </ul>
    </div>
    <div id="con_a_4" class="cc" style="display:none;" >
         <?php $DATA = get("SELECT * FROM `sin_content` WHERE `catid` = '13'", 1, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
      <?php if($n ==1) { ?>
      <p class="biaoti"><a href="<?php echo $r['url'];?>"><?php echo str_cut($r[title],40);?></a></p>
      <div class="ccc">
         <img src="<?php echo $r['thumb'];?>" width="128" height="86" />
        <p class="miaoshu"><?php echo str_cut($r[description],80);?></p>
        <p class="xiangxi"><a href="<?php echo $r['url'];?>">详细内容>></a></p>
      </div>
     <?php } ?>
     <?php } unset($DATA); ?>   
    <ul>
         <?php $DATA = get("SELECT * FROM `sin_content` WHERE `catid` = '13'", 6, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
    <?php if($n !=1) { ?>
        <li><span style="float:right;">[<?php echo date("Y-m-d",$r[updatetime]);?>]</span><a href="<?php echo $r['url'];?>"><?php echo str_cut($r[title],40);?></a></li>
     <?php } ?>
     <?php } unset($DATA); ?>
      </ul>
    </div>
    <script type="text/javascript">
function setTab(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?"curr":"";
con.style.display=i==cursel?"block":"none";}
}
</script> 
  </div>
  <div class="main-right">
    <div class="hh2">新品推荐</div>
     <div class="slide">
    <div class="FocusPic">
        <div class="content" id="main-slide">
            <div class="changeDiv">
               <?php $data = tag('phpsin', '', "SELECT a.contentid,a.catid,a.title,a.thumb,a.description,a.posids,a.url FROM `sin_content` a, `sin_content_position` p WHERE a.contentid=p.contentid AND p.posid=2 AND a.status=99  ".get_sql_catid(5)." ORDER BY a.contentid DESC", 0, 5);?>
         <?php if(is_array($data)) foreach($data AS $n => $v) { ?>
                 <a href="<?php echo $v['url'];?>" title="<?php echo str_cut($v[title],15);?>"><img src="<?php echo $v['thumb'];?>" width="196" height="147" /></a>
            <?php } ?>
             <?php unset($data); ?>
             </div>
        </div>
    </div>
</div>
<script type="text/javascript"> 
$(function(){
new slide("#main-slide","cur",205,145,1);//焦点图
})
function $jquery(id){return document.getElementById(id)
 };
</script>


    <p style="padding-top:10px;"><img src="skin/images/lianxi.jpg" width="210" height="84" /></p>
  </div>
</div>
<?php include template('phpsin','footer'); ?>
