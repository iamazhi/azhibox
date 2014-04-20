<?php
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<table cellpadding="0" cellspacing="1" class="table_form">
<caption>搜索留言</caption>
<form method="post" name="search">
  <tr>
    <td>
	&nbsp;<a href="?file=guestbook&action=manage"><b>管理首页</b></a>&nbsp;
	<input name='passed' type='radio' value='1' onClick="location='?file=guestbook&action=manage&passed=1'" <?php if($passed==1) { ?>checked<?php } ?>><a href='?file=guestbook&action=manage&passed=1'>已审核的留言</a>&nbsp;<input name='passed' type='radio' value='0' onClick="location='?file=guestbook&action=manage&passed=0'" <?php if(!$passed) { ?>checked<?php } ?>><a href='?file=guestbook&action=manage&passed=0'>未审核的留言</a>
	关键字：<input name='keyword' type='text' size='20' value='<?=$keyword?>'>&nbsp;
     <input type="radio" name="srchtype" value="0" <?php if(!$srchtype){?>checked<?php }?>> 标题
	<input type="radio" name="srchtype" value="1" <?php if($srchtype==1){?>checked<?php }?>> 内容
	<input type="radio" name="srchtype" value="2" <?php if($srchtype==2){?>checked<?php }?>> 会员
	<input name='submit' type='submit' value='搜索'></td>
  </tr>
</form>
</table>

<form method="post" name="myform">
<table cellpadding="0" cellspacing="1" class="table_list">
<caption>管理留言板</caption>
<tr>
<th>选中</th>
<th>姓名</th>
<th>标题</th>
<th>内容</th>
<th>发表时间</th>
<th>审核</th>
<th>回复</th>
<th>管理操作</th>
</tr>
<?php if(is_array($guestbooks)) foreach($guestbooks AS $guestbook) { ?>
<tr>
<td><input type="checkbox" name="gid[]" value="<?=$guestbook['gid']?>"></td>
<td align="center">
    <?php if($guestbook['userid']) {?>
    <a href="?mod=member&file=member&action=view&userid=<?=$guestbook['userid']?>" target="_blank"><?=$guestbook['username']?></a>
    <?php }else{ ?>
     <?=$guestbook['username']?>
    <?php } ?>
</td>
<td align="left"><a href="<?=$M['url']?>?gid=<?=$guestbook['gid']?>" target="_blank"><?=str_cut($guestbook['title'],20)?></a></td>
<td align="left"><a href="<?=$M['url']?>?gid=<?=$guestbook['gid']?>" target="_blank"><?=str_cut(strip_tags($guestbook['content']),50,'...')?></a></td>
<td class="align_c"><?=$guestbook['addtime']?></td>
<td class="align_c"><?php if($guestbook['passed']) { ?>√<? } else { ?><font color="red">×</font><?php } ?></td>
<td class="align_c"><?php if($guestbook['reply']) { ?>√<? } else { ?><font color="red">×</font><?php } ?></td>
<td class="align_c"><a href='?file=guestbook&action=reply&gid=<?=$guestbook['gid']?>'>回复</a> | <a href='?file=guestbook&ip=<?=$guestbook['ip']?>' title="IP：<?=$guestbook['ip']?> - <?=$guestbook['gip']?>
点击查看来自该ip的所有留言"> IP </a> | <? if($guestbook['passed']) { ?><a href='?file=guestbook&action=pass&passed=0&gid=<?=$guestbook['gid']?>'>取消</a><? } else { ?><a href='?file=guestbook&action=pass&passed=1&gid=<?=$guestbook['gid']?>'>批准</a> <? } ?>| <a href='###' onClick="javascript:confirmurl('?file=guestbook&action=delete&gid=<?=$guestbook['gid']?>','确认删除<?=$guestbook['title']?>吗？')">删除</a></td>
</tr>
<?php } ?>
</table>

<div class="button_box">
		<a href="#" onClick="javascript:$('input[type=checkbox]').attr('checked', true)">全选</a>/<a href="#" onClick="javascript:$('input[type=checkbox]').attr('checked', false)">取消</a>
        <?php if($passed == 0) {?><input name='submit2' type='submit' value='批准选定的留言' onClick="document.myform.action='?file=guestbook&action=pass&passed=1'">&nbsp;&nbsp;<?php }?>
        <?php if($passed == 1) {?><input name='submit3' type='submit' value='取消批准选定的留言' onClick="document.myform.action='?file=guestbook&action=pass&passed=0'">&nbsp;&nbsp;<?php }?>
		<input name="submit1" type="submit"  value="删除选定的留言" onClick="document.myform.action='?file=guestbook&action=delete';return confirm('您确定要删除吗？')">&nbsp;&nbsp;
</div>
</form>

<div id="pages"><?=$g->pages?></div>

</body>
</html>