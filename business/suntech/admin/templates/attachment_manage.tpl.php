<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<script type="text/javascript" src="images/js/form.js"></script>
<body>
<?php ?>
<form action=""  name="myform" method="post"  enctype="multipart/form-data">


 <table  align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption class="align_c">��������</caption>
    <tr>
      <th width="35">ѡ��</th>
      <th width="35">����</th>
      <th width="35">ID</th>
      <th width="100">ģ������ </th>
      <th width="100">��Ŀ����</th>
      <th width="180">��������</th>
      <th width="120">������С</th>
      <th width="170">�ϴ�ʱ��</th>
      <th width="200">�������</th>
    </tr>
    <?php foreach($info as $v) {?>
    <tr>
      <td class="align_c"><input type="checkbox" name="aid[]" id="checkbox" value="<?=$v['aid']?>" /></td>
      <td class="align_l"><input type="text" name="listorders[<?=$v['aid']?>]" value="<?=$v['listorder']?>" size="4" /></td>
      <td class="align_c"><?php echo $v[aid];?></td>
      <td class="align_c"><?php $m=$a->get("module","module='$v[module]'"); echo $m["name"];?></td>
      <td class="align_c"><?php $catid=$a->get("category","catid='$v[catid]'"); echo $catid["name"];?></td>
      <td class="align_c"><div id='FilePreview' style='Z-INDEX: 1000; LEFT: 0px; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px; display: none;'></div><a href='###' onMouseOut='javascript:FilePreview("<?=UPLOAD_URL?><?=$v[filepath]?>", 0);' onMouseOver='javascript:FilePreview("<?=UPLOAD_URL?><?=$v[filepath]?>",1);'><?php echo $v[filename];?></a></td>
      <td class="align_c"><?php echo number_format($v[filesize] / 1024);?>KB</td>
      <td class="align_c"><?php echo date("Y-m-d H:i:s",$v[uploadtime]);?></td>
      <td class="align_c">Ԥ��
 | <a href="?file=<?=$file?>&action=delete&aid=<?=$v["aid"]?>">ɾ�� </td>
    </tr>
    <?php }?>
  </table>
    <div class="button_box"><input type="button" value="ȫѡ" onClick="checkall()">
  
   <input type="button"  value="ȡ��" onclick="javascript:$('input[type=checkbox]').attr('checked', false)"> 
  
   <input type="button" name="listorder" value="����" onClick="myform.action='?file=<?=$file?>&action=listorder';myform.submit();"> 
   
   <input type="button" name="delete" value="����ɾ��" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
  
</div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>