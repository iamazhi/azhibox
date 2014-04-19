<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<script type="text/javascript" src="images/js/form.js"></script>
<body>
<?php ?>
<form action=""  name="myform" method="post"  enctype="multipart/form-data">


 <table  align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption class="align_c">附件管理</caption>
    <tr>
      <th width="35">选中</th>
      <th width="35">排序</th>
      <th width="35">ID</th>
      <th width="100">模块名称 </th>
      <th width="100">栏目名称</th>
      <th width="180">附件名称</th>
      <th width="120">附件大小</th>
      <th width="170">上传时间</th>
      <th width="200">管理操作</th>
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
      <td class="align_c">预览
 | <a href="?file=<?=$file?>&action=delete&aid=<?=$v["aid"]?>">删除 </td>
    </tr>
    <?php }?>
  </table>
    <div class="button_box"><input type="button" value="全选" onClick="checkall()">
  
   <input type="button"  value="取消" onclick="javascript:$('input[type=checkbox]').attr('checked', false)"> 
  
   <input type="button" name="listorder" value="排序" onClick="myform.action='?file=<?=$file?>&action=listorder';myform.submit();"> 
   
   <input type="button" name="delete" value="批量删除" onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
  
</div>
<div id="pages"><?=$a->pages?></div>
</form>

</body>
</html>