<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><div id="footer">
  <div id="footerContent">
  <div>
<div>
  <div class="title"><a class="custom-font" href="index.php?file=list&catid=3">关于我们</a></div>
  <div class="desc">
<p>珠海市新维焊接器材有限公司成立于1994年，是一家专业从事焊接产品销售及自动焊专机研究与制造的高新技术企业。 工厂占地面积30亩，一期建筑面积4900平方，拥有焊接，电气自动化，机械设计及制造等各类专业技术 人才及加工设备，可提供从技术方案，设计制造，安装调试到培训服务的交钥匙工程..
  <a href="index.php?file=list&catid=3">更多>></a>
</p>
  </div>
</div>
  </div>

  <div>
<div>
  <div class="title"><a class="custom-font" href="index.php?file=list&catid=9">联系我们</a></div>
  <div class="desc">
<p><span class="icon-star">★</span> 公司名称：珠海市新维焊接器材有限公司</p>
<p><span class="icon-star">★</span> 电话：0756-6808989 4000-828-168</p>
<p><span class="icon-star">★</span> 传真：0756-6808966</p>
<p><span class="icon-star">★</span> 公司邮箱：sunteach.zh@gmail.com</p>
<p><span class="icon-star">★</span> 地址：广东省珠海市金湾区三灶镇机场西路1476号</p>
  </div>
</div>
  </div>

  <div>
   <div>
  <div class="title"><a class="custom-font" href="index.php?file=list&catid=5">新品推荐</a></div>
  <div class="desc">
<div>
<?php $data = tag('phpsin', '', "SELECT a.contentid,a.catid,a.title,a.style,a.thumb,a.url FROM `sin_content` a, `sin_content_position` p WHERE a.contentid=p.contentid AND p.posid=2 AND a.status=99  ".get_sql_catid(5)." ORDER BY a.contentid DESC", $page, 6, 5);$pages=$data[pages];$data=$data[data];?>
  <a href="<?php echo $data['1']['url'];?>" title="<?php echo str_cut($data[1][title],15);?>"><img src="<?php echo $data['1']['thumb'];?>" width="90" height="70" /></a>
  <a href="<?php echo $data['2']['url'];?>" title="<?php echo str_cut($data[2][title],15);?>"><img src="<?php echo $data['2']['thumb'];?>" width="90" height="70" /></a>
  <a href="<?php echo $data['3']['url'];?>" title="<?php echo str_cut($data[3][title],15);?>"><img src="<?php echo $data['3']['thumb'];?>" width="90" height="70" /></a>
  <a href="<?php echo $data['4']['url'];?>" title="<?php echo str_cut($data[4][title],15);?>"><img src="<?php echo $data['4']['thumb'];?>" width="90" height="70" /></a>
<?php unset($data); ?>
</div>
<div>
<?php $data = tag('phpsin', '', "SELECT a.contentid,a.catid,a.title,a.style,a.thumb,a.url FROM `sin_content` a, `sin_content_position` p WHERE a.contentid=p.contentid AND p.posid=2 AND a.status=99  ".get_sql_catid(5)." ORDER BY a.contentid DESC", $page, 6, 5);$pages=$data[pages];$data=$data[data];?>
  <a href="<?php echo $data['5']['url'];?>" title="<?php echo str_cut($data[5][title],15);?>"><img src="<?php echo $data['5']['thumb'];?>" width="90" height="70" /></a>
  <a href="<?php echo $data['6']['url'];?>" title="<?php echo str_cut($data[6][title],15);?>"><img src="<?php echo $data['6']['thumb'];?>" width="90" height="70" /></a>
  <a href="<?php echo $data['7']['url'];?>" title="<?php echo str_cut($data[7][title],15);?>"><img src="<?php echo $data['7']['thumb'];?>" width="90" height="70" /></a>
  <a href="<?php echo $data['8']['url'];?>" title="<?php echo str_cut($data[8][title],15);?>"><img src="<?php echo $data['8']['thumb'];?>" width="90" height="70" /></a>
<?php unset($data); ?>
</div>
  </div>
</div>
  </div>
  </div>
  <div id="copyRights">
    <span class="left custom-font"><?php echo $PHPSIN["icpno"];?></span>
    <span class="right custom-font">百度分享、后台管理<span>
  </div>
</div>

</body>
</html>
