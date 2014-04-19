<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>
<div>
<form action="?file=templateproject&action=update" method="post">
  <table align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>模板方案管理</caption>
    <tr>
      <th>方案名称</th>
      <th width="100">模板目录</th>
      <th width="120">修改时间</th>
      <th width="60">系统默认</th>
      <th width="250">管理操作</th>
    </tr>
<?php 
if(is_array($templateprojects)){
	foreach($templateprojects as $basenames){
?>
    <tr>
      <td><input name="tempname[<?=$basenames['dir']?>]" type="text" value="<?=$basenames['name']?>"></td>
      <td class="align_l"><?=$basenames['dir']?></td>
      <td class="align_c">&nbsp;</td>
      <td class="align_c"><?php if($basenames['isdefault']){?>√<?php }?></td>
      <td class="align_c"><?php if($basenames['isdefault']){?><span class="gray">设为默认</span><?php }else{ ?><a href="?file=templateproject&action=setdefault&project=<?=$basenames['dir']?>">设为默认<?php } ?></a> 
<?php if($basenames['status']==$basenames['dir']){?>
            <a href="?file=templateproject&action=style&template=<?=$basenames['dir']?>&type=0">启用</a>
<?php }else {?>
            <a href="?file=templateproject&action=style&template=<?=$basenames['dir']?>&type=1">停用</a>
<?php }?>
      <a href="?file=templateproject&action=dir&dirname=<?=$basenames['dir']?>">详细列表</a></td>
    </tr>
<?php 
	}
}
?>
  </table>
  <div class="button_box"><input type="submit" name="submit" value=" 更新模板方案名称 "></div>
  </form>
  
  <table align="center" cellpadding="2" cellspacing="1" border="0" class="table_info" >
    <caption>提示信息</caption>
  <tr>
    <td>
	1、所有模板方案都保存在 <font color="red">./templates/</font> 目录下（如果需要在线修改，请通过ftp将该目录设置为 777 ，并应用到子目录）<br/>
	2、网站当前使用的模板方案为：<font color="red"><?=$projects[TPL_NAME]?></font> ，保存路径为： <font color="red">./templates/<?=TPL_NAME?>/</font> ，其他模板方案的变化不会影响网站前台的显示。<br/>
	3、如果您需要增加网站模板方案，请把新的模板方案上传至 <font color="red">./templates/</font> 目录 <br/>
	4、如果您需要应用新的网站模板方案，请把该模板方案设置为系统默认方案 <br/>
	</td>
  </tr>
</table>
</div>
</body>
</html>
