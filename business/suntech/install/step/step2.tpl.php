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
             <td width="150">�����Ŀ</td>
             <td width="270">��ǰ����</td>
             <td width="160">�����</td>
             <td width="70">����Ӱ��</td>
         </tr>
                  <tr style="text-align:center;">
             <td>����ϵͳ</td>
             <td><?php echo php_uname();?></td>
             <td>Windows_NT/Linux/Freebsd</td>
             <td><span><img src="skin/images/correct.gif" /></span></td>
         </tr>
             <tr style="text-align:center;">
             <td>WEB ������</td>
             <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
             <td>Apache/Nginx/IIS</td>
             <td><span><img src="skin/images/correct.gif" /></span></td>
         </tr>
         </tr>
             <tr style="text-align:center;"><td>PHP �汾</td>
                    <td>PHP <?php echo phpversion();?></td>
                    <td>PHP 5.2.0 ������</td>
                    <td><?php if(phpversion() >= '5.2.0'){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;�޷���װ</font><?php }?></font></td>
         </tr>
         </tr>
             <tr style="text-align:center;">
             <td>MYSQL ��չ</td>
                    <td><?php if(extension_loaded('mysql')){ ?>��<?php }else{ ?>��<?php }?></td>
                    <td>���뿪��</td>
                    <td><?php if(extension_loaded('mysql')){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;�޷���װ</font><?php }?></td>
         </tr>
         </tr>
             <tr style="text-align:center;">
             <td>ICONV/MB_STRING ��չ</td>
                    <td><?php if(extension_loaded('iconv') || extension_loaded('mbstring')){ ?>��<?php }else{ ?>��<?php }?></td>
                    <td>���뿪��</td>
                    <td><?php if(extension_loaded('iconv') || extension_loaded('mbstring')){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;�ַ���ת��Ч�ʵ�</font><?php }?></td>
         </tr>
         </tr>
             <tr style="text-align:center;"><td>JSON��չ</td>
             <td><?php if($PHP_JSON){ ?>��<?php }else{ ?>��<?php }?></td>
                    <td>���뿪��</td>
                    <td><?php if($PHP_JSON){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;��ֻ��json,<a href="http://pecl.php.net/package/json" target="_blank">��װ PECL��չ</a></font><?php }?></td>
         </tr>
         </tr>
             <tr style="text-align:center;">
             <td>GD ��չ</td>
                    <td><?php if($PHP_GD){ ?>�� ��֧�� <?php echo $PHP_GD;?>��<?php }else{ ?>��<?php }?></td>
                    <td>���鿪��</td>
                    <td><?php if($PHP_GD){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;��֧������ͼ��ˮӡ</font><?php }?></td>
         </tr>
         </tr>
             <tr style="text-align:center;">
              <td>ZLIB ��չ</td>
                    <td><?php if(extension_loaded('zlib')){ ?>��<?php }else{ ?>��<?php }?></td>
                    <td>���鿪��</td>
                    <td><?php if(extension_loaded('zlib')){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;��֧��Gzip����</font><?php }?></td>
         </tr>
         </tr>
             <tr style="text-align:center;">
             <td>FTP ��չ</td>
                    <td><?php if(extension_loaded('ftp')){ ?>��<?php }else{ ?>��<?php }?></td>
                    <td>���鿪��</td>
                    <td><?php if(extension_loaded('ftp')){ ?><span><img src="skin/images/correct.gif" /></span><?php }elseif(ISUNIX){ ?><font class="red"><img src="images/error.gif" />&nbsp;��֧��FTP��ʽ�ļ�����</font><?php }?></td>
         </tr>
         </tr>
             <tr style="text-align:center;">
              <td>allow_url_fopen</td>
                    <td><?php if(ini_get('allow_url_fopen')){ ?>��<?php }else{ ?>��<?php }?></td>
                    <td>�����</td>
                    <td><?php if(ini_get('allow_url_fopen')){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;��֧�ֱ���Զ��ͼƬ</font><?php }?></td>
         </tr>
         </tr>
             <tr style="text-align:center;">
             <td>fsockopen</td>
                    <td><?php if(function_exists('fsockopen')){ ?>��<?php }else{ ?>��<?php }?></td>
                    <td>�����</td>
                    <td><?php if($PHP_FSOCKOPEN=='1'){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;��֧��fsockopen����</font><?php }?></td>
         </tr> </tr>
             <tr style="text-align:center;">
             <td>DNS����</td>
                    <td><?php if($PHP_DNS){ ?>��<?php }else{ ?>��<?php }?></td>
                    <td>����������ȷ</td>
                    <td><?php if($PHP_DNS){ ?><span><img src="skin/images/correct.gif" /></span><?php }else{ ?><font class="red"><img src="images/error.gif" />&nbsp;��֧�ֲɼ��ͱ���Զ��ͼƬ</font><?php }?></td>
         </tr>
         </table>
         
         <div class="clr"></div>
       </div>
       <div style="height:16px; background:url(skin/images/buttom.jpg) no-repeat"></div>
       <div class="btnbox">
          <div class="btn_box">
          <a href="javascript:history.go(-1);" class="s_btn pre">��һ��</a>
            <?php if($is_right) { ?>
            <a href="javascript:void(0);"  onClick="$('#install').submit();return false;" class="x_btn">��һ��</a></div>
            <?php }else{ ?>
			<a onClick="alert('��ǰ���ò�����Phpcms��װ�����޷�������װ��');" class="x_btn pre">��ⲻͨ��</a>
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
