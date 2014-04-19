<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $head["title"];?></title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="keywords" content="<?php echo $head["keywords"];?>" />
<meta name="description" content="<?php echo $head["description"];?>" />
<base href="<?php echo SITE_URL;?>" />
<link href="skin/css.css" rel="stylesheet" type="text/css" />
<script src="skin/jquery.js" type="text/javascript"></script>
<script src="skin/jquery-1.2.6.pack.js" type="text/javascript"></script>
<script src="skin/base.js" type="text/javascript"></script>
<script src="skin/jquery.min.js" type="text/javascript"></script>
<script src="skin/jquery.sgallery.js" type="text/javascript"></script>
<script src="skin/banner.js" type="text/javascript"></script>

</head>

<body>
<div class="header">
  <div class="head">
    <div class="logo"><img src="skin/images/logo.jpg" width="130" height="62" /></div>
    <div class="head-right">
      <p class="shouye"><span class="sy"><a href="/">返回首页</a></span> <span class="lx"><a href="index.php?file=list&catid=9">联系我们</a></span> <span class="xz"><a href="index.php?file=list&catid=7">下载中心</a></span> <span class="en"><a href="index.php?file=list&catid=16">English</a></span></p>
      <div class="nav">
        <ul>
          <li><a href="/">网站首页
            <p class="yingwen">home</p>
            </a> </li>
          <li <?php if($catid==3) { ?>class="selectd"<?php } ?> ><a href="index.php?file=list&catid=3">关于我们
            <p class="yingwen">about us</p>
            </a> </li>
          <li <?php if($catid==4) { ?>class="selectd"<?php } ?>><a href="index.php?file=list&catid=4">新闻中心
            <p class="yingwen">news</p>
            </a> </li>
          <li <?php if($catid==5) { ?>class="selectd"<?php } ?>><a href="index.php?file=list&catid=5">产品展示
            <p class="yingwen">products</p>
            </a> </li>

          <li <?php if($catid==46) { ?>class="selectd"<?php } ?>><a href="index.php?file=list&catid=46">工程案例
            <p class="yingwen">Sales</p>
            </a> </li>
         
          <li <?php if($catid==55) { ?>class="selectd"<?php } ?>><a href="index.php?file=list&catid=55">新品推荐
            <p class="yingwen">New Products</p>
            </a> </li>
          <li <?php if($catid==9) { ?>class="selectd"<?php } ?>><a href="index.php?file=list&catid=9">联系我们
            <p class="yingwen">Contact us</p>
            </a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>
