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
			$("#chkall").val("ȡ��ȫѡ");
		}else
		{
			$("#chkall").val("ȫѡ");
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
		alert("��ѡ��Ҫ�����Ķ���");
		return false;
	}
	var msg = "��ȷ��Ҫ������!";
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
  <caption>��������</caption>
  <tr>
    <td>
	&nbsp;<input name='status' type='radio' onclick="location='?file=comment&action=manage'" <? if($status == '') { ?>checked<? } ?>>&nbsp;<a href="?file=comment&action=manage">��������</a>&nbsp;
	<input name='status' type='radio' value='1' onclick="location='?file=comment&action=manage&status=1'" <? if($status == '1') { ?>checked<? } ?>>
	<a href='?mod=comment&file=comment&action=manage&status=1'>����˵�����</a>&nbsp;
	<input name='status' type='radio' value='0' onclick="location='?file=comment&action=manage&status=0'" <? if($status == '0') { ?>checked<? } ?>>
	<a href='?mod=comment&file=comment&action=manage&status=0'>δ��˵�����</a>&nbsp;
	�ؼ��֣�<input name='keywords' type='text' size='20' value='<?=$keywords?>'>&nbsp;
	<select name="timeid" id="srchfrom">
	<option value="0">ʱ���</option>
	<option value="1" <? if($timeid=='1') { ?>selected<? } ?>>1 ����</option>
	<option value="2" <? if($timeid==2) { ?>selected<? } ?>>2 ����</option>
	<option value="3" <? if($timeid==3) { ?>selected<? } ?>>3 ����</option>
	<option value="7" <? if($timeid==7) { ?>selected<? } ?>>1 ����</option>
	<option value="14" <? if($timeid==14) { ?>selected<? } ?>>2 ����</option>
	<option value="30" <? if($timeid==30) { ?>selected<? } ?>>1 ����</option>
	<option value="60" <? if($timeid==60) { ?>selected<? } ?>>2 ����</option>
	<option value="90" <? if($timeid==90) { ?>selected<? } ?>>3 ����</option>
	<option value="180" <? if($timeid==180) { ?>selected<? } ?>>6 ����</option>
	<option value="365" <? if($timeid==365) { ?>selected<? } ?>>1 ����</option>
	</select>
	<input name='submit' type='submit' value='����'>
    </td>
  </tr>
  </form>
  </table>

<form action="" method="post" name="thisform" id="thisform" onsubmit="return del_customer();">
 <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption class="align_c">���۹���</caption>
    <tr>
      <th width="33">ѡ��</th>
      <th width="100">�û���</th>
      <th width="500">����</th>
      <th width="60">֧����</th>
      <th width="60">������</th>
      <th width="90">����ʱ��</th>
      <th width="100">�������</th>
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
	  <a href="" title="<?=$comment['ip']?>">IP</a> | <a href="<?=$comment['url']?>" target='_blank' title="��������������">ԭ��</a> | <a href='?file=comment&action=manage&keyid=<?=$comment['keyid']?>' title="�����������������ͬ������">�������</a>
	</td>
    </tr>
<?php }?>
  </table>
<div class="button_box">
	<input name='chkall' type='button' id='chkall' onclick="javascript:CheckedRev();" value="ȫѡ"></td>&nbsp;
	<?php if($status == 1){ ?>
 		<input name="submit1" type="submit"  value="ɾ��ѡ��������" onClick="document.thisform.action='?file=comment&action=delete'"/>&nbsp;
	<?php }elseif($status == 0){ ?>
		<input name="submit1" type="submit"  value="ɾ��ѡ��������" onClick="document.thisform.action='?file=comment&action=delete'"/>&nbsp;
		<input name="submit1" type="submit"  value="���ѡ��������" onClick="document.thisform.action='?file=comment&action=pass&status=1'"/>&nbsp;
	<?php } ?>
</div>
</form>
<div id="pages"><?=$pages?></div>
</body>
</html>