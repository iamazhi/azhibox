<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<script type="text/javascript">
function doCheck()
{
	if($('#tagname').val()=='')
	{
		alert('��ǩ���Ʋ���Ϊ��');
		$('#tagname').focus();
		return false;
	}
	return true;
}
var i = 3;
function var_add()
{
	var data = '<div id="var'+i+'"><span style="width:150px"><input name="tag_config[var_description]['+i+']" type="text" size="18"></span><span style="width:100px"><input name="tag_config[var_name]['+i+']" type="text" size="10"> => </span><span style="width:120px"><input name="tag_config[var_value]['+i+']" type="text" size="15"></span> <span> <a href="###" onclick="var_del('+i+')">ɾ��</a></span></div>';
	$('#var_define').append(data);
	i++;
	return true;
}
function var_del(i)
{
	$('#var'+i).remove();
	return true;
}
$().ready(function() {
	  $('form').checkForm(1);
	});
</script>
<body>
<form name="myform" method="post"  >
<input name="action" id="action" type="hidden" value="update">
<table cellpadding="0" cellspacing="1" class="table_form">
<tbody>
    <caption>�༭<?=$types[$type]?>��ǩ</caption>
    <tr> 
      <th width="30%"><font color="red">*</font> <strong>��ǩ����</strong><br/>�������ģ����ð��������ַ� ' " $ { } ( ) \ / , ;</th>
      <td>
	  <input name="tagname" id="tagname" type="text" size="30" value="<?=$tag["tagname"]?>" readonly><br/>
	  </td>
    </tr>
    <tr> 
      <th><strong>��ǩ˵��</strong><br/>���磺��ҳ�����Ƽ���Ʒ��10ƪ</th>
      <td><input name="tag_config[introduce]" id="introduce" type="text" size="60" value="<?=$tag["introduce"]?>"/></td>
    </tr>
    
    
      <tr> 
      <td class="tablerowhighlight" colspan=2 align="center"><strong>ѡ������ģ��</strong></td>
      </tr>
      <tr> 
      <th><strong>ģ��</strong><br/><strong>��ǩ���÷�ʽ</strong></th>
      <td>
          <?php if($tag["type"]=="content") {?>
          <input type="radio" name="tag_config[type]" value="content" onClick="location='?file=<?=$file?>&action=edit&module=<?=$module?>&modelid=<?=$tag["modelid"]?>&tagid=<?=$tag["tagid"]?>&type=<?=$tag["type"]?>'"<?=$tag["type"]=='content' ? 'checked' : ''?>/> 
          ����ģ��
          
          <?php }if($tag["type"]=="category"){?>
          <input type="radio" name="tag_config[type]" value="category" onClick="location='?file=<?=$file?>&action=edit&module=<?=$module?>&modelid=<?=$tag["modelid"]?>&tagid=<?=$tag["tagid"]?>&type=<?=$tag["type"]?>'"<?=$type=='category' ? 'checked' : ''?> /> 
          ��Ŀ
          
          <?php }if($tag["type"]=="member"){?>
          <input type="radio" name="tag_config[type]" value="member" onClick="location='?file=tag&action=add&module=phpsin&type=member'"<?=$type=='member' ? 'checked' : ''?> />
          ��Աģ��
          
          <?php }if($type=="sql" || $type!="sql"){?>
          <input type="radio" name="tag_config[type]" value="sql" onClick="location='?file=<?=$file?>&action=edit&module=<?=$module?>&modelid=<?=$tag["modelid"]?>&tagid=<?=$tag["tagid"]?>&type=sql'" <?=$type=='sql' ? 'checked' : ''?> /> ͨ���Զ���SQL����
          <?php }?>
	  </td>
    </tr>
</tbody>

<?php if($type=="sql") {?>
<!--�Զ���SQL-->
<tbody>
      <tr>
      <th><strong>�Զ���SQL</strong></th>
	  <td><textarea name="tag_config[sql]" cols="100" rows="10"><?=$tag["sql"]?></textarea></td>
      </tr>
      <tr>
      <th>ѭ�����</th>
      <td><textarea name="tag_config[tag]" cols="100" rows="10"><?=$tag["tag"]?></textarea></td>
      </tr>
     </tbody>

 <?php } ?>
     
<!--����ģ��-->  
<?php if($type=="content" and $tag["type"]=="content" && $type!="sql"){?>   
<tbody >
    <tr>
     <th><strong>����ģ��</strong><br/>��ѡ������ģ��</th>
    <td><?=form::select_model('modelid', 'modelid', '����', $modelid, 'onchange="javascript:document.myform.action.value=\'edit\';document.myform.submit()"')?></td>
    </tr>
    
    <tr> 
      <td class="tablerowhighlight" colspan=2 align="center"><strong>���ݶ�ȡ�ֶ�</strong></td>
    </tr>
    <tr> 
      <th><strong>��ȡ�ֶ�</strong><br/>��ѡ��Ҫ��ȡ�����ݱ��ֶ�</th>
      <td>
<?=form::checkbox($fields, 'tag_config[selectfields]', 'selectfields', $selectfields, 5, '', '', 100)?>
	  </td>
    </tr>
    <tr> 
      <td class="tablerowhighlight" colspan=2 align="center"><strong>���ݵ�������</strong></td>
    </tr>
 <?php 
 foreach($forminfos as $field=>$info)
 {
 ?>
	<tr> 
      <th><strong><?=$info['name']?></strong><br />
	  ���ñ�����ʾ��<a href="###" onClick="javascript:if($('#<?=$field?>').val() == '$<?=$field?>'){$('#<?=$field?>').val('')}else{$('#<?=$field?>').val('$<?=$field?>')}" style="color:blue">$<?=$field?></a>
	  </th>
      <td><?=$info['form']?></td>
    </tr>
<?php 
}
?>
    <tr> 
      <th><strong>����ʽ</strong></th>
      <td><?=form::select($orderfields, 'tag_config[orderby]', 'orderby', $tag["orderby"], 1)?></td>
    </tr>
    
     <tr>
      <th><strong>����</strong></th>
      <td><textarea name="tag_config[tag]" cols="80" rows="10">
<?=$tag["tag"]?>
</textarea>&nbsp;</td>
    </tr>
</tbody>
<tbody>
<?php }?>

<!--��Ŀģ��-->
<?php if($type == "category"){?>
<tbody >
 <tr>
   <th><strong>����ģ��</strong><br />
	  ���ñ�����ʾ��<a href="###" onClick="javascript:$('#themodule').val('$mod')" style="color:blue">$mod</a>
	  </th>
      <td><input type="text" name="tag_config[module]" id="themodule" size="15" value="<?=$tag['module']?>" onBlur="$('#category').load('?file=tag&action=ajax_category&module='+this.value);"> 
	  <?=form::select_module('select_module', '', '��ѡ��', '', 'onchange="myform.themodule.value=this.value;$(\'#category\').load(\'?file=tag&action=ajax_category&module=\' + this.value);"')?></td>
 </tr>
 <tr>
      <th><strong>������ĿID</strong><br />
	  ���ñ�����ʾ��<a href="###" onClick="javascript:$('#categoryid').val('$catid')" style="color:blue">$catid</a>
	  </th>
      <td><input type="text" name="tag_config[catid]" id="categoryid" size="15" class="noime"  value="<?=$tag["catid"]?>"> <span id="category"></span></td>
    </tr>
    
     <tr>
      <th><strong>����</strong><Br/>����{str_cut($v[title],20)}��ȡ�ַ�20��</th>
      <td><textarea name="tag_config[tag]" cols="80" rows="10">
<?=$tag["tag"]?>
</textarea>&nbsp;</td>
    </tr>
    
</tbody>
<?php }?>

<!--��Աģ��-->
<?php if($type=="member"){?>
<tbody >
 <tr>
  <th>��Աģ��<br/>��ѡ���Աģ��</th>
  <td><?=form::select_member_model('modelid', 'modelid', '��ѡ��', $modelid, 'onchange="javascript:document.myform.action.value=\'add\';document.myform.submit()"')?>
</td>
  </tr>
  <tr>
  <th>��ȡ�ֶ�<br/>��ѡ��Ҫ��ȡ�����ݱ��ֶ�</th>
  <td><?=form::checkbox($fields, 'tag_config[selectfields]', 'selectfields', $selectfields, 5, '', '', 100)?></td>
 </tr>
</tbody>
<?php }?>

    <tr> 
      <th><strong>��ҳ��ʾ</strong></th>
      <td><input type="radio" name="tag_config[page]" value="$page" <?=($tag["page"]=='$page' ? 'checked' : '')?> onClick="$('#pagesize').show();">��&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="tag_config[page]" value="0" <?=($tag["page"]=='0' ? 'checked' : '')?> onClick="$('#pagesize').hide();">��</td>
    </tr>
    <tr> 
      <th><strong>��������</strong></th>
      <td><input type="text" name="tag_config[number]" size="10" value="<?=$tag["number"]?>"> �� <span id="pagesize" style="display:none;">���˱�ǩ������Ŀ�б��ҳʱ������Htmlʱ��������ϵͳ�����÷�ҳ����<font color="red"><?=$PHPWEB['pagesize']?></font>������һ��</span></td>
    </tr>
   
    <tr>
      <td></td>
      <td>
<input type="submit" name="dosubmit" value=" �޸� "  onClick="$('#action').val('update');">
&nbsp;
<input type="submit" name="preview" value=" Ԥ�� " onClick="$('#action').val('preview');">
     </td>
    </tr>
</tbody>
</table>
</form>
</body>
</html>