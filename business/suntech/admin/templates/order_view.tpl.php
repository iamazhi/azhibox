<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

    
<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
		<tr>
           <td width="50%" valign="top" bgcolor="#FFFFFF">
    <table cellpadding="0" cellspacing="1" class="table_list">
      <caption>������Ϣ</caption>
		<tr>
           <td width="20%" class="align_r">����ID��</td>
           <td><?=$info["orderid"]?></td>            
        </tr>
        <tr>
          <td class="align_r">��Ʒ��</td>
          <td><a href="<?=$info["goodsurl"]?>" target="_blank"><?=$info["goodsname"]?></a></td>
        </tr>
        <tr>
          <td class="align_r">���ۣ�</td>
          <td><?=$info["amount"]?>Ԫ/<?=$info["unit"]?></td>
        </tr>
        <tr>
          <td class="align_r">������</td>
          <td><?=$info["number"]?>��</td>
        </tr>
        <tr>
          <td class="align_r">�˷ѣ�</td>
          <td><?=$info["carriage"]?>Ԫ</td>
        </tr>
		<tr>
          <td class="align_r">�����</td>
          <td><span style="color:red;font-weight:bold">��<?=$info["amount"]?>Ԫ</span></td>
        </tr>
        <tr>
          <td class="align_r">�µ�ʱ�䣺</td>
          <td><?=date("Y-m-d H:i:s",$info["time"])?></td>
        </tr>
	</table>
		   </td>
           <td valign="top" bgcolor="#FFFFFF">
    <table cellpadding="0" cellspacing="1" class="table_list">
      <caption>�ջ���Ϣ</caption>
		<tr>
           <td class="align_r" width="20%">�ջ��ˣ�</th>
           <td><?=$info["consignee"]?></td>            
        </tr>
        <tr>
          <td class="align_r">����</td>
          <td><? $r=$a->get($table="area",$where="areaid='$info[areaid]'");echo $r["name"]?></td>
        </tr>
        <tr>
          <td class="align_r">�绰��</td>
          <td><?=$info["telephone"]?></td>
        </tr>
        <tr>
          <td class="align_r">�ֻ���</td>
          <td><?=$info["mobile"]?></td>
        </tr>
        <tr>
          <td class="align_r">��ַ��</td>
          <td><?=$info["address"]?></td>
        </tr>
        <tr>
          <td class="align_r">�ʱࣺ</td>
          <td><?=$info["postcode"]?></td>
        </tr>
        <tr>
          <td class="align_r">���ԣ�</td>
          <td><?=$info["note"]?></td>
        </tr>
	</table>
    
		   </td>            
        </tr>
	</table>
<table cellpadding="0" cellspacing="1" class="table_list" align="center">
  <caption>���������¼</caption>
  <tr>
	<th width="120">����ʱ��</th>
	<th width="120">����״̬</th>
    <th>��ע</th>
    <th width="80">������</th>
    <th width="100">IP</th>
 </tr>
 <? foreach($infos as $v) {?>
<tr>
  <td class="align_c"><?=date("Y-m-d H:i:s",$v["time"])?></td>
  <td class="align_c"><?=$status[$v['laststatus']]?>=><?=$status[$v['status']]?></td>
  <td><?=$v["note"]?></td>
  <td class="align_c"><a href="?file=member&action=view&userid=<?=$user["userid"]?>&groupid=<?=$user["groupid"]?>&areaid=<?=$user["areaid"]?>&modelid=<?=$user["modelid"]?>"><?=$v["username"]?></a></td>
  <td class="align_c"><?=$v["ip"]?></td>
</tr>
<? }?>
</table>
</body>
</html>