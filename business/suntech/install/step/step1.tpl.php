<?php include PHPSIN_PATH.'install/step/header.tpl.php';?>
<body>
  <div class="warp">
     <div class="header"></div>
     
    <div class="nav_hd">
       <div class="nav_bz a1">
      </div>
    </div>
    
     <div class="content">
       <div class="box">
       <div class="l_box"></div>
         <div class="r_box">
      
          <?php echo format_textarea($license)?>
         </div>
         <div class="clr"></div>
       </div>
       <div style="height:16px; background:url(skin/images/buttom.jpg) no-repeat"></div>
       <div class="btnbox">
          <div class="button"><a href="javascript:void(0);"  onClick="$('#install').submit();return false;">开始安装</a></div>
          <form id="install" action="install.php?" method="get">
			<input type="hidden" name="step" value="2">
			</form>
       </div>
     </div>
  </div>
</body>
</html>
