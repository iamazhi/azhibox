<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body <?php if($type<2){ ?>onLoad="is_ie();$('#div_category_urlruleid').load('?file=<?=$file?>&action=urlrule&ishtml=<?=$ishtml?>&type=category&category_urlruleid=<?=$category_urlruleid?>');$('#div_show_urlruleid').load('?file=<?=$file?>&action=show_urlrule&ishtml=<?=$ishtml?>&type=show&show_urlruleid=<?=$show_urlruleid?>');"<?php } ?>>
<?php if($type==0){?>
<form action="?file=category&action=edit&category=edit&catid=<?=$catid?>&menuid=<?=$rs["menuid"]?>" method="post" name="myform" >
<div class="tag_menu" style="width:99%;margin-top:10px;">
<ul>
  <li><a href="###" id='TabTitle0' onclick='ShowTabs(0)' class="selected">��������</a></li>
  <li><a href="###" id='TabTitle1' onclick='ShowTabs(1)'>SEO����</a></li>
</ul>
</div>

<div id='Tabs0' style='display:'>
  <table align="center" cellpadding="0" cellspacing="1" class="table_form">
    <tr>
      <td width="25%" class="align_r"><font color="red">*</font> <strong>�ϼ���Ŀ</strong>��</td>
      <td  class="align_l"><label>
        <select name="info[parentid]">
          <option value="0">��(��Ϊһ�����)</option>
          <?=$data?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><font color="red">*</font> <strong>�����</strong>��</td>
      <td class="align_l">
	  <?php if($numtable > 1){?>
<select name="info[modelid]">
<?php foreach($model as $val)
       {
	    if($rs["modelname"]==$val["name"])
		{
		echo "<option value='".$val["modelid"]."' selected='selected'>".$val["name"]."</option>";
			}
			 else
				{
			    echo "<option value='".$val["modelid"]."'>".$val["name"]."</option>"; 
				   }
		       }?>
        </select>
        <?php } else {?>
        <?php echo "<strong>".$rs["modelname"]."</strong> (���ɱ�����������ݣ�)";?>
        <input name="info[modelid]" type="hidden" value="<?=$rs["modelid"]?>">
        <?php } ?></td>
    </tr>
    <tr>
      <td class="align_r"><font color="red">*</font> <strong>��Ŀ����</strong>��</td>
      <td class="align_l"><label>
        <input name="info[name]" type="text" value="<?=$rs["name"]?>" require="true" datatype="limit" min="1" max="50" msg="��������1���ַ�����50���ַ�"/>
        <input type="hidden" name="catid" value="<?=$catid?>"/>
      </label></td>
    </tr>
        <tr>
      <td class="align_r"><STRONG>��ĿͼƬ</STRONG>��<BR>
      </td>
      <td class="align_l"><label>
        <?=form::upload_image('info[img]', 'photo',"$rs[img]", 40)?>
      </label></td>
    </tr>
     <tr>
      <th class="align_r"><strong>��Ŀҳģ��</strong></th>
      <td><?=form::select_template('phpsin', 'setting[template_category]', 'template_category', $template_category, '','category')?></td>
    </tr>
    <tr>
      <th><strong>�б�ҳģ��</strong></th>
      <td><?=form::select_template('phpsin', 'setting[template_list]', 'template_list', $template_list, '','list')?></td>
    </tr>
    <tr>
      <th><strong>����ҳģ��</strong></th>
      <td><?=form::select_template('phpsin', 'setting[template_show]', 'template_show', $template_show, '','show')?></td>
    </tr>
    
    
    <tr>
      <th class="align_r"><strong>�ڵ�������ʾ</strong></th>
      <td>
          <input type="radio" name="info[ismenu]" value="1" id="RadioGroup1_0" <?php if($rs["ismenu"]){?>checked<?php }?>>
          ��
          <input type="radio" name="info[ismenu]" value="0" id="RadioGroup1_1" <?php if(!$rs["ismenu"]){?>checked<?php }?>>
          ��</td>
    </tr>
    <tr>
      <th class="align_r"><strong>��Ŀ����Html</strong></th>
      <td class="align_l">
      <input type='radio' name='setting[ishtml]' value='1' <?php if($ishtml){ ?>checked <?php } ?> onClick="$('#div_category_urlruleid').load('?file=<?=$file?>&action=urlrule&ishtml=1&type=category&category_urlruleid=<?=$category_urlruleid?>');"> ��
	  <input type='radio' name='setting[ishtml]' value='0' <?php if(!$ishtml){ ?>checked <?php } ?> onClick="$('#div_category_urlruleid').load('?file=<?=$file?>&action=urlrule&ishtml=0&type=category&category_urlruleid=<?=$category_urlruleid?>');"> ��</td>
    </tr>
    <tr>
      <th class="align_r"><strong>����ҳ����Html</strong></th>
      <td>
	  <input type='radio' name='setting[content_ishtml]' value='1' <?php if($ishtml){ ?>checked <?php } ?> onClick="$('#div_show_urlruleid').load('?file=<?=$file?>&action=show_urlrule&ishtml=1&type=show&show_urlruleid=<?=$show_urlruleid?>');"> ��
      
	  <input type='radio' name='setting[content_ishtml]' value='0' <?php if(!$ishtml){ ?>checked <?php } ?> onClick="$('#div_show_urlruleid').load('?file=<?=$file?>&action=show_urlrule&ishtml=0&type=show&show_urlruleid=<?=$show_urlruleid?>');"> ��
	  </td>
    </tr>
    <tr>
      <th><strong>��ĿҳURL����</strong><br />
	  <a href="?file=urlrule&action=add&module=phpsin&filename=category&forward=<?=urlencode(URL)?>" style="color:red">����½�URL����</a></th>
      <td><div id="div_category_urlruleid"></div></td>
    </tr>
	<tr>
      <th><strong>����ҳURL����</strong><br />
	  <a href="?file=urlrule&action=add&module=phpsin&filename=show&forward=<?=urlencode(URL)?>" style="color:red">����½�URL����</a></th>
      <td><div id="div_show_urlruleid"></div></td>
    </tr>
    <tr>
      <td class="align_r"><strong>��ĿĿ¼</strong><Br/><font color="red">����Ŀ¼����/Ŀ¼����</font> ��<font color="red">Ŀ¼����</font></td>
      <td class="align_l"><input type="text" name="dir" size='32' id="dir" value="<?=$catdir?>" maxlength='50' require="true" datatype="limit|ajax" min="1" max="50" url="?file=category&action=checkdir&parentid=<?=$catid?>" msg="�ַ����ȷ�Χ����Ϊ1��50λ|"></td>
    </tr>
  </table>
  </div>
    <div id='Tabs1' style='display:none'>
     <table align="center" cellpadding="0" cellspacing="1" class="table_list">
      <tr>
      <td class="align_r" width="25%"><strong>META Title������ҳ���⣩</strong><br />
      ��������������õı���</td>
      <td class="align_l"><label>
        <textarea name="info[title]"style="width:90%;height:50px"><?=$rs["title"]?></textarea>
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><strong>META Keywords������ҳ�ؼ��ʣ�</strong><br />
      ��������������õĹؼ���</td>
      <td class="align_l"><label>
        <textarea name="info[keywords]" style="width:90%;height:80px"><?=$rs["keywords"]?></textarea>
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><strong>META Description������ҳ������</strong><br />
      ��������������õ���ҳ����</td>
      <td class="align_l"><label>
        <textarea name="info[description]" style="width:90%;height:80px"><?=$rs["description"]?></textarea>
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
  <?php }?>
  
  
  
  <?php if($type==1){?>
  <form name="myform" method="post" action="?file=category&action=edit&category=edit&catid=<?=$rs["catid"]?>&type=<?=$type?>">
  
<div class="tag_menu" style="width:99%;margin-top:10px;">
<ul>
  <li><a href="###" id='TabTitle0' onclick='ShowTabs(0)' class="selected">��������</a></li>
  <li><a href="###" id='TabTitle1' onclick='ShowTabs(1)'>SEO����</a></li>
</ul>
</div>
<div id='Tabs0' style='display:'>
  <table align="center" cellpadding="0" cellspacing="1" class="table_form">
    <tr>
      <td class="align_r"><font color="red">*</font> <strong>�ϼ����</strong>��</td>
      <td width="558" class="align_l"><input type="hidden" name="info[modelname]" value="����ҳ"/>
      <select name="info[parentid]">
          <option value="0">��(��Ϊһ�����)</option>
          <?=$data?>
        </select></td>
    </tr>
    <tr>
      <td class="align_r" width="25%"><font color="red">*</font> <strong>����ҳ����</strong>��</td>
      <td class="align_l"><label>
        <input name="info[name]" type="text" value="<?=$rs["name"]?>"require="true" datatype="limit" min="1" max="50" size="50" msg="��������1���ַ�����50���ַ�"/>
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><STRONG>��ĿͼƬ</STRONG>��<BR>
      </td>
      <td class="align_l"><label>
        <?=form::upload_image('info[img]', 'photo',$rs["img"], 40)?>
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><font color="red">*</font> <strong>����ģ��</strong>��</td>
      <td><?=form::select_template('phpsin', 'setting[template]', 'template', $template, '','single')?></td>
    </tr>
    <tr>
      <td class="align_r"><strong>�ڵ�������ʾ</strong></td>
      <td>
          <input type="radio" name="info[ismenu]" value="1" id="RadioGroup1_0" <?=$rs["ismenu"]==1 ? "checked" :""?>>
          ��
          <input type="radio" name="info[ismenu]" value="0" id="RadioGroup1_1" <?=$rs["ismenu"]==0 ? "checked" :""?>>
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
      <td class="align_l"><input type="text" name="dir" size='32' id="dir" value="<?=$catdir?>" maxlength='50' require="true" datatype="limit|ajax" min="1" max="50" url="?file=category&action=checkdir&parentid=<?=$catid?>" msg="�ַ����ȷ�Χ����Ϊ1��50λ|"></td>
    </tr>
  </table>
  </div>
  
    <div id='Tabs1' style='display:none'>
   <table align="center" cellpadding="0" cellspacing="1" class="table_list">
        <tr>
      <td class="align_r" width="25%"><strong>META Title������ҳ���⣩</strong><br />
        ��������������õı���</td>
      <td class="align_l"><label>
        <textarea name="info[title]" style="width:90%;height:50px"><?=$rs["title"]?></textarea>
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><strong>META Keywords������ҳ�ؼ��ʣ�</strong><br />
        ��������������õĹؼ���</td>
      <td class="align_l"><label>
        <textarea name="info[keywords]" style="width:90%;height:80px"><?=$rs["keywords"]?></textarea>
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><strong>META Description������ҳ������</strong><br />
        ��������������õ���ҳ����</td>
      <td class="align_l"><label>
        <textarea name="info[description]" style="width:90%;height:80px"><?=$rs["description"]?></textarea>
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
  <?php }?>
  
  <?php if($type==2){?>
<form action="?file=category&action=edit&category=edit&catid=<?=$rs["catid"]?>&type=<?=$type?>" method="post">
  <table width="664" height="166" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    �޸��ⲿ����
    </caption>
    <tr>
      <td class="align_r"><strong>�ϼ���Ŀ</strong></td>
      <td class="align_l">
      <select name="info[parentid]">
          <option value="0">��(��Ϊһ�����)</option>
          <?=$data?>
        </select>
      <input type="hidden" name="info[modelid]" value="0" />
      <input type="hidden" name="info[modelname]" value="�ⲿ����"/>
      <input type="hidden" name="catid" value="<?=$catid?>" /></td>
    </tr>
    <tr>
      <td class="align_r"><strong>��������</strong></td>
      <td class="align_l"><label>
        <input name="info[name]" type="text" value="<?=$rs["name"]?>" size="30" require="true" datatype="limit" min="1" max="50" msg="��������1���ַ�����50���ַ�"/>
      <font color="#FF0000">*</font></label></td>
    </tr>
    <tr>
      <td class="align_r"><strong>����ͼƬ</strong></td>
      <td class="align_l"><label>
        <input name="info[img]" type="text" id="img" value="<?=$rs["img"]?>" size="30">
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><strong>�ڵ�������ʾ</strong></td>
      <td>
          <input type="radio" name="info[ismenu]" value="1" id="RadioGroup1_0" <?=$rs["ismenu"]==1 ? "checked" :""?>>
          ��
          <input type="radio" name="info[ismenu]" value="0" id="RadioGroup1_1" <?=$rs["ismenu"]==0 ? "checked" :""?>>
          ��
    <tr>
      <td class="align_r"><strong>���ӵ�ַ</strong></td>
      <td class="align_l"><label>
        <input name="info[url]" type="text" value="<?=$rs["url"]?>" size="50" require="true" datatype="limit" min="1" max="50" msg="���ӵ�ַ����Ϊ�գ�"/>
      <font color="#FF0000">*</font></label></td>
    </tr>
    <tr>
      <td width="171" class="align_c">&nbsp;</td>
      <td width="488" class="align_l"><label>
        <input type="submit" name="button" id="button" value="ȷ��" />
        <input type="reset" name="button2" id="button2" value="����" />
      </label></td>
    </tr>
  </table>
</form>
  <?php }?>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});

</script>
</body>
</html>
