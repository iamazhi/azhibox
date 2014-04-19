<?php include PHPSIN_PATH.'install/step/header.tpl.php';?>
  <div class="warp">
     <div class="header"></div>
       <div class="nav_hd">
       <div class="nav_bz a4">
      </div>
     <div class="content">
       <div class="box">
       <div class="l_box"></div>
       
         <table border="0" cellspacing="1" class="table">
         <tr style="text-align:center;">
             <td width="150">目录文件</td>
             <td width="300">所需状态</td>
             <td width="100">当前状态</td>
           
         </tr>
                  <tr style="text-align:center;">
             <td>操作系统</td>
             <td>当前环境</td>
             <td>美睿建议</td>
          
         </tr>
       <?php foreach ($filesmod as $filemod) {?>
                 <tr style="text-align:center;">
                    <td><?php echo $filemod['file']?></td>
                    <td><span><img src="skin/images/correct.gif" />&nbsp;可写</span></td>
                    <td><?php echo $filemod['is_writable'] ? '<span><img src="skin/images/correct.gif" />&nbsp;可写</span>' : '<font class="red"><img src="skin/images/error.gif" />&nbsp;不可写</font>'?></td>
                  </tr>
					<?php } ?>
         </table>
         
         <div class="clr"></div>
       </div>
       <div style="height:16px; background:url(skin/images/buttom.jpg) no-repeat"></div>
       <div class="btnbox">
         <div class="btn_box"><a href="javascript:history.go(-1);" class="s_btn">上一步</a>
             <?php if($no_writablefile == 0) {?>
            <a href="javascript:void(0);"  onClick="$('#install').submit();return false;" class="x_btn">下一步</a>
            <?php } else {?>
			<a onClick="alert('存在不可写目录或者文件');" class="x_btn pre">检测不通过</a>
            <?php } ?>
            </div>
			<form id="install" action="install.php?" method="post">
			<input type="hidden" name="step" value="5">
			<input type="hidden" id="selectmod" name="selectmod" value="<?php echo $selectmod?>" />
			<input type="hidden" name="testdata" value="<?php echo $testdata?>" />
			<input type="hidden" id="install_phpsin" name="install_phpsin" value="<?php echo $install_phpsin?>" />
			
			</form>
       </div>
     </div>
  </div>
</body>
</html>
