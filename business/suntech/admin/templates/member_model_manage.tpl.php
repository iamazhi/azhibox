<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>


<form name="myform" action="?file=<?=$file?>&action=passed" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>��Աģ�͹���</caption>
  <tr >
      <th width="10%">ģ������</th>
      <th width="15%">ģ������</th>
      <th width="18%">���ݱ�</th>
      <th width="5%">��Ա��</th>
      <th width="5%">״̬</th>
      <th width="20%">�������</th>
    </tr>
    <?php foreach($info as $value) {?>
    <tr >
    <td class="align_c" ><strong><?=$value["name"]?></strong></td>
   
    <td class="align_c"><?=$value["description"]?></td>
    <td class="align_c"><?=DB_PRE."memeber_".$value["tablename"]?></td>
    <td class="align_c"><? $r=$db->get_one("SELECT count(*) AS number FROM ".DB_PRE."member where modelid=".$value["modelid"]."");
	                       $number = $r['number'];echo "<strong>$number</strong>";?></td>
    <td class="align_c"><?=($info['disabled']==1)?'':'<font color="red">��</font>'?></td>
    <td class="align_c"><a href="?file=member_model_field&action=manage&modelid=<?=$value["modelid"]?>">�ֶι���</a> | <? if($value["disabled"]==1){?><a href="?file=<?=$file?>&action=edit&modelid=<?=$value["modelid"]?>">�޸�</a> | <a href="?file=<?=$file?>&action=disabled&disabled=2&modelid=<?=$value["modelid"]?>">����</a><? }else{?><a href="?file=<?=$file?>&action=edit&modelid=<?=$value["modelid"]?>">�޸�</a> | <a href="?file=<?=$file?>&action=disabled&disabled=1&modelid=<?=$value["modelid"]?>"><font color="#0000FF">����</font></a><? }?> | <?php if($value['tablename'] == 'detail') { ?>
	<font color="#cccccc">ɾ��</font>
	<?php } else { ?> <a href="?file=<?=$file?>&action=delete&modelid=<?=$value["modelid"]?>">ɾ��</a> <? }?></td>
    </tr>
    <?php }?>
    </table>
</form>
<table cellpadding="0" align="center" cellspacing="1" class="table_list">
	<caption>��ʾ��Ϣ</caption>
	<tr>
		<td>
		1�������ɾ��ģ�ͣ���ģ������ڻ�Աʱ���Ƚ���ģ����Ļ�Ա����������Աģ���С�<br />
		2���ƶ�ģ�ͻ�Ա�������ԭ��ģ����Ļ�Ա��Ϣɾ�����������޸���
		</td>
	</tr>
</table>

</body>
</html>
