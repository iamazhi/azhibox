<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('phpsin','header'); ?>
<div id="banner"><img src="skin/images/banner.jpg"></div>
<div id="slogan"><p>我们诚心为您提供最稳定的产品，最专业的技术方案，最全面的贴心服务。</p></div>
<div id="ours">
  <div class="our">
    <div>
      <h2><a class="custom-font" href="index.php?file=list&catid=3">我们的公司</a></h2>
      <p>我们成立于1994年，是专业代理世界顶尖品牌焊接器材及自主研发制造自动化焊接专机的高新技术企业。</p>
    </div>
  </div>
  <div class="our">
    <div>
      <h2><a class="custom-font" href="index.php?file=list&catid=5">我们的产品</a></h2>
      <p>我们是欧美多家名牌焊接设备及耗材法定中国代理商，如法国AIRLIQUIDE/SAF、AXXAIR、德国ORBITALUM、STAPLA等， 公司更自主开发出各种大功率等离子焊机，罐体焊接机，薄壁内胆焊接机等。</p>
    </div>
  </div>
  <div class="our">
    <div>
      <h2><a class="custom-font" href="index.php?file=list&catid=46">我们的服务</a></h2>
      <p>我们提供从技术方案，设计制造，安装调试到培训人员等全套完善的服务。</p>
    </div>
  </div>
  <div class="our">
    <div>
      <h2><a class="custom-font" href="index.php?file=list&catid=4">我们的技术</a></h2>
      <p>我们有非常专业的技术人才，并随时与国际国内焊接领域的科研院校、研究机构保持紧密的联系，及时把握技术、产业和市场的动态</p>
    </div>
  </div>
</div>

<div id="services">
  <div id="firstBox">
    <div class="cellBox11"><div class="cell padding-l padding-r padding-b"><img src="skin/images/Nipic_1659036_20110616131013393143.jpg"></div></div>
    <div class="cellBox21" id="customBox1"><div class="cell padding-b padding-l"><div><a class="custom-font">服务行业</a></div></div></div>
    <div class="cellBox32"><div class="cell padding-t padding-l"><img src="skin/images/Nipic_5289513_20100630130047069195.jpg"></div></div>
  </div>
  <div id="middleBox">
    <div class="cellBox32"><div class="cell padding-b"><img src="skin/images/Nipic_8981243_20120521092023333000.jpg"></div></div>
    <div class="cellBox11"><div class="cell padding-t padding-r"><img src="skin/images/Nipic_6842469_20121220194403229185.jpg"></div></div>
    <div class="cellBox21"><div class="cell padding-t padding-l"><img src="skin/images/Nipic_8981243_20120521092023756000.jpg"></div></div>
  </div>
  <div id="thirdBox">
    <div class="cellBox21"><div class="cell padding-r padding-b"><img src="skin/images/Nipic_8981243_20120521092019979000.jpg"></div></div>
    <div class="cellBox11"><div class="cell padding-l padding-b"><img src="skin/images/Nipic_11840347_20130820104422632178.jpg"></div></div>
    <div class="cellBox11"><div class="cell padding-t padding-r padding-b"><img src="skin/images/Nipic_9808227_20120424153557179114.jpg"></div></div>
    <div class="cellBox22"><div class="cell padding-t padding-l"><img src="skin/images/Nipic_218586_20100319131605084941.jpg"></div></div>
<div class="clear"></div>
    <div class="cellBox11" id="customBox2">
      <div class="cell padding-t padding-r">
        <div><a class="custom-font" href="index.php?file=list&catid=46">更多..</a></div>
      </div>
    </div>
  </div>
</div>

<div id="friends">
  <div class="title"><a class="custom-font" >友情链接</a></div>
  <div class="desc"><p>凡是经过考验的朋友，就应该把他们紧紧地团结在你的周围。--莎士比亚</p></div>
  <div class="links">
    <?php $DATA = get("SELECT * FROM `sin_link` WHERE linktype=2 AND passed=1", 20, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
     <a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['name'];?></a>
    <?php } unset($DATA); ?>
  </div>

</div>

<div id="liteFooter">
  <div class="leftBox">
    <div>
      <h2 class="custom-font" >只要有接触，就会有收获</h2>
      <p>--做中国服务最周到的供应商</p>
    </div>
  </div>
  <div class="rightBox">
    <div><a class="custom-font" href="index.php?file=list&catid=5">点击进入</a></div>
  </div>
</div>

<?php include template('phpsin','footer'); ?>
