<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $head["title"];?></title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="keywords" content="<?php echo $head["keywords"];?>" />
<meta name="description" content="<?php echo $head["description"];?>" />
<!-- <base href="<?php echo SITE_URL;?>" /> -->
<link href="skin/css.css" rel="stylesheet" type="text/css" />
<script src="skin/jquery.js" type="text/javascript"></script>
<script src="skin/jquery-1.2.6.pack.js" type="text/javascript"></script>
<script src="skin/base.js" type="text/javascript"></script>
<script src="skin/jquery.min.js" type="text/javascript"></script>
<script src="skin/jquery.sgallery.js" type="text/javascript"></script>
<script src="skin/home.js" type="text/javascript"></script>

</head>

<body>
<div id="header">
  <div id="headerBox">
    <div id="logoBox">
      <img src="skin/images/logo.png"/>
      <div id="logoName" class="custom-font">��ά����</div>
    </div>
    <div id="navBox">
      <div id="nav">
        <ul>
          <li><a href="/">��վ��ҳ <p class="en">home</p> </a> </li>
          <li <?php if($catid==3) { ?>class="selected"<?php } ?> ><a href="index.php?file=list&catid=3">�������� <p class="en">about us</p> </a> </li>
          <li <?php if($catid==4) { ?>class="selected"<?php } ?>><a href="index.php?file=list&catid=4">�������� <p class="en">news</p> </a> </li>
          <li <?php if($catid==5) { ?>class="selected"<?php } ?>><a href="index.php?file=list&catid=5">��Ʒչʾ <p class="en">products</p> </a> </li>
          <li <?php if($catid==46) { ?>class="selected"<?php } ?>><a href="index.php?file=list&catid=46">���̰��� <p class="en">Sales</p> </a> </li>
          <li <?php if($catid==55) { ?>class="selected"<?php } ?>><a href="index.php?file=list&catid=55">��Ʒ�Ƽ� <p class="en">New Products</p> </a> </li>
          <li <?php if($catid==9) { ?>class="selected"<?php } ?>><a href="index.php?file=list&catid=9">��ϵ���� <p class="en">Contact us</p> </a> </li>
        </ul>
      </div>
    </div>
<div class="clear"></div>
  </div>
</div>

