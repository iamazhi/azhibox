<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body <?php if($type<2){ ?>onLoad="is_ie();$('#div_category_urlruleid').load('?file=<?=$file?>&action=urlrule&ishtml=<?=$ishtml?>&type=category&category_urlruleid=<?=$category_urlruleid?>');$('#div_show_urlruleid').load('?file=<?=$file?>&action=show_urlrule&ishtml=<?=$ishtml?>&type=show&show_urlruleid=<?=$show_urlruleid?>');"<?php } ?>>
<form name="myform" method="post" action="?file=category&action=add&gory=add">
<div class="tag_menu" style="width:99%;margin-top:10px;">
<ul>
  <li><a href="###" id='TabTitle0' onclick='ShowTabs(0)' class="selected">��������</a></li>
  <li><a href="###" id='TabTitle1' onclick='ShowTabs(1)'>SEO����</a></li>
</ul>
</div>
<div id='Tabs0' style='display:'>
  <table align="center" cellpadding="0" cellspacing="1" class="table_form">
    <tr>
      <td class="align_r" width="25%"><font color="red">*</font> <strong>�ϼ����</strong>��</td>
      <td width="558" class="align_l"><?=$catename?>
      <input type="hidden" name="catid" value="<?=$catid?>"></td>
    </tr>
    <tr>
      <td class="align_r"><font color="red">*</font> <strong>����ҳ����</strong>��</td>
      <td class="align_l"><label>
        <input name="info[name]" type="text" require="true" datatype="limit" min="1" max="50" size="50" msg="��������1���ַ�����50���ַ�"/>
      </label><input type="hidden" name="info[modelid]" value="9"/>
        <input type="hidden" name="info[modelname]" value="����ҳ"/>
        <input type="hidden" name="info[type]" value="<?=$type?>"/></td>
    </tr>
    <tr>
      <td class="align_r"><STRONG>��ĿͼƬ</STRONG>��<BR>
      </td>
      <td class="align_l"><label>
        <?=form::upload_image('info[img]', 'photo',$info["img"], 40)?>
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><font color="red">*</font> <strong>����ģ��</strong>��</td>
      <td>
      <?=form::select_template('phpsin', 'setting[template]', 'template', 'single', '','single')?>
      </td>
    </tr>
    <tr>
      <td class="align_r"><strong>�ڵ�������ʾ</strong></td>
      <td>
          <input type="radio" name="info[ismenu]" value="1" id="RadioGroup1_0" checked>
          ��
          <input type="radio" name="info[ismenu]" value="0" id="RadioGroup1_1">
          ��</td>
    </tr>
    <tr>
      <th class="align_r"><strong>��Ŀ����Html</strong></th>
      <td class="align_l">
      <input type='radio' name='setting[ishtml]' value='1' <?php if($ishtml){ ?>checked <?php } ?> onClick="$('#div_category_urlruleid').load('?file=<?=$file?>&action=urlrule&ishtml=1&type=category&category_urlruleid=<?=$category_urlruleid?>');"> ��
	  <input type='radio' name='setting[ishtml]' value='0' <?php if(!$ishtml){ ?>checked <?php } ?> onClick="$('#div_category_urlruleid').load('?file=<?=$file?>&action=urlrule&ishtml=0&type=category&category_urlruleid=<?=$category_urlruleid?>');"> ��</td>
    </tr><tr>
      <th><strong>��ĿҳURL����</strong><br />
	  <a href="?file=urlrule&action=add&module=phpsin&filename=category&forward=<?=urlencode(URL)?>" style="color:red">����½�URL����</a></th>
      <td><div id="div_category_urlruleid"></div></td>
    </tr>
    <tr>
      <td class="align_r"><strong>��ĿĿ¼</strong><Br/><font color="red">����Ŀ¼����/Ŀ¼����</font></td>
      <td class="align_l"><input type="text" name="dir" size='32' id="dir" maxlength='50' require="true" datatype="limit|ajax" min="1" max="50" url="?file=category&action=checkdir&parentid=<?=$catid?>" msg="�ַ����ȷ�Χ����Ϊ1��50λ|" value="<?=$dir?>"></td>
    </tr>
  </table>
  </div>
  <div id='Tabs1' style='display:none'>
     <table align="center" cellpadding="0" cellspacing="1" class="table_list">
      <tr>
      <td class="align_r" width="25%"><strong>META Title������ҳ���⣩</strong><br />
        ��������������õı���</td>
      <td class="align_l"><label>
        <textarea name="info[title]" style="width:90%;height:50px"></textarea>
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><strong>META Keywords������ҳ�ؼ��ʣ�</strong><br />
        ��������������õĹؼ���</td>
      <td class="align_l"><label>
        <textarea name="info[keywords]" style="width:90%;height:80px"></textarea>
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><strong>META Description������ҳ������</strong><br />
        ��������������õ���ҳ����</td>
      <td class="align_l"><label>
        <textarea name="info[description]" style="width:90%;height:80px"></textarea>
      </label></td>
    </tr>
    </table>
  </div>

    <div style="padding-top:10px;padding-bottom:10px; text-align:center">
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
