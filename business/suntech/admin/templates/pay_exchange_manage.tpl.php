<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>查询交易记录</caption>
<tr>
  <th class="align_c" width="8%">用户名</th>
  <th class="align_c" width="5%">模块</th>
  <th class="align_c" width="5%">交易类型</th>
  <th class="align_c" width="10%">交易时间</th>
  <th class="align_c" width="8%">交易数量</th>
  <th class="align_c" width="8%">操作者</th>
  <th class="align_c" width="5%">操作</th>
</tr>
 <tr>
   <td class="align_c"><input type="text" name="username" size="15" value="<?=$_GET["username"]?>"></td>
   <td class="align_c"><select name="module">
                       <option value="">请选择</option>
                       <option value="pay" <?=$module=="pay" ? "selected" :"" ?> >支付</option>
                       </select></td>
   <td class="align_c"><select name="type">
                       <option value="">请选择</option>
                       <option value="point"  <?=$type=="point" ? "selected" :"" ?>>点数</option>
                       <option value="amount" <?=$type=="amount" ? "selected" :"" ?>>资金</option>
                       </select></td>
   <td class="align_c"><?=form::date('begindate')?> - <?=form::date('enddate')?></td>
   <td class="align_c"><input type="text" name="num1" size="10" value="<?=$num1?>">-<input type="text" name="num2" size="10" value="<?=$num2?>"></td>
   <td class="align_c"><input type="text" name="inputer" size="15" value="<?=$inputer?>"></td>
   <td class="align_c"><input type="submit" value="搜索"></td>
 </tr>
    
</table>
</form>
<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>财务列表</caption>
  <tr >
      <th width="5%">全选</th>
      <th width="7%">用户名</th>
      <th width="7%">交易模块</th>
      <th width="7%">交易类型</th>
      <th width="5%">数量</th>
      <th width="5%">余额</th>
      <th width="7%">操作者</th>
      <th width="10%">交易时间</th>
      <th width="10%">交易地址</th>
      <th width="10%">说明</th>
    </tr>
    <?php foreach($info['info'] as $v) {?>
    <tr >
    <td class="align_c" ><input type="checkbox" name="ids[]" id="checkbox"value="<?=$v['id']?>" /></td>
   
    <td class="align_c"><?=$v["username"]?></td>
    <td class="align_c"></td>
    <td class="align_c"><?=$v["type"]=="amount" ? "资金" : "点数"?></td>
    <td class="align_c"><?=$v["number"]?></td>
    <td class="align_c"><?=$v["blance"]?></td>
    <td class="align_c"><?=$v["inputer"]?></td>
    <td class="align_c"><?=$v["time"]?></td>
    <td class="align_c"><?=$v["ip"]?></td>
    <td class="align_c"><?=$v["note"]?></td>
    </tr>
    <?php }?>
    </table>
    <table cellpadding="1" align="center" cellspacing="1" class="table_list">
    <tr>
    <th class="align_c">点数</th>
     <th class="align_c">资金</th> 
    </tr>
    <tr>
      <td class="align_c"><font color="#FF0000"><?=$info['point']?></font></td>
      <td class="align_c"><font color="#FF0000"><?=$info['amount']?></font></td>
    </tr>
    </table>
    <div class="button_box"><input type="button" value="全选" onClick="checkall()">
   <input type="button" name="delete" value="批量删除" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
   </div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>