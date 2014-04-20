<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<body>
<?php if(isset($modelid)){?>
<form name="search" method="get" action="">
<input type="hidden" name="file" value="<?=$file?>"> 
<input type="hidden" name="action" value="<?=$action?>"> 
<input type="hidden" name="catid" value="<?=$catid?>">
<input type="hidden" name="modelid" value="<?=$modelid?>">
<?=$menu?>



  <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption class="align_c">信息查询</caption>
    <tr>
      <td class="align_c">
      <select name='field'>
      <option value='title' <?=$field == 'title' ? 'selected' : ''?> >标题</option>
      <option value='username' <?=$field == 'username' ? 'selected' : ''?> >用户名</option>
      <option value='userid' <?=$field == 'userid' ? 'selected' : ''?> >用户ID</option>
      <option value='contentid' <?=$field == 'contentid' ? 'selected' : ''?> >ID</option>
      </select>
      <input type="text" name="q" value="<?=$q?>" size="15" />&nbsp;
发布时间：<?=form::date($name='inputdate_start')?> - <?=form::date($name='inputdate_end')?>&nbsp;
<input type="submit" name="dosubmit" value=" 查询 " /></td>
    </tr>
  </table>
</form>

<form action="" method="post" name="myform">
 <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption class="align_c">信息管理</caption>
    <tr>
      <th width="33">选中</th>
      <th width="39">排序</th>
      <th width="32">ID</th>
      <th width="40%">标题</th>
      <th width="62">点击量</th>
      <th width="55">发布人</th>
      <th width="15%">更新时间</th>
      <th width="20%">管理操作</th>
    </tr>
    
    
    
    <?php foreach($info as $value){ $r = $c->get_count($value['contentid']);?>
    <tr>
      <td class="align_c"><input type="checkbox" name="contentid[]" value="<?=$value['contentid']?>" id="content_<?=$info['contentid']?>" /></td>
      <td class='align_c'><input type="text" name="listorders[<?=$value['contentid']?>]" value="<?=$value['listorder']?>" size="4" /></td>
      <td class="align_l"><?=$value["contentid"]?></td>
      <td class="align_l"><?=output::style($value['title'], $value['style'])?> <? if($value["posids"]==1){ $posid=$a->get("content_position a, ".DB_PRE."position b","a.contentid=".$value["contentid"]." AND a.posid=b.posid"); echo "<font color='red'>[".$posid["name"]."]</font>"; }?></td>
      <td class="align_c" title="总点击量：<?=$r['hits']?>&#10;今日点击：<?=$r['hits_day']?>&#10;本周点击：<?=$r['hits_week']?>&#10;本月点击：<?=$r['hits_month']?>"><?=$r['hits']?></td>
      <td class="align_c"><?=$value["username"]?></td>
      <td class="align_c"><?=date("Y-m-d H:i:s",$value["updatetime"])?></td>
      <td class="align_c"><a href="?file=content&action=view&contentid=<?=$value["contentid"]?>&modelid=<?=$value["modelid"]?>">查看</a> | <a href="?file=content&action=edit&catid=<?=$value["catid"]?>&modelid=<?=$value["modelid"]?>&contentid=<?=$value["contentid"]?>">修改</a> | 日志 </td>
    </tr>
    <?php }?>
    
    
  </table>
  <div class="button_box"><span style="width:60px"><a href="###" onClick="javascript:$('input[type=checkbox]').attr('checked', true)">全选</a>/<a href="###" onClick="javascript:$('input[type=checkbox]').attr('checked', false)">取消</a></span>
   <input type="button" name="listorder" value=" 排序 " onClick="myform.action='?file=<?=$file?>&action=listorder&contentid=<?=$info["contentid"]?>';myform.submit();"> 

   		<input type="button" name="delete" value=" 删除 " onClick="myform.action='?file=<?=$file?>&action=delete&contentid=<?=$info["contentid"]?>&modelid=<?=$_GET["modelid"]?>';myform.submit();"> 

</div>
<div id="pages"><?=$c->pages?></div>
</form>
<?php }?>


</body>
</html>
