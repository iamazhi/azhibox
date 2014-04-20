<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('phpsin','header_cn'); ?>
<div class="banner"></div>
<div class="main">
  <div class="main-left">
    <div><span class="hh"><a href="index.php?file=list&catid=19">About us</a></span></div>
    <div class="abo">
   <?php $DATA = get("SELECT * FROM `sin_content` WHERE `contentid` = '15'", 10, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
    <?php echo str_cut($r[description],200);?>
  <?php } unset($DATA); ?>
  </div>
    <div class="tupian"><a href="index.php?file=list&catid=22"><img src="skin/images/yingxiao.jpg" width="135" height="80" /></a><a href="index.php?file=list&catid=23"><img src="skin/images/xiazai.jpg" width="135" height="80" class="img" /></a></div>
    <div class="sousuo">
      <select name="" class="sel">
        <option>-Linker-</option>
            <?php $DATA = get("SELECT * FROM `sin_link` WHERE linktype=1 AND typeid=30", 10, 0, "", "");foreach($DATA AS $n => $r) { $n++;?> 
            <option><?php echo $r['name'];?></a></option>
           <?php } unset($DATA); ?>
      </select>
    </div>
  </div>
  <div class="main-center">
    <div class="tab">
      <ul>
        <li id="a1" onmouseover="setTab('a',1,4)" class="curr">Company news</li>
        <li id="a2" onmouseover="setTab('a',2,4)" >Industry dynamics</li>
        <li id="a3" onmouseover="setTab('a',3,4)" >Media coverage</li>
        <li id="a4" onmouseover="setTab('a',4,4)" >Welding knowledge</li>
      </ul>
    </div>
    <div id="con_a_1" class="cc">
     <?php $DATA = get("SELECT * FROM `sin_content` WHERE `catid` = '10'", 1, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
      <?php if($n ==1) { ?>
      <p class="biaoti"><a href="<?php echo $r['url'];?>"><?php echo str_cut($r[title],40);?></a></p>
      <div class="ccc">
         <img src="<?php echo $r['thumb'];?>" width="128" height="86" />
        <p class="miaoshu"><?php echo str_cut($r[description],80);?></p>
        <p class="xiangxi"><a href="<?php echo $r['url'];?>">ÏêÏ¸ÄÚÈÝ>></a></p>
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
        <p class="xiangxi"><a href="<?php echo $r['url'];?>">ÏêÏ¸ÄÚÈÝ>></a></p>
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
       <?php $DATA = get("SELECT * FROM `sin_content` WHERE `catid` = '12'", 1, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
      <?php if($n ==1) { ?>
      <p class="biaoti"><a href="<?php echo $r['url'];?>"><?php echo str_cut($r[title],40);?></a></p>
      <div class="ccc">
         <img src="<?php echo $r['thumb'];?>" width="128" height="86" />
        <p class="miaoshu"><?php echo str_cut($r[description],80);?></p>
        <p class="xiangxi"><a href="<?php echo $r['url'];?>">ÏêÏ¸ÄÚÈÝ>></a></p>
      </div>
     <?php } ?>
     <?php } unset($DATA); ?> 
      <ul>
    <?php $DATA = get("SELECT * FROM `sin_content` WHERE `catid` = '12'", 6, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
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
        <p class="xiangxi"><a href="<?php echo $r['url'];?>">ÏêÏ¸ÄÚÈÝ>></a></p>
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
    <div class="hh2">ÐÂÆ·ÍÆ¼ö</div>
    <div class="pro">
    <?php $data = tag('phpsin', '', "SELECT a.contentid,a.catid,a.title,a.thumb,a.description,a.posids,a.url FROM `sin_content` a, `sin_content_position` p WHERE a.contentid=p.contentid AND p.posid=2 AND a.status=99  ".get_sql_catid(5)." ORDER BY a.contentid DESC", 0, 1);?>
     <?php if(is_array($data)) foreach($data AS $n => $v) { ?>
      <img src="<?php echo $v['thumb'];?>" width="196" height="147" />
      <p class="biaoti1"><a href="<?php echo $v['url'];?>"><?php echo str_cut($v[title],30);?></a></p>
    <?php } ?>
    <?php unset($data); ?>
    </div>
    <p style="padding-top:10px;"><img src="skin/images/lianxi.jpg" width="210" height="84" /></p>
  </div>
</div>
<?php include template('phpsin','footer_cn'); ?>
