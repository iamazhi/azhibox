<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>广告位查询</caption>
<tr>
  <th class="align_c">
 
  <input name="passed" type="radio" value="" id="1_0" <?php if(!$passed or $passed==""){echo "checked";}?> onClick="location='?file=<?=$file?>&action=<?=$action?>'" >全部
        <input name="passed" type="radio" value="1"  id="1_1"<?=$passed==1 ? "checked":""?> onClick="location='?file=<?=$file?>&action=<?=$action?>&passed=1&name=<?=$name?>'">开放
        <input name="passed" type="radio" value="2"  id="1_2"<?=$passed==2 ? "checked":""?> onClick="location='?file=<?=$file?>&action=<?=$action?>&passed=2&name=<?=$name?>'">
        锁定                          
       
          <select name="select" id="select">
            <option value="placename" <?=$select=="placename" ? "selected":""?>>名称</option>
            <option value="introduce" <?=$select=="introduce" ? "selected":""?>>介绍</option>
            <option value="placeid" <?=$select=="placeid" ? "selected":""?>>ID</option>
          </select>
        
<input name="name" type="text" value="<?=$name?>">
<input type="submit" name="dosubmit" value="搜索" /></td>
           
      </th>
</tr>
    
</table>
</form>
<form name="myform" action="?file=<?=$file?>&action=passed" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>管理广告位</caption>
  <tr >
      <th width="5%">选中</th>
      <th width="15%">广告位名称</th>
      <th width="18%">介绍</th>
      <th width="10%">尺寸</th>
      <th width="5%">状态</th>
      <th width="5%">广告数</th>
      <th width="7%">价格</th>
      <th width="20%">管理操作</th>
    </tr>
    <?php foreach($info as $value) {?>
    <tr >
    <td class="align_c" ><input type="checkbox" name="placeid[]" id="checkbox"value="<?=$value['placeid']?>" /></td>
   
    <td class="align_c"><?=$value["placename"]?></td>
    <td class="align_c"><?=$value["introduce"]?></td>
    <td class="align_c"><?=$value["width"]?>×<?=$value["height"]?></td>
    <td class="align_c"><?=$value["passed"]==1 ? "<font color=#006600>开放</font>": ""?><?=$value["passed"]==2 ? "<font color=red>锁定</font>": ""?></td>
    <td class="align_c"><?=$value["items"]?></td>
    <td class="align_c"><?=$value["price"]?></td>
    <td class="align_c"><a href="?file=ads&action=add&placeid=<?=$value["placeid"]?>">添加广告</a> | <a href="?file=ads&action=manage&expired=&placeid=<?=$value["placeid"]?>">广告列表</a> | <a href="?file=<?=$file?>&action=edit&placeid=<?=$value["placeid"]?>">编辑</a> | <a href="?file=<?=$file?>&action=loadjs&placeid=<?=$value["placeid"]?>">调用代码</a></td>
    </tr>
    <?php }?>
    </table>
    <div class="button_box"><input type="button" value="全选" onClick="checkall()">
  
   <input type="submit"  name="passed2" value="批量锁定"> 
  
   <input type="submit" name="passed1" value="批量解锁"> 
   
   <input type="button" name="delete" value="批量删除" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
  

</div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>