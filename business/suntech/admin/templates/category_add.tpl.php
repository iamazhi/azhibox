<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<script type="text/javascript" src="images/js/form.js"></script>
<body <?php if($type<2){ ?>onLoad="is_ie();$('#div_category_urlruleid').load('?file=<?=$file?>&action=urlrule&ishtml=<?=$ishtml?>&type=category&category_urlruleid=<?=$category_urlruleid?>');$('#div_show_urlruleid').load('?file=<?=$file?>&action=show_urlrule&ishtml=<?=$ishtml?>&type=show&show_urlruleid=<?=$show_urlruleid?>');"<?php } ?>>
<?php if(!isset($type)){?>
<form name="myform" method="get" action="">
<input name="file" type="hidden" value="category">
<input name="action" type="hidden" value="add">
<table width="582" align="center" cellpadding="2" cellspacing="1" class="table_form">
  <caption>�����Ŀ</caption>
  <tr>
  <th><font color="red">*</font>  <strong>�ϼ���Ŀ</strong></th>
  <td><label>
    <select name="catid">
      <option value="0" >��(��Ϊһ����Ŀ)</option>
      <?=$data?>
    </select>
  </label>

  </td>
  </tr>
     <tr>
      <th><strong>��Ŀ����</strong></th>
      <td>
	  <input type="radio" name="type" value="0" checked onClick="$('#model').show()">�ڲ���Ŀ���ɰ�����ģ�ͣ���֧������Ŀ�½�������Ŀ�򷢲���Ϣ��<br/>
	  <input type="radio" name="type" value="1" onClick="$('#model').hide()">����ҳ���ɸ��µ���ҳ���ݣ����ǲ�������Ŀ�½�������Ŀ�򷢲���Ϣ��<br/>
	  <input type="radio" name="type" value="2" onClick="$('#model').hide()">�ⲿ���ӣ��ɽ���һ�����Ӳ�ָ��������ַ��<br/>
	  </td>
    </tr>
<tbody id="model" style="display:'block'">
     <tr>
      <th><strong>��ģ��</strong></td>
      <td><label>
        <select name="modelid" >
        <?php foreach($array as $val)
		     {
				if($_GET["modelid"]==$val["modelid"])
				{
		echo "<option value='".$val["modelid"]."' selected='selected'>".$val["name"]."</option>";	
					}else
					{
						echo "<option value='".$val["modelid"]."'>".$val["name"]."</option>";
						}
		       }?>
        </select>
      </label>  <a href="?file=model&action=manage">��������</a></td>
    </tr>
</tbody>
	<tr>
	 <th></th>
	 <td><input type="submit" name="next" value=" ��һ�� ">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" ���� "></td>
	</tr>
</table>
</form>
<?php }?>

<?php if($_GET["type"]=='0'){?>
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
      <td class="align_r" width="25%" ><font color="red">*</font> <strong>�ϼ���Ŀ</strong>��</td>
      <td class="align_l"><?=$catename?>
      <input type="hidden" name="catid" value="<?=$catid?>">
      <input type="hidden" name="info[type]" value="<?=$type?>">
      </td>
    </tr>
    <tr>
      <td class="align_r"><font color="red">*</font> <strong>������</strong>��</td>
      <td class="align_l"><?=$modelname["name"]?>
        <input type="hidden" name="info[modelid]" value="<?=$modelid?>"/>
      <input type="hidden" name="info[modelname]" value="<?=$modelname["name"]?>"/></td>
    </tr>
    <tr>
      <td class="align_r"><font color="red">*</font> <strong>��Ŀ����</strong>��</td>
      <td class="align_l"><label>
        <input name="info[name]" type="text" require="true" datatype="limit" min="1" max="50" size="50" msg="��������1���ַ�����50���ַ�"/></label></td>
    </tr>
    <tr>
      <td class="align_r"><STRONG>��ĿͼƬ</STRONG>��<BR>
      </td>
      <td class="align_l"><label>
        <?=form::upload_image('info[img]', 'photo',$info["img"], 40)?>
      </label></td>
    </tr>
     <tr>
      <th class="align_r"><strong>��Ŀҳģ��</strong></th>
      <td><?=form::select_template('phpsin', 'setting[template_category]', 'template_category', $MODEL[$modelid]['template_category'], '','category')?></td>
    </tr>
    <tr>
      <th><strong>�б�ҳģ��</strong></th>
      <td><?=form::select_template('phpsin', 'setting[template_list]', 'template_list', $MODEL[$modelid]['template_list'], '','list')?></td>
    </tr>
    <tr>
      <th><strong>����ҳģ��</strong></th>
      <td><?=form::select_template('phpsin', 'setting[template_show]', 'template_show', $MODEL[$modelid]['template_show'], '','show')?></td>
    </tr>
    
    
    <tr>
      <th class="align_r"><strong>�ڵ�������ʾ</strong></th>
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

    <tr  id="dirs">
      <td class="align_r"><strong>��ĿĿ¼</strong><Br/><font color="red">����Ŀ¼����/Ŀ¼����</font>(���ո�Ŀ¼��)</td>
      <td class="align_l"><input type="text" name="dir" size='32' id="dir" maxlength='50' require="true" datatype="limit|ajax" min="1" max="50" url="?file=category&action=checkdir&parentid=<?=$catid?>" msg="�ַ����ȷ�Χ����Ϊ1��50λ|" value="<?=$dir?>"> </td>
    </tr> 
  </table>
  </div>
  
  <div id='Tabs1' style='display:none'>
   <table align="center" cellpadding="0" cellspacing="1" class="table_list">
    <tr>
      <td class="align_r" width="25%"><STRONG>META Title����Ŀ���⣩</STRONG><BR>
      ��������������õı���</td>
      <td class="align_l"><label>
        <textarea name="info[title]" style="width:90%;height:50px"></textarea>
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><STRONG>META Keywords����Ŀ�ؼ��ʣ�</STRONG><BR>
      ��������������õĹؼ���</td>
      <td class="align_l"><label>
        <textarea name="info[keywords]" style="width:90%;height:80px"></textarea>
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><STRONG>META Description����Ŀ������</STRONG><BR>
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
<?php }?>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});
</script>
</body>
</html>
