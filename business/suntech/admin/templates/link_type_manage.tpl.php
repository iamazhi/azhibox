<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>�������</caption>
<tr>

      <th width="5%">����</th>
      <th width="5%">ID</th>
      <th width="30%">��������</th>
      <th width="30%">��������</th>
      <th width="20%">�������</th>
</tr>
<?php foreach($tableinfo as $v)
   {
	   $isname=output::style($v['name'], $v['style']);
	   $arrays[$v["menuid"]]=(array("id"=>$v["menuid"],"parentid"=>$v["pid"],"name"=>$v["name"],"listorder"=>$v["listorder"],"description"=>$v["description"],"catid"=>$v["catid"],"is_name"=>$isname)); 
	   
	   }
   
	$strs="<tr>\n
     <td class=align_c><input type=text name=listorders[\$catid] value='\$listorder'\ size=4 /></td>\n
     <td class=align_c>\$id</td>\n
     <td class=align_c>\$is_name</td>\n
     <td class=align_c>\$description</td>\n
     <td class=align_c><a href='?file=link&action=type_edit&catid=\$catid'>�޸�</a> | <a href='?file=link&action=type_del&catid=\$catid&typeid=\$id'>ɾ��</a> </td>\n
    </tr>\n";
	 $tree->tree($arrays);
	 $dd = $tree->get_tree(67,$strs,$typeid);
	 echo $dd;
	?>
</table>

<div class="button_box">  <input type="button" name="listorder" value="��������" onClick="myform.action='?file=<?=$file?>&action=type_list';myform.submit();"> </div>
 
  

</div>
<div id="pages"><?=$a->pages?></div>

</form>
</body>
</html>