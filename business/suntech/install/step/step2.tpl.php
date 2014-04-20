<?php include PHPSIN_PATH.'install/step/header.tpl.php';?>
  <div class="warp">
     <div class="header"></div>
        <div class="nav_hd">
       <div class="nav_bz a2">
      </div>
    </div>
     <div class="content">
       <div class="box">
       <div class="l_box"></div>
       
         <table border="0" cellspacing="1" class="table">
         <tr style="text-align:center;">
             <td width="150">检查项目</td>
             <td width="270">当前环境</td>
             <td width="160">美睿建议</td>
             <td width="70">功能影响</td>
         </tr>
                  <tr style="text-align:center;">
             <td>操作系统</td>
             <td><?php echo php_uname();?></td>
             <td>Windows_NT/Linux/Freebsd</td>
             <td><span><img src="skin/images/correct.gif" /></span></td>
         </tr>
             <tr style="text-align:center;">
             <td>WEB 服务器</td>
             <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
             <td>Apache/Nginx/IIS</td>
             <td><span><img src="skin/images/correct.gif" /></span></td>
         </tr>
         </tr>
             <tr style="text-align:center;"><td>PHP 版本</td>
                    <td>PHP <?php echo phpversion();?></td>
                    <td>PHP 5.2.0 及以上</td>
                    <td><?php if(phpversion() >= '5.2.0'){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;无法安装</font><?php }?></font></td>
         </tr>
         </tr>
             <tr style="text-align:center;">
             <td>MYSQL 扩展</td>
                    <td><?php if(extension_loaded('mysql')){ ?>√<?php }else{ ?>×<?php }?></td>
                    <td>必须开启</td>
                    <td><?php if(extension_loaded('mysql')){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;无法安装</font><?php }?></td>
         </tr>
         </tr>
             <tr style="text-align:center;">
             <td>ICONV/MB_STRING 扩展</td>
                    <td><?php if(extension_loaded('iconv') || extension_loaded('mbstring')){ ?>√<?php }else{ ?>×<?php }?></td>
                    <td>必须开启</td>
                    <td><?php if(extension_loaded('iconv') || extension_loaded('mbstring')){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;字符集转换效率低</font><?php }?></td>
         </tr>
         </tr>
             <tr style="text-align:center;"><td>JSON扩展</td>
             <td><?php if($PHP_JSON){ ?>√<?php }else{ ?>×<?php }?></td>
                    <td>必须开启</td>
                    <td><?php if($PHP_JSON){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;不只持json,<a href="http://pecl.php.net/package/json" target="_blank">安装 PECL扩展</a></font><?php }?></td>
         </tr>
         </tr>
             <tr style="text-align:center;">
             <td>GD 扩展</td>
                    <td><?php if($PHP_GD){ ?>√ （支持 <?php echo $PHP_GD;?>）<?php }else{ ?>×<?php }?></td>
                    <td>建议开启</td>
                    <td><?php if($PHP_GD){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;不支持缩略图和水印</font><?php }?></td>
         </tr>
         </tr>
             <tr style="text-align:center;">
              <td>ZLIB 扩展</td>
                    <td><?php if(extension_loaded('zlib')){ ?>√<?php }else{ ?>×<?php }?></td>
                    <td>建议开启</td>
                    <td><?php if(extension_loaded('zlib')){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;不支持Gzip功能</font><?php }?></td>
         </tr>
         </tr>
             <tr style="text-align:center;">
             <td>FTP 扩展</td>
                    <td><?php if(extension_loaded('ftp')){ ?>√<?php }else{ ?>×<?php }?></td>
                    <td>建议开启</td>
                    <td><?php if(extension_loaded('ftp')){ ?><span><img src="skin/images/correct.gif" /></span><?php }elseif(ISUNIX){ ?><font class="red"><img src="images/error.gif" />&nbsp;不支持FTP形式文件传送</font><?php }?></td>
         </tr>
         </tr>
             <tr style="text-align:center;">
              <td>allow_url_fopen</td>
                    <td><?php if(ini_get('allow_url_fopen')){ ?>√<?php }else{ ?>×<?php }?></td>
                    <td>建议打开</td>
                    <td><?php if(ini_get('allow_url_fopen')){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;不支持保存远程图片</font><?php }?></td>
         </tr>
         </tr>
             <tr style="text-align:center;">
             <td>fsockopen</td>
                    <td><?php if(function_exists('fsockopen')){ ?>√<?php }else{ ?>×<?php }?></td>
                    <td>建议打开</td>
                    <td><?php if($PHP_FSOCKOPEN=='1'){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;不支持fsockopen函数</font><?php }?></td>
         </tr> </tr>
             <tr style="text-align:center;">
             <td>DNS解析</td>
                    <td><?php if($PHP_DNS){ ?>√<?php }else{ ?>×<?php }?></td>
                    <td>建议设置正确</td>
                    <td><?php if($PHP_DNS){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;不支持采集和保存远程图片</font><?php }?></td>
         </tr>
         </table>
         
         <div class="clr"></div>
       </div>
       <div style="height:16px; background:url(skin/images/buttom.jpg) no-repeat"></div>
       <div class="btnbox">
          <div class="btn_box">
          <a href="javascript:history.go(-1);" class="s_btn pre">上一步</a>
            <?php if($is_right) { ?>
            <a href="javascript:void(0);"  onClick="$('#install').submit();return false;" class="x_btn">下一步</a></div>
            <?php }else{ ?>
			<a onClick="alert('当前配置不满足Phpcms安装需求，无法继续安装！');" class="x_btn pre">检测不通过</a>
 			<?php }?>
			<form id="install" action="install.php?" method="get">
			<input type="hidden" name="step" value="3">
			</form>
          
          </div>
       </div>
     </div>
  </div>
</body>
</html>
