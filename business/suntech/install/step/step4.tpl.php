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
             <td width="150">Ŀ¼�ļ�</td>
             <td width="300">����״̬</td>
             <td width="100">��ǰ״̬</td>
           
         </tr>
                  <tr style="text-align:center;">
             <td>����ϵͳ</td>
             <td>��ǰ����</td>
             <td>�����</td>
          
         </tr>
       <?php foreach ($filesmod as $filemod) {?>
                 <tr style="text-align:center;">
                    <td><?php echo $filemod['file']?></td>
                    <td><span><img src="skin/images/correct.gif" />&nbsp;��д</span></td>
                    <td><?php echo $filemod['is_writable'] ? '<span><img src="skin/images/correct.gif" />&nbsp;��д</span>' : '<font class="red"><img src="skin/images/error.gif" />&nbsp;����д</font>'?></td>
                  </tr>
					<?php } ?>
         </table>
         
         <div class="clr"></div>
       </div>
       <div style="height:16px; background:url(skin/images/buttom.jpg) no-repeat"></div>
       <div class="btnbox">
         <div class="btn_box"><a href="javascript:history.go(-1);" class="s_btn">��һ��</a>
             <?php if($no_writablefile == 0) {?>
            <a href="javascript:void(0);"  onClick="$('#install').submit();return false;" class="x_btn">��һ��</a>
            <?php } else {?>
			<a onClick="alert('���ڲ���дĿ¼�����ļ�');" class="x_btn pre">��ⲻͨ��</a>
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
