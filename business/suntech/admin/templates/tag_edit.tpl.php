<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<script type="text/javascript">
function doCheck()
{
	if($('#tagname').val()=='')
	{
		alert('标签名称不能为空');
		$('#tagname').focus();
		return false;
	}
	return true;
}
var i = 3;
function var_add()
{
	var data = '<div id="var'+i+'"><span style="width:150px"><input name="tag_config[var_description]['+i+']" type="text" size="18"></span><span style="width:100px"><input name="tag_config[var_name]['+i+']" type="text" size="10"> => </span><span style="width:120px"><input name="tag_config[var_value]['+i+']" type="text" size="15"></span> <span> <a href="###" onclick="var_del('+i+')">删除</a></span></div>';
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
    <caption>编辑<?=$types[$type]?>标签</caption>
    <tr> 
      <th width="30%"><font color="red">*</font> <strong>标签名称</strong><br/>可用中文，不得包含特殊字符 ' " $ { } ( ) \ / , ;</th>
      <td>
	  <input name="tagname" id="tagname" type="text" size="30" value="<?=$tag["tagname"]?>" readonly><br/>
	  </td>
    </tr>
    <tr> 
      <th><strong>标签说明</strong><br/>例如：首页最新推荐产品，10篇</th>
      <td><input name="tag_config[introduce]" id="introduce" type="text" size="60" value="<?=$tag["introduce"]?>"/></td>
    </tr>
    
    
      <tr> 
      <td class="tablerowhighlight" colspan=2 align="center"><strong>选择内容模型</strong></td>
      </tr>
      <tr> 
      <th><strong>模型</strong><br/><strong>标签调用方式</strong></th>
      <td>
          <?php if($tag["type"]=="content") {?>
          <input type="radio" name="tag_config[type]" value="content" onClick="location='?file=<?=$file?>&action=edit&module=<?=$module?>&modelid=<?=$tag["modelid"]?>&tagid=<?=$tag["tagid"]?>&type=<?=$tag["type"]?>'"<?=$tag["type"]=='content' ? 'checked' : ''?>/> 
          内容模块
          
          <?php }if($tag["type"]=="category"){?>
          <input type="radio" name="tag_config[type]" value="category" onClick="location='?file=<?=$file?>&action=edit&module=<?=$module?>&modelid=<?=$tag["modelid"]?>&tagid=<?=$tag["tagid"]?>&type=<?=$tag["type"]?>'"<?=$type=='category' ? 'checked' : ''?> /> 
          栏目
          
          <?php }if($tag["type"]=="member"){?>
          <input type="radio" name="tag_config[type]" value="member" onClick="location='?file=tag&action=add&module=phpsin&type=member'"<?=$type=='member' ? 'checked' : ''?> />
          会员模块
          
          <?php }if($type=="sql" || $type!="sql"){?>
          <input type="radio" name="tag_config[type]" value="sql" onClick="location='?file=<?=$file?>&action=edit&module=<?=$module?>&modelid=<?=$tag["modelid"]?>&tagid=<?=$tag["tagid"]?>&type=sql'" <?=$type=='sql' ? 'checked' : ''?> /> 通过自定义SQL调用
          <?php }?>
	  </td>
    </tr>
</tbody>

<?php if($type=="sql") {?>
<!--自定义SQL-->
<tbody>
      <tr>
      <th><strong>自定义SQL</strong></th>
	  <td><textarea name="tag_config[sql]" cols="100" rows="10"><?=$tag["sql"]?></textarea></td>
      </tr>
      <tr>
      <th>循环语句</th>
      <td><textarea name="tag_config[tag]" cols="100" rows="10"><?=$tag["tag"]?></textarea></td>
      </tr>
     </tbody>

 <?php } ?>
     
<!--内容模型-->  
<?php if($type=="content" and $tag["type"]=="content" && $type!="sql"){?>   
<tbody >
    <tr>
     <th><strong>内容模型</strong><br/>请选择内容模型</th>
    <td><?=form::select_model('modelid', 'modelid', '不限', $modelid, 'onchange="javascript:document.myform.action.value=\'edit\';document.myform.submit()"')?></td>
    </tr>
    
    <tr> 
      <td class="tablerowhighlight" colspan=2 align="center"><strong>数据读取字段</strong></td>
    </tr>
    <tr> 
      <th><strong>读取字段</strong><br/>请选择要读取的数据表字段</th>
      <td>
<?=form::checkbox($fields, 'tag_config[selectfields]', 'selectfields', $selectfields, 5, '', '', 100)?>
	  </td>
    </tr>
    <tr> 
      <td class="tablerowhighlight" colspan=2 align="center"><strong>数据调用条件</strong></td>
    </tr>
 <?php 
 foreach($forminfos as $field=>$info)
 {
 ?>
	<tr> 
      <th><strong><?=$info['name']?></strong><br />
	  常用变量表示：<a href="###" onClick="javascript:if($('#<?=$field?>').val() == '$<?=$field?>'){$('#<?=$field?>').val('')}else{$('#<?=$field?>').val('$<?=$field?>')}" style="color:blue">$<?=$field?></a>
	  </th>
      <td><?=$info['form']?></td>
    </tr>
<?php 
}
?>
    <tr> 
      <th><strong>排序方式</strong></th>
      <td><?=form::select($orderfields, 'tag_config[orderby]', 'orderby', $tag["orderby"], 1)?></td>
    </tr>
    
     <tr>
      <th><strong>代码</strong></th>
      <td><textarea name="tag_config[tag]" cols="80" rows="10">
<?=$tag["tag"]?>
</textarea>&nbsp;</td>
    </tr>
</tbody>
<tbody>
<?php }?>

<!--栏目模块-->
<?php if($type == "category"){?>
<tbody >
 <tr>
   <th><strong>所属模块</strong><br />
	  常用变量表示：<a href="###" onClick="javascript:$('#themodule').val('$mod')" style="color:blue">$mod</a>
	  </th>
      <td><input type="text" name="tag_config[module]" id="themodule" size="15" value="<?=$tag['module']?>" onBlur="$('#category').load('?file=tag&action=ajax_category&module='+this.value);"> 
	  <?=form::select_module('select_module', '', '请选择', '', 'onchange="myform.themodule.value=this.value;$(\'#category\').load(\'?file=tag&action=ajax_category&module=\' + this.value);"')?></td>
 </tr>
 <tr>
      <th><strong>所属栏目ID</strong><br />
	  常用变量表示：<a href="###" onClick="javascript:$('#categoryid').val('$catid')" style="color:blue">$catid</a>
	  </th>
      <td><input type="text" name="tag_config[catid]" id="categoryid" size="15" class="noime"  value="<?=$tag["catid"]?>"> <span id="category"></span></td>
    </tr>
    
     <tr>
      <th><strong>代码</strong><Br/>例：{str_cut($v[title],20)}截取字符20个</th>
      <td><textarea name="tag_config[tag]" cols="80" rows="10">
<?=$tag["tag"]?>
</textarea>&nbsp;</td>
    </tr>
    
</tbody>
<?php }?>

<!--会员模块-->
<?php if($type=="member"){?>
<tbody >
 <tr>
  <th>会员模型<br/>请选择会员模型</th>
  <td><?=form::select_member_model('modelid', 'modelid', '请选择', $modelid, 'onchange="javascript:document.myform.action.value=\'add\';document.myform.submit()"')?>
</td>
  </tr>
  <tr>
  <th>读取字段<br/>请选择要读取的数据表字段</th>
  <td><?=form::checkbox($fields, 'tag_config[selectfields]', 'selectfields', $selectfields, 5, '', '', 100)?></td>
 </tr>
</tbody>
<?php }?>

    <tr> 
      <th><strong>分页显示</strong></th>
      <td><input type="radio" name="tag_config[page]" value="$page" <?=($tag["page"]=='$page' ? 'checked' : '')?> onClick="$('#pagesize').show();">是&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="tag_config[page]" value="0" <?=($tag["page"]=='0' ? 'checked' : '')?> onClick="$('#pagesize').hide();">否</td>
    </tr>
    <tr> 
      <th><strong>调用条数</strong></th>
      <td><input type="text" name="tag_config[number]" size="10" value="<?=$tag["number"]?>"> 条 <span id="pagesize" style="display:none;">当此标签用于栏目列表分页时且生成Html时，必须与系统所设置分页数（<font color="red"><?=$PHPWEB['pagesize']?></font>）保持一致</span></td>
    </tr>
   
    <tr>
      <td></td>
      <td>
<input type="submit" name="dosubmit" value=" 修改 "  onClick="$('#action').val('update');">
&nbsp;
<input type="submit" name="preview" value=" 预览 " onClick="$('#action').val('preview');">
     </td>
    </tr>
</tbody>
</table>
</form>
</body>
</html>