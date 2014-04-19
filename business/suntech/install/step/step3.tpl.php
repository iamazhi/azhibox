<?php include PHPSIN_PATH.'install/step/header.tpl.php';?>
<script type="text/javascript">
  $(document).ready(function() {
	$.formValidator.initConfig({autotip:true,formid:"install",onerror:function(msg){}});
  	$("input:radio[name='install_phpsin']").formValidator({relativeid:"install_phpsin_2",tipid:"aiguoTip",tipcss :{"left":"60px"},onshow:"请选择一个安装类型",onfocus:"请选择一个安装类型",oncorrect:"选择完成"}).inputValidator({min:1,max:1,onerror:"请选择一个安装类型"});
	$("#sin_url").formValidator({onshow:"请输入phpsin地址，必须以'/'结束",onfocus:"请输入phpsin地址，必须以'/'结束",empty:false}).inputValidator({onerror:"地址必须以'/'结束"}).regexValidator({regexp:"http:\/\/(.+)\/$",onerror:"地址必须以'/'结束"});	
  })
</script>
   <div class="warp">
     <div class="header"></div>
    <div class="nav_hd">
       <div class="nav_bz a3">
      </div>
    </div>
     <div class="content">
       <div class="box">
       <div class="l_box"></div>
       <div class="right">
       <form id="install" action="install.php?" method="post">
					<input type="hidden" name="step" value="4">
   <fieldset>
  
   <legend>PHPSIN配置</legend>
       	<input type="radio" name="install_phpsin" id="install_phpsin_1" value="1" onclick="set_sin_hidden()" checked="checked">&nbsp;&nbsp;全新安装PHPSIN
   </fieldset> 
   <fieldset><legend>必选模块</legend>
   
       	<label><input type="checkbox" name="admin" value="admin" checked disabled>后台管理模块</label>
        <label><input type="checkbox" name="content" value="content" checked disabled>内容模块</label>
        <label><input type="checkbox" name="member" value="member" checked  disabled>会员模型</label>
       <label><input type="checkbox" name="pay" value="pay" checked  disabled>财务模块</label>
       <label><input type="checkbox" name="special" value="special" checked  disabled>专题模块</label>
       <label><input type="checkbox" name="search" value="search" checked  disabled>全文搜索</label>
	 
	   <label><input type="checkbox" name="video" value="video" checked  disabled>视频模块</label>
       
   </fieldset>
    <fieldset><legend>可选模块</legend>

<?php
	$count = count($PHPSIN_MODULES['name']);
	$j = 0;
	foreach($PHPSIN_MODULES['name'] as  $i=>$module)
	{
		if($j%5==0) echo "<tr >";
	?>
	<label><input type="checkbox" name="selectmod[]" value="<?php echo $module?>" checked><?php echo $PHPSIN_MODULES['modulename'][$i]?>模块</label>
	<?php
		if($j%5==4) echo "</tr>";
	$j++;
	}
?>

    
    </fieldset>
    </form>
         </div>
         <div class="clr"></div>
       </div>
       <div style="height:16px; background:url(skin/images/buttom.jpg) no-repeat"></div>
       <div class="btnbox">
           <div class="btn_box"><a href="javascript:history.go(-1);" class="s_btn pre">上一步</a><a href="javascript:void(0);"  onClick="$('#install').submit();return false;" class="x_btn">下一步</a></div>
       </div>
     </div>
  </div>
</body>
</html><script type="text/javascript">
	function set_sin() {
		$("#sin_cfg").show();
	}
	function set_sin_hidden() {
		$("#sin_cfg").hide();
	}	
</script>
