<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<form action="?file=setting&action=save" method="post" name="myform">
<div class="tag_menu" style="width:99%;margin-top:10px;">
<ul>
  <li><a href="#" id='TabTitle0' onclick='ShowTabs(0)' class="selected">������Ϣ</a></li>
  <li><a href="#" id='TabTitle1' onclick='ShowTabs(1)'>��վ����</a></li>
  <li><a href="#" id='TabTitle2' onclick='ShowTabs(2)'>�����Ż�</a></li>
  <li><a href="#" id='TabTitle4' onclick='ShowTabs(4)'>��������</a></li>
<!--  <li><a href="#" id='TabTitle3' onclick='ShowTabs(3)'>��ȫ����</a></li>
  <li><a href="#" id='TabTitle4' onclick='ShowTabs(4)'>��������</a></li>
  <li><a href="#" id='TabTitle5' onclick='ShowTabs(5)'>�ʼ�����</a></li>
  <li><a href="#" id='TabTitle6' onclick='ShowTabs(6)'>FTP����</a></li>
  <li><a href="#" id='TabTitle7' onclick='ShowTabs(7)'>ͨ��֤</a></li> -->
  <li><a href="#" id='TabTitle8' onclick='ShowTabs(8)'>��չ����</a></li>
</ul>
</div>
  <table align="center" cellpadding="0" cellspacing="1" class="table_form">
  <tbody id='Tabs0' style='display:'>
   
    <tr>
      <th width="30%" class="align_r"><strong>��վ���ƣ�</strong></td>
      <td class="align_l"><input name='setting[sitename]' type='text' id='sitename' value='<?=$sitename?>' size='40' maxlength='50'></th>
    </tr>
    <tr>
      <th class="align_r"><strong>��վ��ַ��</strong><br/>����д����URL��ַ���ԡ�/����β</th>
      <td class="align_l">
        <input type="text" name="setting[siteurl]" value="<?=$siteurl?>" size="35"/></td>
    </tr>
    <tr>
      <th class="align_r"><strong>����<?=$fileext?>��</strong></th>
      <td class="align_l"><input type='radio' name='setting[ishtml]' value='1' <?php if($ishtml){ ?>checked <?php } ?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[ishtml]' value='0' <?php if(!$ishtml){ ?>checked <?php } ?>> ��</td>
    </tr>
    <tr>
      <th class="align_r"><strong>�����ļ���չ����</strong></th>
      <td class="align_l"><select name="setting[fileext]">
      <option value="html" <?=$fileext=="html" ? "selected='selected'" : ""?> >html</option>
      <option value="htm" <?=$fileext=="htm" ? "selected='selected'" : ""?>>htm</option>
      <option value="shtml" <?=$fileext=="shtml" ? "selected='selected'" : ""?>>shtml</option>
      <option value="shtm" <?=$fileext=="shtm" ? "selected='selected'" : ""?> >shtm</option>
      <option value="php" <?=$fileext=="php" ? "selected='selected'" : ""?>>php</option>
      </select></td>
    </tr>
    <tr>
      <th class="align_r"><strong>Logo����վ��־��</strong><Br/>����Logo,������վLogo�ߴ��ϴ�</th>
      <td class="align_l"><?=form::upload_image('setting[logo]', 'photo',$logo, 50)?></td>
    </tr>
    <tr>
      <th class="align_r"><strong>Title����վ���⣩</strong><Br/>��������������õ���ҳ����</th>
      <td class="align_l"><input name="setting[meta_title]" type="text" value="<?=$meta_title?>"size="50" /></td>
    </tr>
    <tr>
      <th class="align_r"><strong>Meta Keywords����ҳ�ؼ��ʣ�</strong><br/>��������������õĹؼ���</th>
      <td class="align_l"><textarea name="setting[meta_keywords]" cols="50" rows="3"><?=$meta_keywords?></textarea></td>
    </tr>
    <tr>
      <th class="align_r"><strong>Meta Description����ҳ������</strong><Br/>��������������õ���ҳ����</th>
      <td class="align_l"><textarea name="setting[meta_description]" cols="80" rows="3"><?=$meta_description?></textarea></td>
    </tr>
    <tr>
      <th class="align_r"><strong>��Ȩ��Ϣ</strong><Br/>����ʾ����վ�ײ�  </th>
      <td class="align_l"><textarea name="setting[copyright]" id="introduce"><?=$copyright?></textarea><?=form::editor('introduce', 'basic', '208', '100%')?></td>
    </tr>
    <tr>
      <th class="align_r"><strong>��վICP�������</strong><br/>������Ϣ��ҵ��������վ����<br/>
  <a href="http://www.miibeian.gov.cn" target="_blank">http://www.miibeian.gov.cn</a></th>
      <td class="align_l"><input type="text" name="setting[icpno]" value="<?=$icpno?>" size="30" /></td>
    </tr>
    </tbody>
    
     <tbody id='Tabs1' style='display:none'>
     <tr>
      <th width="25%"><strong>�л���ҳ��ʽ</strong></th>
      <td>
  <label onClick="javascript:$('#pagemode').hide();"><input type='radio' name='setting[pagemode]' value='1'  <?php if($pagemode){ ?>checked <?php } ?>> ��ҳ��ʾ��ʽ</label>&nbsp;&nbsp;&nbsp;&nbsp;
  <label onClick="javascript:$('#pagemode').show();"><input type='radio' name='setting[pagemode]' value='0'  <?php if(!$pagemode){ ?>checked <?php } ?>> ���·�ҳ��ʽ</label>
  </td>
    </tr>
    <tr id="pagemode" style="display:<?php if($pagemode) echo 'none';?>">
      <th width="35%"><strong>��ҳ����</strong><br />���Զ����ҳhtml���룬 {$name} ��ʽ���ַ����Ǳ���</th>
      <td><textarea name='setting[pageshtml]' cols='60' rows='5' id='pageshtml' style="width:100%;height:130px"><?=$pageshtml?></textarea></td>
    </tr>
        <tr>
       <th><strong>Ӣ�ķ�ҳ����</strong><Br/>���Զ����ҳhtml���룬 {$name} ��ʽ���ַ����Ǳ���</th>
       <td><textarea name='setting[pageshtml_en]' cols='60' rows='5' style="width:100%;height:130px"><?=$pageshtml_en?></textarea></td>
    </tr>
	<tr>
      <th><strong>������Ŀͳ��</strong><br />������Ŀͳ�ƣ������Ŀ�ķ���������ͳ��</th>
      <td><input name='setting[category_count]' type='checkbox' id='category_count' value='1' <?php if ($category_count){echo 'checked';}?>></td>
    </tr>
    
     </tbody>
     
     <tbody id='Tabs2' style='display:none'>
     <tr>
      <th width="25%"><strong>�б�ҳ���ҳ��</strong><br></th>
      <td><input name='setting[maxpage]' type='text' id='maxpage' value='<?=$maxpage?>' size='5' maxlength='255'> ҳ</td>
    </tr>
    <tr>
      <th><strong>�б�ҳĬ����Ϣ��(��)</strong><br />����Ϊ1,������ܵ����б�ҳ������</th>
      <td><input name='setting[pagesize]' type='text' id='pagesize' value='<?=$pagesize?>' size='5' maxlength='255' require="true" datatype="compare" compare=">0" msg="����Ϊ���ұ������0"> </td>
    </tr>
     </tbody>
     
     
       <tbody id='Tabs8' style='display:none'>
    <tr>
      <td colspan="3" class="tablerowhighlight" align="center">��ʱͨѶ���</td>
    </tr>
    <tr>
      <th width="25%"><strong>����</strong></th>
      <td><input type="radio" name="setting[enabletm]" value="1" <?php if($enabletm){?>checked<?php }?>>��&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="setting[enabletm]" value="0" <?php if(!$enabletm){?>checked<?php }?>>��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">ע�⣺����ʺ�֮�����ö��š�,���ָ�</font></td>
    </tr>
	<tr>
      <th><strong>QQ</strong></th>
      <td><input name="setting[qq]" type="text" size="75" value="<?=$qq?>">&nbsp;&nbsp;<a href="http://im.qq.com/" target="_blank">�������</a></td>
    </tr>
	<tr>
      <th><strong>MSN</strong></th>
      <td><input name="setting[msn]" type="text" size="75" value="<?=$msn?>">&nbsp;&nbsp;<a href="http://messenger.live.cn/" target="_blank">�������</a></td>
    </tr>
	<tr>
      <th><strong>SKYPE</strong></th>
      <td><input name="setting[skype]" type="text" size="75" value="<?=$skype?>">&nbsp;&nbsp;<a href="http://www.skype.com/" target="_blank">�������</a></td>
    </tr>
	<tr>
      <th><strong>�����������Ա��棩</strong></th>
      <td><input name="setting[taobao]" type="text" size="75" value="<?=$taobao?>">&nbsp;&nbsp;<a href="http://www.taobao.com/wangwang/" target="_blank">�������</a></td>
    </tr>
	<tr>
      <th><strong>����������ó��ͨ�棩</strong></th>
      <td><input name="setting[alibaba]" type="text" size="75" value="<?=$alibaba?>">&nbsp;&nbsp;<a href="http://alitalk.alibaba.com.cn/" target="_blank">�������</a></td>
    </tr>
  </tbody>
  
  
  
  <tbody id='Tabs4' style='display:none'>
     <tr>
      <th width="35%"><strong>����ǰ̨�ϴ�����</strong></th>
      <td>
	  <input type='radio' name='setconfig[UPLOAD_FRONT]' value='1'  <?php if(UPLOAD_FRONT){ ?>checked <?php } ?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setconfig[UPLOAD_FRONT]' value='0'  <?php if(!UPLOAD_FRONT){ ?>checked <?php } ?>> ��
     </td>
    </tr>
	<tr>
      <th><strong>����URL����·��</strong></th>
      <td><input name='setconfig[UPLOAD_URL]' type='text' id='UPLOAD_URL' value='<?=UPLOAD_URL?>' size='40' maxlength='50'> �磺uploadfile/</td>
    </tr>
	<tr>
      <th><strong>�����ϴ��ĸ�������</strong></th>
      <td><input name='setconfig[UPLOAD_ALLOWEXT]' type='text' id='UPLOAD_ALLOWEXT' value='<?=UPLOAD_ALLOWEXT?>' size='40'></td>
    </tr>
	<tr>
      <th><strong>�����ϴ��ĸ�����С</strong></th>
      <td><input name='setconfig[UPLOAD_MAXSIZE]' type='text' id='UPLOAD_MAXSIZE' value='<?=UPLOAD_MAXSIZE?>' size='15' maxlength='10'> Bytes</td>
    </tr>
	<tr>
      <th><strong>ǰ̨ͬһIP 24Сʱ�������ϴ�������������</strong></th>
      <td><input name='setconfig[UPLOAD_MAXUPLOADS]' type='text' id='UPLOAD_MAXUPLOADS' value='<?=UPLOAD_MAXUPLOADS?>' size='5' maxlength='5'></td>
    </tr>
	<tr>
      <th><strong>ǰ̨�Ƿ������ο��ϴ�����</strong></th>
      <td><input name='setting[allowtourist]' type='radio' value='1' <?php if($allowtourist){ ?>checked <?php } ?>>  ��
	  &nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[allowtourist]' value='0'  <?php if($allowtourist == 0){ ?>checked <?php } ?>> ��</td>
    </tr>
    <tr>
      <td colspan="3" class="tablerowhighlight" align="center">ͼƬ��������</td>
    </tr>
	 <tr>
      <th><strong>PHPͼ�δ���GD�⣩���ܼ��</strong></th>
      <td>
	  <font color="red"><?=$gd?></font>
     </td>
    </tr>
	 <tr>
      <th><strong>��������ͼ����</strong></th>
      <td>
	  <input type='radio' name='setting[thumb_enable]' value='1'  <?php if($enablegd && $thumb_enable){ ?>checked <?php } ?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[thumb_enable]' value='0'  <?php if(!$enablegd || !$thumb_enable){ ?>checked <?php } ?>> ��
     </td>
    </tr>
    <tr>
      <th><strong>����ͼ��С</strong><br />
	  ��������ͼ�Ĵ�С��С�ڴ˳ߴ��ͼƬ����������������ͼ</th>
      <td><input name='setting[thumb_width]' type='text' id='thumb_width' value='<?=$thumb_width?>' size='5' maxlength='5'> X <input name='setting[thumb_height]' type='text' id='thumb_height' value='<?=$thumb_height?>' size='5' maxlength='5'> px</td>
    </tr>
    <tr>
      <th><strong>����ͼ�㷨</strong></th>
      <td>
       ��͸߶�����0ʱ����С��ָ����С������һ��Ϊ0ʱ����������С<br>
      </td>
    </tr>
    <tr>
      <th><strong>����ͼƬˮӡ����</strong></th>
      <td>
	  <input type='radio' name='setting[watermark_enable]' value='1'  <?php if($enablegd && $watermark_enable==1){ ?>checked <?php } ?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[watermark_enable]' value='0'  <?php if($enablegd && $watermark_enable==0){ ?>checked <?php } ?>> ��
     </td>
    </tr>
	<tr>
      <th><strong>ˮӡ�������</strong></th>
      <td><input name='setting[watermark_minwidth]' type='text' id='watermark_minwidth' value='<?=$watermark_minwidth?>' size='5' maxlength='5'> X <input name='setting[watermark_minheight]' type='text' id='watermark_minheight' value='<?=$watermark_minheight?>' size='5' maxlength='5'> px</td>
    </tr>
	<tr>
      <th><strong>ˮӡͼƬ·��</strong><br />
	  �����滻ˮӡ�ļ���ʵ�ֲ�ͬ��ˮӡЧ����
	  </th>
      <td>
	  <input name='setting[watermark_img]' type='text' id='watermark_img' value='<?=$watermark_img?>' size='30' maxlength='255'> <a href="###" onClick="javascript:$('#watermark_img').val('images/watermark.gif');">Gif</a> / <a href="###" onClick="javascript:$('#watermark_img').val('images/watermark.png');">Png</a>
	  </td>
    </tr>
	<tr>
      <th><strong>ˮӡ͸����</strong><br/>��ΧΪ 1~100 ����������ֵԽСˮӡͼƬԽ͸��</th>
      <td><input name='setting[watermark_pct]' type='text' id='watermark_pct' value='<?=$watermark_pct?>' size='10' maxlength='10'>
	  </td>
    </tr>
	<tr>
      <th><strong>JPEG ˮӡ����</strong><br/>��ΧΪ 0~100 ����������ֵԽ����ͼƬЧ��Խ�ã����ߴ�ҲԽ��</th>
      <td><input name='setting[watermark_quality]' type='text' id='watermark_quality' value='<?=$watermark_quality?>' size='10' maxlength='10'>
	  </td>
    </tr>
	    <tr>
      <th><strong>ˮӡ���λ��</strong><br>
	  �����������Զ�Ϊ�û��ϴ��� JPG/PNG/GIF ͼƬ�������ˮӡ�����ڴ�ѡ��ˮӡ��ӵ�λ��(3x3 �� 9 ��λ�ÿ�ѡ)����������Ҫ GD ��֧�ֲ���ʹ�ã��ݲ�֧�ֶ��� GIF ��ʽ�����ӵ�ˮӡͼƬλ�� ./images/watermark.gif�������滻���ļ���ʵ�ֲ�ͬ��ˮӡЧ��
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
      <th width="35%"><strong>���ø���FTP�ϴ�����</strong><br>��������FTP���ܺ�phpcms������ftp��ʽ�ϴ�����<br/>
     <?php if(!function_exists('ftp_connect')){ ?><font color="red">��ǰPHP������֧��FTP���ܣ�</font><?php }?>
	  </th>
      <td>
	  <input type='radio' name='setconfig[UPLOAD_FTP_ENABLE]' value='1'  <?php if(UPLOAD_FTP_ENABLE){ ?>checked <?php } ?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setconfig[UPLOAD_FTP_ENABLE]' value='0'  <?php if(!UPLOAD_FTP_ENABLE){ ?>checked <?php } ?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
     </td>
    </tr>
    <tr>
      <th><strong>FTP����</strong></th>
      <td><input name="setconfig[UPLOAD_FTP_HOST]" id="upload_ftp_host" type="text" size="40" value="<?=UPLOAD_FTP_HOST?>"></td>
    </tr>
    <tr>
      <th><strong>FTP�˿�</strong></th>
      <td><input name="setconfig[UPLOAD_FTP_PORT]" id="upload_ftp_port" type="text" size="40" value="<?=UPLOAD_FTP_PORT?>"></td>
    </tr>
    <tr>
      <th><strong>FTP�ʺ�</strong></th>
      <td><input name="setconfig[UPLOAD_FTP_USER]" id="upload_ftp_user" type="text" size="40" value="<?=UPLOAD_FTP_USER?>"></td>
    </tr>
    <tr>
      <th><strong>FTP����</strong><br></th>
      <td><input name="setconfig[UPLOAD_FTP_PW]" id="upload_ftp_pw" type="password" size="40" value="<?=UPLOAD_FTP_PW?>" onBlur="upload_ftpdir_list('/')"></td>
    </tr>
    <tr>
      <th><strong>FTP����</strong><br>�ϴ�����ͨ������������</th>
      <td><input name="setconfig[UPLOAD_FTP_DOMAIN]" type="text" size="40" value="<?=UPLOAD_FTP_DOMAIN?>">	ע���ԡ�/����β</td>
    </tr>
    <tr>
      <th><strong>PhpsinĿ¼</strong><br>�кܶ�����������FTP��Ŀ¼��Web��Ŀ¼��һ��<br/>����Ҫ��ȷ���ò���ʹ��FTP����</th>
      <td><input name="setconfig[UPLOAD_FTP_PATH]" id="upload_ftp_path" type="text" size="20" value="<?=UPLOAD_FTP_PATH?>"> <span id="upload_ftpdir_list"></span>
	  <br/>ע���ԡ�/����β�������е��� /wwwroot/ ���� /www/<br/>�������ʾftp��Ŀ¼��phpcms��Ŀ¼·����ͬ</td>
    </tr>
    <tr>
      <th><strong>FTP���Ӳ���</strong><br></th>
      <td><input name="upload_ftp_test" type="button" size="40" value="������� FTP ����" onClick="javascript:upload_test_ftp();"></td>
    </tr>
  </tbody>
  
  -->
  </table>
  
  
<div style="padding-top:10px; text-align:center">
<label>
        <input type="submit" name="button" id="button" value="�ύ" />
        <input type="reset" name="button2" id="button2" value="����" />
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
