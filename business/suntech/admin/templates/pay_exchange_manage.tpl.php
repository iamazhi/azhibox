<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>

 <form name="form" action="" method="get">
 <input name="file" type="hidden" value="<?=$file?>"><input name="action" type="hidden" value="<?=$action?>">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>��ѯ���׼�¼</caption>
<tr>
  <th class="align_c" width="8%">�û���</th>
  <th class="align_c" width="5%">ģ��</th>
  <th class="align_c" width="5%">��������</th>
  <th class="align_c" width="10%">����ʱ��</th>
  <th class="align_c" width="8%">��������</th>
  <th class="align_c" width="8%">������</th>
  <th class="align_c" width="5%">����</th>
</tr>
 <tr>
   <td class="align_c"><input type="text" name="username" size="15" value="<?=$_GET["username"]?>"></td>
   <td class="align_c"><select name="module">
                       <option value="">��ѡ��</option>
                       <option value="pay" <?=$module=="pay" ? "selected" :"" ?> >֧��</option>
                       </select></td>
   <td class="align_c"><select name="type">
                       <option value="">��ѡ��</option>
                       <option value="point"  <?=$type=="point" ? "selected" :"" ?>>����</option>
                       <option value="amount" <?=$type=="amount" ? "selected" :"" ?>>�ʽ�</option>
                       </select></td>
   <td class="align_c"><?=form::date('begindate')?> - <?=form::date('enddate')?></td>
   <td class="align_c"><input type="text" name="num1" size="10" value="<?=$num1?>">-<input type="text" name="num2" size="10" value="<?=$num2?>"></td>
   <td class="align_c"><input type="text" name="inputer" size="15" value="<?=$inputer?>"></td>
   <td class="align_c"><input type="submit" value="����"></td>
 </tr>
    
</table>
</form>
<form name="myform" action="" method="post">
<table cellpadding="1" align="center" cellspacing="1" class="table_list">
  <caption>�����б�</caption>
  <tr >
      <th width="5%">ȫѡ</th>
      <th width="7%">�û���</th>
      <th width="7%">����ģ��</th>
      <th width="7%">��������</th>
      <th width="5%">����</th>
      <th width="5%">���</th>
      <th width="7%">������</th>
      <th width="10%">����ʱ��</th>
      <th width="10%">���׵�ַ</th>
      <th width="10%">˵��</th>
    </tr>
    <?php foreach($info['info'] as $v) {?>
    <tr >
    <td class="align_c" ><input type="checkbox" name="ids[]" id="checkbox"value="<?=$v['id']?>" /></td>
   
    <td class="align_c"><?=$v["username"]?></td>
    <td class="align_c"></td>
    <td class="align_c"><?=$v["type"]=="amount" ? "�ʽ�" : "����"?></td>
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
    <th class="align_c">����</th>
     <th class="align_c">�ʽ�</th> 
    </tr>
    <tr>
      <td class="align_c"><font color="#FF0000"><?=$info['point']?></font></td>
      <td class="align_c"><font color="#FF0000"><?=$info['amount']?></font></td>
    </tr>
    </table>
    <div class="button_box"><input type="button" value="ȫѡ" onClick="checkall()">
   <input type="button" name="delete" value="����ɾ��" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
   </div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>