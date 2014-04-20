<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<body>
<table  align="center" cellpadding="0" cellspacing="1" class="table_list">
<caption>
    管理员设置
    </caption>
    <tr>
    <td><a href="?file=<?=$file?>&action=add">添加管理员</a> | <a href="?file=<?=$file?>&action=manage">管理员列表</a> | <?php foreach($role as $k=>$v){?> <a href="?file=<?=$file?>&action=manage&roleid=<?=$v["roleid"]?>"><?=$v["name"]?></a> |<?php }?> </td>
    </tr>
</table>
<form action="" method="post">
  <table width="681" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    编辑管理员
    </caption>

    <tr>
      <td width="25%" class="align_r">用户名：</td>
      <td class="align_l"><?=$info["username"]?></td>
    </tr>
    <tr>
      <td class="align_r">所属角色：</td>
      <td class="align_l">
      <?php foreach($role as $k=>$v){  ?>
      <input type="checkbox" name="roleids[]" value="<?=$v['roleid']?>" id="1_<?=$k?>" <? foreach($ros as $r){ if($v["roleid"]==$r["roleid"]){?>checked<? } }?>><?=$v["name"]?>(<?=$v["description"]?>)<Br/>
      <?php }?></td>
    </tr>
    <tr>
      <td class="align_r">锁定帐号：</td>
      <td class="align_l">
          <input type="radio" name="disabled" value="1" id="RadioGroup1_0">
          是
          <input type="radio" name="disabled" value="0" id="RadioGroup1_1" checked>
          否</td>
    </tr>
    
    <tr>
      <td class="align_r">&nbsp;</td>
      <td class="align_l"><label>
        <input type="submit" name="dosubmit"  value="提交" />
        <input type="reset" name="button2"  value="重置" />
      </label></td>
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
