<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>会员管理</caption>
  <tr>
  <td>会员模型：<?php foreach($model as $s){?><a href="?file=<?=$file?>&action=<?=$action?>&modelid=<?=$s["modelid"]?>"><?=$s["name"]?></a> <?php } ?></td>
  </tr>
  
  <tr>
  <td>主会员组：<?php foreach($group as $g){?><?php if($g["issystem"]==1){?><a href="?file=<?=$file?>&action=<?=$action?>&groupid=<?=$g["groupid"]?>"><?=$g["name"]?></a> <?php }} ?></td>
  </tr>
  
  <tr>
  <td>扩展会员组：<?php foreach($group as $g){?><?php if($g["issystem"]==2){?><a href="?file=<?=$file?>&action=<?=$action?>&groupid=<?=$g["groupid"]?>"><?=$g["name"]?></a> <?php }} ?></td>
  </tr>
    
</table>
</form>
<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>会员列表</caption>
  <tr >
      <th width="5%">选中</th>
      <th width="10%">用户名 </th>
      <th width="15%">会员组</th>
      <th width="6%">会员模型</th>
      <th width="7%">资金 </th>
      <th width="7%">点数</th>
      <th width="10%">最后登录</th>
      <th width="20%">管理操作</th>
    </tr>
    <?php foreach($info as $value) {?>
    <tr >
    <td class="align_c" ><input type="checkbox" name="userid[]" id="checkbox" value="<?=$value['userid']?>" /></td>
   
    <td class="align_c"><a href="?file=<?=$file?>&action=view&userid=<?=$value["userid"]?>&groupid=<?=$value["groupid"]?>&areaid=<?=$value["areaid"]?>&modelid=<?=$value["modelid"]?>"><?=$value["username"]?></a></td>
    <td class="align_c"><?php $groupname=$a->get($table='member_group',$where="groupid=".$value["groupid"]."");?><?=$groupname["name"]?></td>
    <td class="align_c"><?php $modelid=$a->get($table='model',$where="modelid=".$value["modelid"]."");?><?=$modelid["name"]?></td>
    <td class="align_c"><?=$value["amount"]?></td>
    <td class="align_c"><?=$value["point"]?></td>
    <td class="align_c"><?php $log=$a->get($table='member_info',$where="userid=".$value["userid"]."");?><?=$log["lastlogintime"]==0 ? "" : date("Y-m-d H:i:s",$log["lastlogintime"])?></td>
     <td class="align_c"> <a href="?file=<?=$file?>&action=edit&groupid=<?=$value["groupid"]?>&areaid=<?=$value["areaid"]?>&modelid=<?=$value["modelid"]?>&userid=<?=$value["userid"]?>">修改</a> | <a href="?file=<?=$file?>&action=note&userid=<?=$value["userid"]?>">备注</a> | <?php 
	                                                     if($adminid["adminid"]==$value["username"]) 
	 {?><font color="#999999">禁用</font> | <font color="#999999">删除</font> <?php }else{ ?><?php if($value["disabled"]==1){?><a href="?file=<?=$file?>&action=disabled&disabled=2&userid=<?=$value["userid"]?>">禁用</a><?php }else{?><a href="?file=<?=$file?>&action=disabled&disabled=1&userid=<?=$value["userid"]?>"><font color="#0000FF">启用</font></a><?php }?> | <a href="javascript:confirmurl('?file=<?=$file?>&action=delete&userid=<?=$value["userid"]?>','确定删除吗？')">删除</a> <?php }?></td>
     
    </tr>
    <?php }?>
    </table>
    <div class="button_box"><input type="button" value="全选" onClick="checkall()">
  
   <input type="submit"  name="disabled2" value="批量锁定" onClick="myform.action='?file=<?=$file?>&action=disabled';myform.submit();"> 
  
   <input type="submit" name="disabled1" value="批量解锁" onClick="myform.action='?file=<?=$file?>&action=disabled';myform.submit();"> 
   
   <input type="button" name="delete" value="批量删除" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
  

</div>
<div id="pages"><?=$a->pages?></div>
</form>
<form action="" method="get">
<input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
<caption>会员搜索</caption>
<tr>
  <td class="align_c">会员组：请选择<select name="groups"/>
     <?php foreach($group as $v){?> <option value="<?=$v["groupid"]?>" <?=$v["groupid"]==$groups ? "selected":""?> ><?=$v["name"]?></option><?php }?>
      </select>
      状态：<select name="disabled"/>
      <option value="">不限</option>
      <option value="1" <?=$disabled==1 ?"selected":""?>>正常</option>
      <option value="2" <?=$disabled==2 ?"selected":""?>>锁定</option>
      
      </select>会员名：<input type="text" name="username" value="<?=$username?>"> <input type="submit" name="search" value="搜索">
      </td>
</tr>
</table>

</body>
</html>
