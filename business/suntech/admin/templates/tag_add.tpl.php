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
<form name="myform" method="post" action="?file=tag&action=add&module=<?=$module?>&type=<?=$type?>" >
<input name="mod" type="hidden" value="<?=$mod?>">
<input name="file" type="hidden" value="<?=$file?>">
<input name="action" id="action" type="hidden" value="update">
<input name="module" type="hidden" value="<?=$module?>">
<input name="type" type="hidden" value="<?=$type?>">
<input type="hidden" name="isadd" value="1">
<input name="forward" type="hidden" value="?file=tag&action=manage&module=<?=$module?>&type=<?=$type?>">
<table cellpadding="0" cellspacing="1" class="table_form">
<tbody>
    <caption>���<?=$types[$type]?>��ǩ</caption>
    <tr> 
      <th width="30%"><font color="red">*</font> <strong>��ǩ����</strong><br/>�������ģ����ð��������ַ� ' " $ { } ( ) \ / , ;</th>
      <td>
	  <input name="tagname" id="tagname" type="text" size="30" value="<?=$tagname?>" require="true" datatype="require" url="?mod=<?=$mod?>&file=<?=$file?>&action=checktag" msg="��ǩ���Ʊ���|"><br/>
	  </td>
    </tr>
    <tr> 
      <th><strong>��ǩ˵��</strong><br/>���磺��ҳ�����Ƽ���Ʒ��10ƪ</th>
      <td><input name="tag_config[introduce]" id="introduce" type="text" size="60" value="<?=$introduce?>"/></td>
    </tr>
    
    
      <tr> 
      <td class="tablerowhighlight" colspan=2 align="center"><strong>ѡ������ģ��</strong></td>
      </tr>
      <tr> 
      <th><strong>ģ��</strong><br/><strong>��ǩ���÷�ʽ</strong></th>
      <td>
          <input type="radio" name="tag_config[type]" value="content" onClick="location='?file=tag&action=add&module=phpsin&type=content'"<?=$type=='content' ? 'checked' : ''?>/> 
          ����ģ��
          <input type="radio" name="tag_config[type]" value="category" onClick="location='?file=tag&action=add&module=phpsin&type=category'"<?=$type=='category' ? 'checked' : ''?> /> 
          ��Ŀ
          <input type="radio" name="tag_config[type]" value="member" onClick="location='?file=tag&action=add&module=phpsin&type=member'"<?=$type=='member' ? 'checked' : ''?> />
          ��Աģ��
          <input type="radio" name="tag_config[type]" value="sql" onClick="location='?file=tag&action=add&module=member&type=sql'" <?=$type=='sql' ? 'checked' : ''?> /> ͨ���Զ���SQL����
	  </td>
    </tr>
</tbody>

<?php if($type=="sql") {?>
<!--�Զ���SQL-->
<tbody>
      <tr>
      <th><strong>�Զ���SQL</strong></th>
	  <td><input type="text" name="tag_config[sql]" id="sql" style="width:100%"  value="<?=$sql?>"/></td>
      </tr>
      <tr>
      <th>ѭ�����</th>
      <td><textarea name="tag_config[tag]" cols="100" rows="10"><?=$sql?></textarea></td>
      </tr>
     </tbody>
<?php }?>
     
     
<!--����ģ��-->  
<?php if($type=="content"){?>   
<tbody >
    <tr>
     <th><strong>����ģ��</strong><br/>��ѡ������ģ��</th>
    <td><?=form::select_model('modelid', 'modelid', '����', $modelid, 'onchange="javascript:document.myform.action.value=\'add\';document.myform.submit()"')?></td>
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
      <td><?=form::select($orderfields, 'tag_config[orderby]', 'orderby', 'contentid DESC', 1)?></td>
    </tr>
    
     <tr>
      <th><strong>����</strong></th>
      <td><textarea name="tag_config[tag]" cols="80" rows="10">
{loop $data $n $v}
<a href="{$v[url]}" >{str_cut($v[title],20)}</a>
{/loop}
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
      <td><input type="text" name="tag_config[module]" id="themodule" size="15" onBlur="$('#category').load('?file=tag&action=ajax_category&module='+this.value);"> 
	  <?=form::select_module('select_module', '', '��ѡ��', '', 'onchange="myform.themodule.value=this.value;$(\'#category\').load(\'?file=tag&action=ajax_category&module=\' + this.value);"')?></td>
 </tr>
 <tr>
      <th><strong>������ĿID</strong><br />
	  ���ñ�����ʾ��<a href="###" onClick="javascript:$('#categoryid').val('$catid')" style="color:blue">$catid</a>
	  </th>
      <td><input type="text" name="tag_config[catid]" id="categoryid" size="15" class="noime"> <span id="category"></span></td>
    </tr>
    
     <tr>
      <th><strong>����</strong><Br/>����{str_cut($v[title],20)}��ȡ�ַ�20��</th>
      <td><textarea name="tag_config[tag]" cols="80" rows="10">
{loop $data $n $v}
<a href="{$v[url]}" >{$v[name]}</a>
{/loop}
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
      <td><input type="radio" name="tag_config[page]" value="$page" onClick="$('#pagesize').show();">��&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="tag_config[page]" value="0" checked onClick="$('#pagesize').hide();">��</td>
    </tr>
    <tr> 
      <th><strong>��������</strong></th>
      <td><input type="text" name="tag_config[number]" size="10" value="10"> �� <span id="pagesize" style="display:none;">���˱�ǩ������Ŀ�б��ҳʱ������Htmlʱ��������ϵͳ�����÷�ҳ����<font color="red"><?=$PHPWEB['pagesize']?></font>������һ��</span></td>
    </tr>
   
    <tr>
      <td></td>
      <td>
<input type="submit" name="dosubmit" value=" ���� " onClick="$('#action').val('update');">
&nbsp;
<input type="submit" name="preview" value=" Ԥ�� " onClick="$('#action').val('preview');">
     </td>
    </tr>
</tbody>
</table>
</form>
</body>
</html>