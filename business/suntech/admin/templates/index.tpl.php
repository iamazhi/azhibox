<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $PHPWEB['sitename'];?>网站管理 - Powered by Phpweb <?php echo PHPWEB_VERSION;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link rel="stylesheet" type="text/css" href="admin/skin/common.css"/>
<link rel="stylesheet" type="text/css" href="admin/skin/dtree.css"/>
<script type="text/javascript" src="admin/skin/js/LeftFrame.js"></script>
<script type="text/javascript" src="admin/skin/js/dtree.js"></script>
<script type="text/javascript" src="images/js/jquery.js"></script>
<style>
body {
	width:100%;
}
html { overflow:-moz-scrollbars-vertical;overflow-y:on; }
</style>
</head>

<body scroll="no">
<div class="bg">
<div id="header">
  <div class="logo"><img src="admin/skin/images/logo.jpg" /></div>
     <div class="msgtitle">您好：<?php echo $_username;?> ，角色：<?php foreach($ht_role as $v){ foreach($ht_admin_role as $r) { if($v["roleid"]==$r["roleid"]){?><?php echo $v["name"];?> <?php }}}?> | <a href="?&index=manage" target="right">后台首页</a> | <a href="?m=loginout" target="_parent">退出登陆</a> | <a href="../" target="_blank">网站首页</a> </div>
     <div id="nav">
      <UL >
      <?php foreach ($array as $val){?>
        <LI  id="man_nav_<?php echo $val["menuid"];?>" onclick="list_sub_nav(id,'<?php echo $val["name"];?>');"  class="bg_image"><A href="javascript:get_menu(<?php echo $val["menuid"];?>,'t');"><span><?php echo $val["name"];?></span></a></LI>
       <?php }?>
      </UL>
     </div>
</div>

   <div class="currentry">
   <div class="bartitle">
      <div class="titleimg">
      <span id="show_text">管理面板</span>
      </div>
      </div>
   <div class="TxtTab">当前位置：<span id="cuured">欢迎使用《美睿网》后台管理系统!</span><span id="ddc"></span></div>
   </div>
<div id="right_main_nav" >
      <div id="admin_right" style="clear:both;"><div id="inner" class="inner"  ></div></div>
</div>

<div id="main_nav">
<div id="inner" class="inner"  >
<iframe name="right" id="right" frameborder="0" src="?&index=manage" style="height:100%;width:100%;z-index:111;background-color:#ffffff"></iframe></div>
</div>
</div>
<script type="text/javascript" > 
 window.onresize=function()
{
	//var widths = document.body.scrollWidth-238;
    var widths = document.body.scrollWidth-231;
    var heights = document.documentElement.clientHeight-106;
    $("#right").height(heights).width(widths);
	$("#right_main_nav").height((heights+5));
}
window.onresize();

  function  get_menu(ids,types){   
  var ids
  var types
  d = new dTree('d');
		d.add(ids,-1,'');
		
<?php foreach ($menus as $value){echo "d.add(".$value["menuid"].",".$value["pid"].",'".$value["name"]."','".$value["url"]."','".$value["title"]."','".$value["target_line"]."','".$value["icon"]."','".$value["iconOpen"]."');";}

?>

  if (ids==ids)
  {
 // window.top.frames["manframe"]document.write.innerHTML = d;   
  document.getElementById("inner").innerHTML = d;   
 
  }
  }
  s = new dTree('s');
		s.add(1,-1,'');
		
<?php 	
	foreach ($menus as $value)
	{echo "s.add(".$value["menuid"].",".$value["pid"].",'".$value["name"]."','".$value["url"]."','".$value["title"]."','".$value["target_line"]."','".$value["icon"]."','".$value["iconOpen"]."');";
	
	} ?>
document.getElementById("inner").innerHTML = s;  

function parent_file_list(obj)
{
	right.parent_file_list(obj);
}
</script>


</body>
</html>