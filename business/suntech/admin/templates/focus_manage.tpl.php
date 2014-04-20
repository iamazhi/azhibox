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
        <input name="passed" type="radio" value="1" id="1_0" <?php if(!$passed and !$elite or $passed==1){echo "checked";}?> onClick="location='?file=<?=$file?>&action=<?=$action?>&passed=1&name=<?=$name?>'" >
        <A href="?file=<?=$file?>&action=<?=$action?>&passed=1&name=<?=$name?>">已审核的链接</a>
        <input name="passed" type="radio" value="2"  id="1_1"<?=$passed==2 ? "checked":""?> onClick="location='?file=<?=$file?>&action=<?=$action?>&passed=2&name=<?=$name?>'">
        <A href="?file=<?=$file?>&action=<?=$action?>&passed=2&name=&elite">未审核的链接</a>
          
           <input name="elite" type="radio" id="1_2" value="1" <?php if($elite==1){echo "checked";}?> onClick="location='?file=<?=$file?>&action=<?=$action?>&name=<?=$name?>&elite=1'">
           <a href="?file=<?=$file?>&action=<?=$action?>&name=<?=$name?>&elite=1">推荐焦点</a> 
          
         
           关键字：<input name="name" type="text" value="<?=$name?>">   <input type="submit" name="dosubmit" value="搜索" /></td>
           
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
      <th width="10%">所属分类</th>
      <th width="10%">链接类型</th>
      <th width="10%">点击次数</th>
      <th width="20%">操作</th>
    </tr>
    <?php foreach($info as $value) {?>
    <tr >
    <td class="align_c"><input type="checkbox" name="focusid[]" value="<?=$value['focusid']?>" /></td>
    <td class="align_c"><input type="text" name="listorders[<?=$value['focusid']?>]" value="<?=$value['listorder']?>" size="4" /></td>
    <td class="align_c"><a href="<?=$value["url"]?>" target="_blank"><?=output::style($value['name'], $value['style'])?></a> <font color="red"><?=$value["elite"]==1 ?" 推荐" : "" ?></font></td>
  
    <td class="align_c"><? $k=$a->get($table='category',$where="menuid=".$value["typeid"]."");?><a href="?file=<?=$file?>&action=<?=$action?>&typeid=<?=$value["typeid"]?>&passed=<?=$value["passed"]?>"><?=$k["name"]?></a></td>
    <td class="align_c">图片</td>
    <td class="align_c"><?=$value["hits"]?></td>
    <td class="align_c"><a href="?file=<?=$file?>&action=edit&focusid=<?=$value["focusid"]?>&typeid=<?=$value["typeid"]?>">修改</a> | <?php if($value["elite"]==1){?><a href="?file=<?=$file?>&action=hot&elite=2&focusid=<?=$value["focusid"]?>">取消推荐</a><?php }else{?><a href="?file=<?=$file?>&action=hot&elite=1&focusid=<?=$value["focusid"]?>">推荐连接</a><?php }?></td>
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