<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>
<?php ?>
<form action="?file=lottery&action=add" method="post">
  <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption class="align_c">开奖号码</caption>
    <tr>
      <th class="align_c">期号</th>
      <th class="align_c">万位</th>
      <th class="align_c">千位</th>
      <th class="align_c">百位</th>
      <th class="align_c">十位</th>
      <th class="align_c">个位</th>
      <th class="align_c">录入时间</th>
      <th class="align_c">开奖时间</th>
      <th class="align_c">操作</th>
    </tr>
    
    <tr>
       <td class="align_c"><input type="text" name="info[lottery_num]"></td>
       <td width="5%" class="align_c"><input name="info[num_info1]"type="text" size="1"></td>
       <td width="5%" class="align_c"><input name="info[num_info2]"type="text" size="1"></td>
       <td width="5%" class="align_c"><input name="info[num_info3]"type="text" size="1"></td>
       <td width="5%" class="align_c"><input name="info[num_info4]"type="text" size="1"></td>
       <td class="align_c"><input type="text" name="info[num_info5]"size="1"></td>
       <td class="align_c"><input type="text" name="info[kjtime]" value="<?=date("Y-m-d H:i:s")?>"size="20"></td>
       <td class="align_c"> <input type="text" name="info[addtime]" value="<?=date("Y-m-d H:i:s")?>"size="20"></td>
       <td class="align_c"><input type="submit" value="添加"></td>
    </tr>
  </table>
</form>

 <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption class="align_c">信息管理</caption>
    <tr>
    <th width="5%" >ID</th>
      <th width="15%">期号</th>
      <th width="5%" >万位</th>
      <th  width="5%">千位</th>
      <th  width="5%">百位</th>
      <th  width="5%">十位</th>
      <th  width="5%">个位</th>
      <th width="15%">录入时间</th>
      <th width="15%">开奖时间</th>
      <th width="10%">操作</th>
    </tr>
    <? foreach($info as $v){?>
    <form name="myform" method="post" action="?file=lottery&action=edit" >
    <tr>
    <Td><input name="id" type="text" value="<?=$v["id"]?>"size="2" /></Td>
      <td class="align_c" ><input type="text" name="info[lottery_num]" size="20" value="<?=$v["lottery_num"]?>"></td>
      <td class="align_c" ><input type="text" name="info[num_info1]"size="1" value="<?=$v["num_info1"]?>"></td>
      <td class="align_c" ><input type="text" name="info[num_info2]"size="1" value="<?=$v["num_info2"]?>"></td>
      <td class="align_c" ><input type="text" name="info[num_info3]"size="1" value="<?=$v["num_info3"]?>"></td>
      <td class="align_c" ><input type="text" name="info[num_info4]"size="1" value="<?=$v["num_info4"]?>"></td>
      <td class="align_c"><input type="text" name="info[num_info5]" size="1" value="<?=$v["num_info5"]?>"></td>
      <td class="align_c"><input type="text" name="info[kjtime]" size="20" value="<?=$v["kjtime"]?>"></td>
      <td class="align_c"><input type="text" name="info[addtime]" size="20" value="<?=$v["addtime"]?>"></td>
      <td class="align_c"><input name="modify" type="submit" value="修改"/> | <a href="?file=lottery&action=delete&id=<?=$v["id"]?>">删除</a> </td>
    </tr>
    </form>
    <? }?>
  </table>
  
<div id="pages"><?=$a->pages?></div>


</body>
</html>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});
</script>