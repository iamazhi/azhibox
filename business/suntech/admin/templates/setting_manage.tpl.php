<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<form action="?file=setting&action=save" method="post" name="myform">
<div class="tag_menu" style="width:99%;margin-top:10px;">
<ul>
  <li><a href="#" id='TabTitle0' onclick='ShowTabs(0)' class="selected">基本信息</a></li>
  <li><a href="#" id='TabTitle1' onclick='ShowTabs(1)'>网站设置</a></li>
  <li><a href="#" id='TabTitle2' onclick='ShowTabs(2)'>性能优化</a></li>
  <li><a href="#" id='TabTitle4' onclick='ShowTabs(4)'>附件设置</a></li>
<!--  <li><a href="#" id='TabTitle3' onclick='ShowTabs(3)'>安全设置</a></li>
  <li><a href="#" id='TabTitle4' onclick='ShowTabs(4)'>附件设置</a></li>
  <li><a href="#" id='TabTitle5' onclick='ShowTabs(5)'>邮件设置</a></li>
  <li><a href="#" id='TabTitle6' onclick='ShowTabs(6)'>FTP设置</a></li>
  <li><a href="#" id='TabTitle7' onclick='ShowTabs(7)'>通行证</a></li> -->
  <li><a href="#" id='TabTitle8' onclick='ShowTabs(8)'>扩展设置</a></li>
</ul>
</div>
  <table align="center" cellpadding="0" cellspacing="1" class="table_form">
  <tbody id='Tabs0' style='display:'>
   
    <tr>
      <th width="30%" class="align_r"><strong>网站名称：</strong></td>
      <td class="align_l"><input name='setting[sitename]' type='text' id='sitename' value='<?=$sitename?>' size='40' maxlength='50'></th>
    </tr>
    <tr>
      <th class="align_r"><strong>网站地址：</strong><br/>请填写完整URL地址，以“/”结尾</th>
      <td class="align_l">
        <input type="text" name="setting[siteurl]" value="<?=$siteurl?>" size="35"/></td>
    </tr>
    <tr>
      <th class="align_r"><strong>生成<?=$fileext?>：</strong></th>
      <td class="align_l"><input type='radio' name='setting[ishtml]' value='1' <?php if($ishtml){ ?>checked <?php } ?>> 是&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[ishtml]' value='0' <?php if(!$ishtml){ ?>checked <?php } ?>> 否</td>
    </tr>
    <tr>
      <th class="align_r"><strong>生成文件扩展名：</strong></th>
      <td class="align_l"><select name="setting[fileext]">
      <option value="html" <?=$fileext=="html" ? "selected='selected'" : ""?> >html</option>
      <option value="htm" <?=$fileext=="htm" ? "selected='selected'" : ""?>>htm</option>
      <option value="shtml" <?=$fileext=="shtml" ? "selected='selected'" : ""?>>shtml</option>
      <option value="shtm" <?=$fileext=="shtm" ? "selected='selected'" : ""?> >shtm</option>
      <option value="php" <?=$fileext=="php" ? "selected='selected'" : ""?>>php</option>
      </select></td>
    </tr>
    <tr>
      <th class="align_r"><strong>Logo（网站标志）</strong><Br/>更换Logo,根据网站Logo尺寸上传</th>
      <td class="align_l"><?=form::upload_image('setting[logo]', 'photo',$logo, 50)?></td>
    </tr>
    <tr>
      <th class="align_r"><strong>Title（网站标题）</strong><Br/>针对搜索引擎设置的网页标题</th>
      <td class="align_l"><input name="setting[meta_title]" type="text" value="<?=$meta_title?>"size="50" /></td>
    </tr>
    <tr>
      <th class="align_r"><strong>Meta Keywords（网页关键词）</strong><br/>针对搜索引擎设置的关键词</th>
      <td class="align_l"><textarea name="setting[meta_keywords]" cols="50" rows="3"><?=$meta_keywords?></textarea></td>
    </tr>
    <tr>
      <th class="align_r"><strong>Meta Description（网页描述）</strong><Br/>针对搜索引擎设置的网页描述</th>
      <td class="align_l"><textarea name="setting[meta_description]" cols="80" rows="3"><?=$meta_description?></textarea></td>
    </tr>
    <tr>
      <th class="align_r"><strong>版权信息</strong><Br/>将显示在网站底部  </th>
      <td class="align_l"><textarea name="setting[copyright]" id="introduce"><?=$copyright?></textarea><?=form::editor('introduce', 'basic', '208', '100%')?></td>
    </tr>
    <tr>
      <th class="align_r"><strong>网站ICP备案序号</strong><br/>请在信息产业部管理网站申请<br/>
  <a href="http://www.miibeian.gov.cn" target="_blank">http://www.miibeian.gov.cn</a></th>
      <td class="align_l"><input type="text" name="setting[icpno]" value="<?=$icpno?>" size="30" /></td>
    </tr>
    </tbody>
    
     <tbody id='Tabs1' style='display:none'>
     <tr>
      <th width="25%"><strong>切换分页方式</strong></th>
      <td>
  <label onClick="javascript:$('#pagemode').hide();"><input type='radio' name='setting[pagemode]' value='1'  <?php if($pagemode){ ?>checked <?php } ?>> 多页显示方式</label>&nbsp;&nbsp;&nbsp;&nbsp;
  <label onClick="javascript:$('#pagemode').show();"><input type='radio' name='setting[pagemode]' value='0'  <?php if(!$pagemode){ ?>checked <?php } ?>> 上下分页方式</label>
  </td>
    </tr>
    <tr id="pagemode" style="display:<?php if($pagemode) echo 'none';?>">
      <th width="35%"><strong>分页代码</strong><br />可自定义分页html代码， {$name} 格式的字符串是变量</th>
      <td><textarea name='setting[pageshtml]' cols='60' rows='5' id='pageshtml' style="width:100%;height:130px"><?=$pageshtml?></textarea></td>
    </tr>
        <tr>
       <th><strong>英文分页代码</strong><Br/>可自定义分页html代码， {$name} 格式的字符串是变量</th>
       <td><textarea name='setting[pageshtml_en]' cols='60' rows='5' style="width:100%;height:130px"><?=$pageshtml_en?></textarea></td>
    </tr>
	<tr>
      <th><strong>开启栏目统计</strong><br />开启栏目统计，会对栏目的访问量进行统计</th>
      <td><input name='setting[category_count]' type='checkbox' id='category_count' value='1' <?php if ($category_count){echo 'checked';}?>></td>
    </tr>
    
     </tbody>
     
     <tbody id='Tabs2' style='display:none'>
     <tr>
      <th width="25%"><strong>列表页最大页数</strong><br></th>
      <td><input name='setting[maxpage]' type='text' id='maxpage' value='<?=$maxpage?>' size='5' maxlength='255'> 页</td>
    </tr>
    <tr>
      <th><strong>列表页默认信息数(条)</strong><br />至少为1,否则可能导致列表页错误发生</th>
      <td><input name='setting[pagesize]' type='text' id='pagesize' value='<?=$pagesize?>' size='5' maxlength='255' require="true" datatype="compare" compare=">0" msg="不能为空且必须大于0"> </td>
    </tr>
     </tbody>
     
     
       <tbody id='Tabs8' style='display:none'>
    <tr>
      <td colspan="3" class="tablerowhighlight" align="center">即时通讯软件</td>
    </tr>
    <tr>
      <th width="25%"><strong>启用</strong></th>
      <td><input type="radio" name="setting[enabletm]" value="1" <?php if($enabletm){?>checked<?php }?>>是&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="setting[enabletm]" value="0" <?php if(!$enabletm){?>checked<?php }?>>否&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">注意：多个帐号之间请用逗号“,”分隔</font></td>
    </tr>
	<tr>
      <th><strong>QQ</strong></th>
      <td><input name="setting[qq]" type="text" size="75" value="<?=$qq?>">&nbsp;&nbsp;<a href="http://im.qq.com/" target="_blank">免费申请</a></td>
    </tr>
	<tr>
      <th><strong>MSN</strong></th>
      <td><input name="setting[msn]" type="text" size="75" value="<?=$msn?>">&nbsp;&nbsp;<a href="http://messenger.live.cn/" target="_blank">免费申请</a></td>
    </tr>
	<tr>
      <th><strong>SKYPE</strong></th>
      <td><input name="setting[skype]" type="text" size="75" value="<?=$skype?>">&nbsp;&nbsp;<a href="http://www.skype.com/" target="_blank">免费申请</a></td>
    </tr>
	<tr>
      <th><strong>阿里旺旺（淘宝版）</strong></th>
      <td><input name="setting[taobao]" type="text" size="75" value="<?=$taobao?>">&nbsp;&nbsp;<a href="http://www.taobao.com/wangwang/" target="_blank">免费申请</a></td>
    </tr>
	<tr>
      <th><strong>阿里旺旺（贸易通版）</strong></th>
      <td><input name="setting[alibaba]" type="text" size="75" value="<?=$alibaba?>">&nbsp;&nbsp;<a href="http://alitalk.alibaba.com.cn/" target="_blank">免费申请</a></td>
    </tr>
  </tbody>
  
  
  
  <tbody id='Tabs4' style='display:none'>
     <tr>
      <th width="35%"><strong>允许前台上传附件</strong></th>
      <td>
	  <input type='radio' name='setconfig[UPLOAD_FRONT]' value='1'  <?php if(UPLOAD_FRONT){ ?>checked <?php } ?>> 是&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setconfig[UPLOAD_FRONT]' value='0'  <?php if(!UPLOAD_FRONT){ ?>checked <?php } ?>> 否
     </td>
    </tr>
	<tr>
      <th><strong>附件URL访问路径</strong></th>
      <td><input name='setconfig[UPLOAD_URL]' type='text' id='UPLOAD_URL' value='<?=UPLOAD_URL?>' size='40' maxlength='50'> 如：uploadfile/</td>
    </tr>
	<tr>
      <th><strong>允许上传的附件类型</strong></th>
      <td><input name='setconfig[UPLOAD_ALLOWEXT]' type='text' id='UPLOAD_ALLOWEXT' value='<?=UPLOAD_ALLOWEXT?>' size='40'></td>
    </tr>
	<tr>
      <th><strong>允许上传的附件大小</strong></th>
      <td><input name='setconfig[UPLOAD_MAXSIZE]' type='text' id='UPLOAD_MAXSIZE' value='<?=UPLOAD_MAXSIZE?>' size='15' maxlength='10'> Bytes</td>
    </tr>
	<tr>
      <th><strong>前台同一IP 24小时内允许上传附件的最大个数</strong></th>
      <td><input name='setconfig[UPLOAD_MAXUPLOADS]' type='text' id='UPLOAD_MAXUPLOADS' value='<?=UPLOAD_MAXUPLOADS?>' size='5' maxlength='5'></td>
    </tr>
	<tr>
      <th><strong>前台是否允许游客上传附件</strong></th>
      <td><input name='setting[allowtourist]' type='radio' value='1' <?php if($allowtourist){ ?>checked <?php } ?>>  是
	  &nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[allowtourist]' value='0'  <?php if($allowtourist == 0){ ?>checked <?php } ?>> 否</td>
    </tr>
    <tr>
      <td colspan="3" class="tablerowhighlight" align="center">图片附件处理</td>
    </tr>
	 <tr>
      <th><strong>PHP图形处理（GD库）功能检测</strong></th>
      <td>
	  <font color="red"><?=$gd?></font>
     </td>
    </tr>
	 <tr>
      <th><strong>启用缩略图功能</strong></th>
      <td>
	  <input type='radio' name='setting[thumb_enable]' value='1'  <?php if($enablegd && $thumb_enable){ ?>checked <?php } ?>> 是&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[thumb_enable]' value='0'  <?php if(!$enablegd || !$thumb_enable){ ?>checked <?php } ?>> 否
     </td>
    </tr>
    <tr>
      <th><strong>缩略图大小</strong><br />
	  设置缩略图的大小，小于此尺寸的图片附件将不生成缩略图</th>
      <td><input name='setting[thumb_width]' type='text' id='thumb_width' value='<?=$thumb_width?>' size='5' maxlength='5'> X <input name='setting[thumb_height]' type='text' id='thumb_height' value='<?=$thumb_height?>' size='5' maxlength='5'> px</td>
    </tr>
    <tr>
      <th><strong>缩略图算法</strong></th>
      <td>
       宽和高都大于0时，缩小成指定大小，其中一个为0时，按比例缩小<br>
      </td>
    </tr>
    <tr>
      <th><strong>启用图片水印功能</strong></th>
      <td>
	  <input type='radio' name='setting[watermark_enable]' value='1'  <?php if($enablegd && $watermark_enable==1){ ?>checked <?php } ?>> 是&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[watermark_enable]' value='0'  <?php if($enablegd && $watermark_enable==0){ ?>checked <?php } ?>> 否
     </td>
    </tr>
	<tr>
      <th><strong>水印添加条件</strong></th>
      <td><input name='setting[watermark_minwidth]' type='text' id='watermark_minwidth' value='<?=$watermark_minwidth?>' size='5' maxlength='5'> X <input name='setting[watermark_minheight]' type='text' id='watermark_minheight' value='<?=$watermark_minheight?>' size='5' maxlength='5'> px</td>
    </tr>
	<tr>
      <th><strong>水印图片路径</strong><br />
	  您可替换水印文件以实现不同的水印效果。
	  </th>
      <td>
	  <input name='setting[watermark_img]' type='text' id='watermark_img' value='<?=$watermark_img?>' size='30' maxlength='255'> <a href="###" onClick="javascript:$('#watermark_img').val('images/watermark.gif');">Gif</a> / <a href="###" onClick="javascript:$('#watermark_img').val('images/watermark.png');">Png</a>
	  </td>
    </tr>
	<tr>
      <th><strong>水印透明度</strong><br/>范围为 1~100 的整数，数值越小水印图片越透明</th>
      <td><input name='setting[watermark_pct]' type='text' id='watermark_pct' value='<?=$watermark_pct?>' size='10' maxlength='10'>
	  </td>
    </tr>
	<tr>
      <th><strong>JPEG 水印质量</strong><br/>范围为 0~100 的整数，数值越大结果图片效果越好，但尺寸也越大</th>
      <td><input name='setting[watermark_quality]' type='text' id='watermark_quality' value='<?=$watermark_quality?>' size='10' maxlength='10'>
	  </td>
    </tr>
	    <tr>
      <th><strong>水印添加位置</strong><br>
	  您可以设置自动为用户上传的 JPG/PNG/GIF 图片附件添加水印，请在此选择水印添加的位置(3x3 共 9 个位置可选)。本功能需要 GD 库支持才能使用，暂不支持动画 GIF 格式。附加的水印图片位于 ./images/watermark.gif，您可替换此文件以实现不同的水印效果
	  </th>
      <td>

	  <table cellspacing="1" cellpadding="4" width="160" bgcolor="#dddddd">
	  <tr align="center"  bgcolor="#ffffff"><td><input type="radio" name="setting[watermark_pos]" value="1" <?php if($watermark_pos==1){ ?>checked <?php } ?>> #1</td><td><input type="radio" name="setting[watermark_pos]" value="2" <?php if($watermark_pos==2){ ?>checked <?php } ?>> #2</td><td><input type="radio" name="setting[watermark_pos]" value="3" <?php if($watermark_pos==3){ ?>checked <?php } ?>> #3</td></tr>
	  <tr align="center"  bgcolor="#ffffff"><td><input type="radio" name="setting[watermark_pos]" value="4" <?php if($watermark_pos==4){ ?>checked <?php } ?>> #4</td><td><input type="radio" name="setting[watermark_pos]" value="5" <?php if($watermark_pos==5){ ?>checked <?php } ?>> #5</td><td><input type="radio" name="setting[watermark_pos]" value="6" <?php if($watermark_pos==6){ ?>checked <?php } ?>> #6</td></tr>
	  <tr align="center" bgcolor="#ffffff"><td><input type="radio" name="setting[watermark_pos]" value="7" <?php if($watermark_pos==7){ ?>checked <?php } ?>> #7</td><td><input type="radio" name="setting[watermark_pos]" value="8" <?php if($watermark_pos==8){ ?>checked <?php } ?>> #8</td><td><input type="radio" name="setting[watermark_pos]" value="9" <?php if($watermark_pos==9){ ?>checked <?php } ?>> #9</td></tr>
	  </table>
    </tr>
<!--
<tr>
      <th width="35%"><strong>启用附件FTP上传功能</strong><br>开启附件FTP功能后，phpcms将采用ftp方式上传附件<br/>
     <?php if(!function_exists('ftp_connect')){ ?><font color="red">当前PHP环境不支持FTP功能！</font><?php }?>
	  </th>
      <td>
	  <input type='radio' name='setconfig[UPLOAD_FTP_ENABLE]' value='1'  <?php if(UPLOAD_FTP_ENABLE){ ?>checked <?php } ?>> 是&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setconfig[UPLOAD_FTP_ENABLE]' value='0'  <?php if(!UPLOAD_FTP_ENABLE){ ?>checked <?php } ?>> 否&nbsp;&nbsp;&nbsp;&nbsp;
     </td>
    </tr>
    <tr>
      <th><strong>FTP主机</strong></th>
      <td><input name="setconfig[UPLOAD_FTP_HOST]" id="upload_ftp_host" type="text" size="40" value="<?=UPLOAD_FTP_HOST?>"></td>
    </tr>
    <tr>
      <th><strong>FTP端口</strong></th>
      <td><input name="setconfig[UPLOAD_FTP_PORT]" id="upload_ftp_port" type="text" size="40" value="<?=UPLOAD_FTP_PORT?>"></td>
    </tr>
    <tr>
      <th><strong>FTP帐号</strong></th>
      <td><input name="setconfig[UPLOAD_FTP_USER]" id="upload_ftp_user" type="text" size="40" value="<?=UPLOAD_FTP_USER?>"></td>
    </tr>
    <tr>
      <th><strong>FTP密码</strong><br></th>
      <td><input name="setconfig[UPLOAD_FTP_PW]" id="upload_ftp_pw" type="password" size="40" value="<?=UPLOAD_FTP_PW?>" onBlur="upload_ftpdir_list('/')"></td>
    </tr>
    <tr>
      <th><strong>FTP域名</strong><br>上传附件通过此域名访问</th>
      <td><input name="setconfig[UPLOAD_FTP_DOMAIN]" type="text" size="40" value="<?=UPLOAD_FTP_DOMAIN?>">	注意以“/”结尾</td>
    </tr>
    <tr>
      <th><strong>Phpsin目录</strong><br>有很多虚拟主机的FTP根目录与Web根目录不一样<br/>您需要正确设置才能使用FTP功能</th>
      <td><input name="setconfig[UPLOAD_FTP_PATH]" id="upload_ftp_path" type="text" size="20" value="<?=UPLOAD_FTP_PATH?>"> <span id="upload_ftpdir_list"></span>
	  <br/>注意以“/”结尾，例如有的是 /wwwroot/ 或者 /www/<br/>留空则表示ftp根目录与phpcms根目录路径相同</td>
    </tr>
    <tr>
      <th><strong>FTP连接测试</strong><br></th>
      <td><input name="upload_ftp_test" type="button" size="40" value="点击测试 FTP 连接" onClick="javascript:upload_test_ftp();"></td>
    </tr>
  </tbody>
  
  -->
  </table>
  
  
<div style="padding-top:10px; text-align:center">
<label>
        <input type="submit" name="button" id="button" value="提交" />
        <input type="reset" name="button2" id="button2" value="重置" />
      </label>
      </div>

  </form>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});

</script>
</body>
</html>

<script type="text/javascript">

</script>
