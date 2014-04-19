<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>广告位查询</caption>
  <tr>
  <th>广告位</th>
  <th>广告状态</th>
  <th>审核状态</th>
  <th>客户状态</th>
  <th>客户名</th>
  <th>操作</th>
  </tr>
<tr>
<td width="15%" class="align_c">选择广告位<select name="placeid" id="placeid" onChange="location='?file=<?=$file?>&action=<?=$action?>&expired=<?=$expired?>&placeid='+this.value">                                            <option value="">选择广告位</option>
<? foreach($into as $v) {?><option value="<?=$v["placeid"]?>" <?=$v["placeid"]==$placeid ? "selected" :""?>><?=$v["placename"]?></option><? }?></select></td>
  <td class="align_c">
  <input name="expired" type="radio" id="3_0" onClick="location='?file=<?=$file?>&action=<?=$action?>&placeid=<?=$placeid?>&expired=3'" value="3" <?=$expired==3 ? "checked":""?>>
  等待广告列表
<input name="expired" type="radio" value="1" id="3_1" onClick="location='?file=<?=$file?>&action=<?=$action?>&placeid=<?=$placeid?>&expired=1'" <?=$expired==1 ? "checked": !$expired ?"checked" :""?>>
  正常广告列表
  <input name="expired" type="radio" value="2" id="3_2" onClick="location='?file=<?=$file?>&action=<?=$action?>&placeid=<?=$placeid?>&expired=2'" <?=$expired==2 ? "checked":""?>>过期广告列表
  </td>
  <td class="align_c">
  <input name="passed" type="radio" value="1" id="4_0" <?=$passed==1 ? "checked" :""?>>审核
  <input name="passed" type="radio" value="2" id="4_1" <?=$passed==2 ? "checked" :""?>>未审核
  </td>
  
  <td class="align_c">
 
  <input name="status" type="radio" value="1" id="1_0" <?=$status==1 ? "checked" :""?>>正常
  <input name="status" type="radio" value="2" id="1_1" <?=$status==2 ? "checked" :""?>>关闭                                
       
         
   <td>     
<input name="name" type="text" value="<?=$name?>"></td>
<td><input type="submit" name="dosubmit" value="搜索" /></td>
           
      </td>
</tr>
    
</table>
</form>
<form name="myform" action="?file=<?=$file?>&action=passed" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>管理广告位</caption>
  <tr >
      <th width="5%">选中</th>
      <th width="15%">广告位名称</th>
      <th width="15%">所属广告位</th>
      <th width="6%">当前客户</th>
      <th width="7%">起始日期</th>
      <th width="7%">结束日期</th>
      <th width="7%">审核</th>
      <th width="10%">客户状态</th>
      <th width="10%">管理操作</th>
    </tr>
    <?php foreach($info as $value) {?>
    <tr >
    <td class="align_c" ><input type="checkbox" name="adsid[]" id="checkbox" value="<?=$value['adsid']?>" /></td>
   
    <td class="align_c"><?=$value["adsname"]?></td>
    <td class="align_c"><? $placename=$a->get($table='ads_place',$where="placeid=".$value["placeid"]."");?><?=$placename["placename"]?></td>
    <td class="align_c"><?=$value["username"]?></td>
    <td class="align_c"><?=date("Y.m.d",$value["fromdate"])?></td>
    <td class="align_c"><?=date("Y.m.d",$value["todate"])?></td>
    <td class="align_c"><?=$value["passed"]==1 ? "<font color=grenn>审核</font>" :"<font color=red>未通过</font>"?></td>
    <td class="align_c"><?=$value["status"]==1 ? "<font color=grenn>开启</font>" :"<font color=red>关闭</font>"?></td>
     <td class="align_c"> <a href="?file=<?=$file?>&action=edit&adsid=<?=$value["adsid"]?>&placeid=<?=$value["placeid"]?>">修改</a> </td>
     
    </tr>
    <?php }?>
    </table>
    <div class="button_box"><input type="button" value="全选" onClick="checkall()">
  
   <input type="submit"  name="passed2" value="批量审核取消"> 
  
   <input type="submit" name="passed1" value="批量审核通过"> 
   
   <input type="button" name="delete" value="批量删除" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
  

</div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>