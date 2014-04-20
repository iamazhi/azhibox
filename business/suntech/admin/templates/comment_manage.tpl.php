<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<script type="text/javascript" language="JavaScript" >
function CheckedRev(){
	var arr = $(':checkbox');
	for(var i=0;i<arr.length;i++)
	{
		if (arr[i].checked = ! arr[i].checked)
		{
			$("#chkall").val("取消全选");
		}else
		{
			$("#chkall").val("全选");
		}
	}
}
function del_customer()
{
	var mycoler = document.getElementsByName("cid[]");
	var flag = false;
	for(var i = 0; i< mycoler.length ;i++){
		if(mycoler[i].checked){
			flag = true;
			break;
		}
	}
	if(!flag){
		alert("请选择要操作的对象");
		return false;
	}
	var msg = "你确定要操作吗!";
	if(! window.confirm(msg)){
		return false;
	}
	document.getElementsByName("thisForm").submit();
}
</script>
<body>
<?php ?>

  <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
<form method="get" action="?">
<input name="file" type="hidden" value="comment">
<input name="action" type="hidden" value="manage">
  <caption>搜索评论</caption>
  <tr>
    <td>
	&nbsp;<input name='status' type='radio' onclick="location='?file=comment&action=manage'" <? if($status == '') { ?>checked<? } ?>>&nbsp;<a href="?file=comment&action=manage">所有评论</a>&nbsp;
	<input name='status' type='radio' value='1' onclick="location='?file=comment&action=manage&status=1'" <? if($status == '1') { ?>checked<? } ?>>
	<a href='?mod=comment&file=comment&action=manage&status=1'>已审核的评论</a>&nbsp;
	<input name='status' type='radio' value='0' onclick="location='?file=comment&action=manage&status=0'" <? if($status == '0') { ?>checked<? } ?>>
	<a href='?mod=comment&file=comment&action=manage&status=0'>未审核的评论</a>&nbsp;
	关键字：<input name='keywords' type='text' size='20' value='<?=$keywords?>'>&nbsp;
	<select name="timeid" id="srchfrom">
	<option value="0">时间段</option>
	<option value="1" <? if($timeid=='1') { ?>selected<? } ?>>1 天内</option>
	<option value="2" <? if($timeid==2) { ?>selected<? } ?>>2 天内</option>
	<option value="3" <? if($timeid==3) { ?>selected<? } ?>>3 天内</option>
	<option value="7" <? if($timeid==7) { ?>selected<? } ?>>1 周内</option>
	<option value="14" <? if($timeid==14) { ?>selected<? } ?>>2 周内</option>
	<option value="30" <? if($timeid==30) { ?>selected<? } ?>>1 月内</option>
	<option value="60" <? if($timeid==60) { ?>selected<? } ?>>2 月内</option>
	<option value="90" <? if($timeid==90) { ?>selected<? } ?>>3 月内</option>
	<option value="180" <? if($timeid==180) { ?>selected<? } ?>>6 月内</option>
	<option value="365" <? if($timeid==365) { ?>selected<? } ?>>1 年内</option>
	</select>
	<input name='submit' type='submit' value='搜索'>
    </td>
  </tr>
  </form>
  </table>

<form action="" method="post" name="thisform" id="thisform" onsubmit="return del_customer();">
 <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption class="align_c">评论管理</caption>
    <tr>
      <th width="33">选中</th>
      <th width="100">用户名</th>
      <th width="500">内容</th>
      <th width="60">支持数</th>
      <th width="60">反对数</th>
      <th width="90">评论时间</th>
      <th width="100">管理操作</th>
    </tr>
  <?php
foreach($comments['info'] AS $comment)
{
?>
    <tr>
      <td class="align_c"><input type="checkbox" name="cid[]"  id="cid" value="<?=$comment['commentid']?>"></td>
      <td class="align_c"><? if($comment['userid']) {?><a><?=$comment['username']?></a><?}else{?> <?=$comment['username']?><?}?></td>
      <td class="align_l"><?=$comment['content']?></td>
      <td class="align_c"><?=$comment['support']?></td>
      <td class="align_c"><?=$comment['against']?></td>
      <td class="align_c" title="<?=$comment['addtime']?>"><?=$comment['addtime']?></td>
      <td class="align_c">
	  <a href="" title="<?=$comment['ip']?>">IP</a> | <a href="<?=$comment['url']?>" target='_blank' title="该评论所属文章">原文</a> | <a href='?file=comment&action=manage&keyid=<?=$comment['keyid']?>' title="与该评论所属文章相同的评论">相关评论</a>
	</td>
    </tr>
<?php }?>
  </table>
<div class="button_box">
	<input name='chkall' type='button' id='chkall' onclick="javascript:CheckedRev();" value="全选"></td>&nbsp;
	<?php if($status == 1){ ?>
 		<input name="submit1" type="submit"  value="删除选定的评论" onClick="document.thisform.action='?file=comment&action=delete'"/>&nbsp;
	<?php }elseif($status == 0){ ?>
		<input name="submit1" type="submit"  value="删除选定的评论" onClick="document.thisform.action='?file=comment&action=delete'"/>&nbsp;
		<input name="submit1" type="submit"  value="审核选定的评论" onClick="document.thisform.action='?file=comment&action=pass&status=1'"/>&nbsp;
	<?php } ?>
</div>
</form>
<div id="pages"><?=$pages?></div>
</body>
</html>