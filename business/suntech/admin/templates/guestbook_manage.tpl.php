<?php
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<table cellpadding="0" cellspacing="1" class="table_form">
<caption>��������</caption>
<form method="post" name="search">
  <tr>
    <td>
	&nbsp;<a href="?file=guestbook&action=manage"><b>������ҳ</b></a>&nbsp;
	<input name='passed' type='radio' value='1' onClick="location='?file=guestbook&action=manage&passed=1'" <?php if($passed==1) { ?>checked<?php } ?>><a href='?file=guestbook&action=manage&passed=1'>����˵�����</a>&nbsp;<input name='passed' type='radio' value='0' onClick="location='?file=guestbook&action=manage&passed=0'" <?php if(!$passed) { ?>checked<?php } ?>><a href='?file=guestbook&action=manage&passed=0'>δ��˵�����</a>
	�ؼ��֣�<input name='keyword' type='text' size='20' value='<?=$keyword?>'>&nbsp;
     <input type="radio" name="srchtype" value="0" <?php if(!$srchtype){?>checked<?php }?>> ����
	<input type="radio" name="srchtype" value="1" <?php if($srchtype==1){?>checked<?php }?>> ����
	<input type="radio" name="srchtype" value="2" <?php if($srchtype==2){?>checked<?php }?>> ��Ա
	<input name='submit' type='submit' value='����'></td>
  </tr>
</form>
</table>

<form method="post" name="myform">
<table cellpadding="0" cellspacing="1" class="table_list">
<caption>�������԰�</caption>
<tr>
<th>ѡ��</th>
<th>����</th>
<th>����</th>
<th>����</th>
<th>����ʱ��</th>
<th>���</th>
<th>�ظ�</th>
<th>�������</th>
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
<td class="align_c"><?php if($guestbook['passed']) { ?>��<? } else { ?><font color="red">��</font><?php } ?></td>
<td class="align_c"><?php if($guestbook['reply']) { ?>��<? } else { ?><font color="red">��</font><?php } ?></td>
<td class="align_c"><a href='?file=guestbook&action=reply&gid=<?=$guestbook['gid']?>'>�ظ�</a> | <a href='?file=guestbook&ip=<?=$guestbook['ip']?>' title="IP��<?=$guestbook['ip']?> - <?=$guestbook['gip']?>
����鿴���Ը�ip����������"> IP </a> | <? if($guestbook['passed']) { ?><a href='?file=guestbook&action=pass&passed=0&gid=<?=$guestbook['gid']?>'>ȡ��</a><? } else { ?><a href='?file=guestbook&action=pass&passed=1&gid=<?=$guestbook['gid']?>'>��׼</a> <? } ?>| <a href='###' onClick="javascript:confirmurl('?file=guestbook&action=delete&gid=<?=$guestbook['gid']?>','ȷ��ɾ��<?=$guestbook['title']?>��')">ɾ��</a></td>
</tr>
<?php } ?>
</table>

<div class="button_box">
		<a href="#" onClick="javascript:$('input[type=checkbox]').attr('checked', true)">ȫѡ</a>/<a href="#" onClick="javascript:$('input[type=checkbox]').attr('checked', false)">ȡ��</a>
        <?php if($passed == 0) {?><input name='submit2' type='submit' value='��׼ѡ��������' onClick="document.myform.action='?file=guestbook&action=pass&passed=1'">&nbsp;&nbsp;<?php }?>
        <?php if($passed == 1) {?><input name='submit3' type='submit' value='ȡ����׼ѡ��������' onClick="document.myform.action='?file=guestbook&action=pass&passed=0'">&nbsp;&nbsp;<?php }?>
		<input name="submit1" type="submit"  value="ɾ��ѡ��������" onClick="document.myform.action='?file=guestbook&action=delete';return confirm('��ȷ��Ҫɾ����')">&nbsp;&nbsp;
</div>
</form>

<div id="pages"><?=$g->pages?></div>

</body>
</html>