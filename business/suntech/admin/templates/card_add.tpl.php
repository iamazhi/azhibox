<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<table  cellpadding="1" align="center"  cellspacing="1" class="table_list">
<caption>��ѯ�㿨</caption>
<tr>
  <Td><a href="?file=<?=$file?>&action=manage">ȫ���㿨</a> | <a href="?file=<?=$file?>&action=manage&status=1">δʹ�õĵ㿨</a> | <a href="?file=<?=$file?>&action=manage&status=2">��ʹ�õĵ㿨</a> </Td>
</tr>
</table>

<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>���������㿨</caption>
    <tr >
    <th class="align_r" width="20%"><STRONG>�㿨����:</STRONG>
      </td>
    <td class="align_l"><input type="text" name="cardnum" value="100" require="true" datatype="currency|limit" min="1" max="16" msg="���������֣�"> (ֻ��������)  </td>
    </tr>
   <tr >
    <th class="align_r" width="20%"><STRONG>�㿨����:</STRONG>
      </td><td class="align_l"><select name="ptypeid"><? foreach($ptype as $r){?><option value="<?=$r["ptypeid"]?>"><?=$r["name"]?></option><? }?></select></td>
    </tr>
    
    <tr >
    <th class="align_r" width="20%"><STRONG>����ǰ׺:</STRONG>
      </td>
    <td class="align_l"><input type="text" name="prefix" value="<?=date("Y")?>" require="true" datatype="currency|limit" min="1" max="16" msg="���������֣�"> (ֻ��������)</td>
   
    <tr >
      <th class="align_r"><STRONG>���ų���:</STRONG>          
      <td class="align_l"><input type="text" name="carlength" size="10" value="16" require="true" datatype="currency|limit" min="1" max="16" msg="���������֣�"> (ֻ��������)</td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>��Ч��:</STRONG>    
      <td class="align_l"><?=form::date('endtime','','endtime')?>(����Ĭ�Ϲ���ʱ��Ϊ2��)</td>
    </tr>
    <tr >
      <th class="align_r" width="20%"></td>
      <td class="align_l"><input type="submit" name="dosubmit" value=" �����㿨 " /> <input type="reset" name="reset" value=" ���� "></td>
    </tr>
    </table>
</form>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});

</script>
</body>
</html>