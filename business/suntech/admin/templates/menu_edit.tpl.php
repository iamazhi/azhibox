<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<form action="" method="post">
  <table width="681" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    修改菜单
    </caption>

    <tr>
      <td class="align_r">上级菜单：</td>
      <td width="558" class="align_l"><?=$upchild["name"]?></td>
    </tr>
    <tr>
      <td class="align_r"><font color="red">*</font> <strong>菜单名称</strong>：</td>
      <td class="align_l"><label>
        <input name="info[name]" type="text" value="<?=$info["name"]?>" require="true" datatype="limit" min="6" max="16" msg="不得少于2个字符超过20个字符"/>
      </label></td>
    </tr>
    <tr>
      <td class="align_r">连接地址：</td>
      <td class="align_l"><input name="info[url]" type="text" value="<?=$info["url"]?>" size="50" /></td>
    </tr>
    <tr>
      <td class="align_r">提示文本：</td>
      <td class="align_l"><label>
        <input name="info[title]" type="text" value="<?=$info["title"]?>" />
      </label></td>
    </tr>
    <tr>
      <td class="align_r">鼠标点击打开图标：</td>
      <td class="align_l"><label>
        <input name="info[icon]" type="text" value="<?=$info["icon"]?>" />
      </label></td>
    </tr>
    <tr>
      <td class="align_r">鼠标点击关闭图标：</td>
      <td class="align_l"><label>
        <input name="info[iconOpen]" type="text" value="<?=$info["iconOpen"]?>" />
      </label></td>
    </tr>
    <tr>
      <td class="align_r">是否显示菜单：</td>
      <td class="align_l">
       是 <input name="info[disabled]" type="radio" value="0" id="Group1_0" <?=$info[disabled]==0 ? "checked=checked" : ""; ?> /> 否 <input name="info[disabled]" type="radio" value="1" id="Group1_2" <?=$info[disabled]==1 ? "checked=checked" : ""; ?>/>
      </td>
    </tr>
      <td class="align_r">&nbsp;</td>
      <td class="align_l"><label>
        <input type="submit" name="dosubmit"  value="提交" />
        <input type="reset" name="button2" value="重置" />
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
