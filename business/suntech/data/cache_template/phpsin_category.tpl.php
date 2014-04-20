<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('phpsin','header_english'); ?>
<div class="content">
    <div class="banner">
      <ul>
        <li style="display:block;">
          <div class="demo">
            <div class="select"><a href="#" class="cur">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a></div>
            <ul>
{tag_首页焦点}
 <?php if(is_array($data)) foreach($data AS $n => $v) { ?>
<li style="<?php if($n==1) { ?>display:block;<?php } ?>"><a href="<?php echo $v['links'];?>" target="_blank"><img src="<?php echo $v['foucs'];?>" width="980" height="305"/></a></li>
<?php } ?>
<?php unset($data); ?>
            </ul>
          </div>
          <a href="#" target="_blank"></a></li>
      </ul>
    </div>
    <div class="left">
      <div class="info">
        <div class="info_top"><span>Company</span><a href="/sin/english/companyprofile/">more</a></div>
        <div class="info_cen"><img src="skin/images/banner_29.jpg" />
          <p><?php $DATA = get("SELECT * FROM `phpjsj_content` WHERE `contentid` = '8'", 1, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
<?php echo str_cut($r[description],390);?>
<?php } unset($DATA); ?><a href="/sin/english/companyprofile/">（more......）</a></p>
        </div>
      </div>
      <div class="product">
        <div class="info_top"><span>Products</span><a href="sin/product/">more</a></div>
        <div class="product_cen">
         <ul>
{tag_产品展示en}
 <?php if(is_array($data)) foreach($data AS $n => $v) { ?>
<li><a href="<?php echo $v['url'];?>"><img src="<?php echo $v['thumb'];?>" width="149" height="149" /></a><a href="<?php echo $v['url'];?>"><?php echo $v['title'];?></a></li>
<?php } ?>
<?php unset($data); ?>
         </ul>
        </div>
      </div>
    </div>
    <div class="right">
     <div class="new">
      <div class="new_top"><span>News</span><a href="#">more</a></div>
      <div class="new_cen">
       <ul>
{tag_home新闻中心}
 <?php if(is_array($data)) foreach($data AS $n => $v) { ?>
<li>&bull; <a href="<?php echo $v['url'];?>" ><?php echo str_cut($v[title],20);?></a><span>02-18</span></li>
<?php } ?>
<?php unset($data); ?>
       </ul>
      </div>
     </div>
     <div class="contact">
      <div class="new_top"><span>About US</span><a href="#">more</a></div> 
      <div class="contact_cen"><img src="skin/images/contact_52.jpg" />
       <p>Name： Yiyang Company<br />
          Address：WenZhouShi<br />
          Phone： +860311-67667013<br />
          Fax： 0311-67667013<br />
          Phone： 15103312260<br />
          Email：Meiray@163.com</p>
      </div>    
     </div>
    </div>
  </div>
<?php include template('phpsin','footer_english'); ?>
