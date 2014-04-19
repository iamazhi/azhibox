<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>管理友情连接</caption>
<tr>
  <th class="align_c">
 
   <b>显示选项：</b>
        <input name="passed" type="radio" value="1" id="1_0" <?php if(!$passed or $passed==1){echo "checked";}?> onClick="location='?file=<?=$file?>&action=<?=$action?>&passed=1&name=<?=$name?>&elite=<?=$elite?>&linktype=<?=$linktype?>'" >
        <A href="?file=<?=$file?>&action=<?=$action?>&passed=1&name=<?=$name?>&elite=<?=$elite?>&linktype=<?=$linktype?>">已审核的链接</a>
        <input name="passed" type="radio" value="2"  id="1_1"<?=$passed==2 ? "checked":""?> onClick="location='?file=<?=$file?>&action=<?=$action?>&passed=2&name=<?=$name?>&elite=<?=$elite?>&linktype=<?=$linktype?>'">
        <A href="?file=<?=$file?>&action=<?=$action?>&passed=2&name=&elite=&linktype=">未审核的链接</a>
           关键字：<input name="name" type="text" value="<?=$name?>">  
           <input name="linktype" type="radio" id="5_0" value="1" <?php if(!$linktype or $linktype==1){echo "checked";}?> onClick="location='?file=<?=$file?>&action=<?=$action?>&linktype=1&name=<?=$name?>&elite=<?=$elite?>&passed=<?=$passed?>'">
           <a href="?file=<?=$file?>&action=<?=$action?>&linktype=1&name=<?=$name?>&elite=<?=$elite?>&passed=<?=$passed?>">Logo链接</a> 
           <input name="linktype" type="radio" id="5_1" value="2" <?=$linktype==2 ? "checked":""?> onClick="location='?file=<?=$file?>&action=<?=$action?>&linktype=2&name=<?=$name?>&elite=<?=$elite?>&passed=<?=$passed?>'">
           <a href="?file=<?=$file?>&action=<?=$action?>&linktype=2&name=<?=$name?>&elite=<?=$elite?>&passed=<?=$passed?>">文字链接</a> 
           推荐<input name="elite" type="checkbox" value="1"> <input type="submit" name="dosubmit" value="搜索" /></td>
           
      </th>
</tr>
    
</table>
</form>
<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>管理友情连接</caption>
  <tr >
      <th width="5%">选中</th>
      <th width="5%">排序</th>
      <th width="20%">网站名称</th>
      <th width="20%">网站Logo</th>
      <th width="10%">所属分类</th>
      <th width="10%">链接类型</th>
      <th width="10%">点击次数</th>
      <th width="20%">操作</th>
    </tr>
    <?php foreach($info as $value) {?>
    <tr >
    <td class="align_c"><input type="checkbox" name="linkid[]" value="<?=$value['linkid']?>" /></td>
    <td class="align_c"><input type="text" name="listorders[<?=$value['linkid']?>]" value="<?=$value['listorder']?>" size="4" /></td>
    <td class="align_c"><a href="<?=$value["url"]?>" target="_blank"><?=output::style($value['name'], $value['style'])?></a> <font color="red"><?=$value["elite"]==1 ?" 推荐" : "" ?></font></td>
    <td class="align_c"><?php if($value["linktype"]==1){?><img src="<?=$value['logo']?>" width="88" height="31"><?php }?></td>
    <td class="align_c"><?php $k=$a->get($table='category',$where="menuid=".$value["typeid"]."");?><a href="?file=<?=$file?>&action=<?=$action?>&typeid=<?=$value["typeid"]?>&passed=<?=$passed?>"><?=$k["name"]?></a></td>
    <td class="align_c"><?=$value["linktype"]==2 ? "文字" :""?><?=$value["linktype"]==1 ? "图片" : "";?></td>
    <td class="align_c"><?=$value["hits"]?></td>
    <td class="align_c"><a href="?file=<?=$file?>&action=edit&linkid=<?=$value["linkid"]?>&typeid=<?=$value["typeid"]?>">修改</a> | <?php if($value["elite"]==1){?><a href="?file=<?=$file?>&action=hot&elite=2&linkid=<?=$value["linkid"]?>">取消推荐</a><?php }else{?><a href="?file=<?=$file?>&action=hot&elite=1&linkid=<?=$value["linkid"]?>">推荐连接</a><?php }?></td>
    </tr>
    <?php }?>
    </table>
    <div class="button_box"><span style="width:60px"><a href="###" onClick="javascript:$('input[type=checkbox]').attr('checked', true)">全选</a>/<a href="###" onClick="javascript:$('input[type=checkbox]').attr('checked', false)">取消</a></span>
   <input type="button" name="listorder" value="更新排序" onClick="myform.action='?file=<?=$file?>&action=listorder';myform.submit();"> 
   <input type="button" name="delete" value="删除连接" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
   <?php if($passed==1){?>
   <input type="button" name="delete" value="取消审核" onClick="myform.action='?file=<?=$file?>&action=passed_break';myform.submit();"> 
   <?php }else{?>
   <input type="button" name="delete" value="审核连接" onClick="myform.action='?file=<?=$file?>&action=passed';myform.submit();"> 
   <?php }?>
   <input type="button" name="delete" value="推荐连接" onClick="myform.action='?file=<?=$file?>&action=hotlink';myform.submit();"> 
   <input type="button" name="delete" value="取消推荐" onClick="myform.action='?file=<?=$file?>&action=hotlink_break';myform.submit();"> 

</div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>