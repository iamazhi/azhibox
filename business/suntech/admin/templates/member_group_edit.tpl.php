<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>添加会员组</caption>
    <tr >
    <th class="align_r" width="20%"><STRONG>名称：</STRONG>
      </td>
    <td class="align_l"><input name="info[name]" type="text" value="<?=$info["name"]?>"size="30" require="true" datatype="limit" min="3" max="20" msg="用户组名不得少于3个字符超过20个字符！"/></td>
    </tr>
   <tr >
    <th class="align_r" width="20%"><STRONG>服务介绍：</STRONG>
      </td><td class="align_l"><textarea name="info[description]" id="description"><?=$info["description"]?></textarea><?=form::editor('description', 'basic', '','100%', 350)?></td>
    </tr>
    
    <tr >
    <th class="align_r" width="20%"><STRONG>允许访问：</STRONG>
      </td>
    <td class="align_l">
        <input type="radio" name="info[allowvisit]" value="1" id="1_0" <?=$info["allowvisit"]==1 ? "checked" :""?> >
        是
        <input type="radio" name="info[allowvisit]" value="2" id="1_1" <?=$info["allowvisit"]==2 ? "checked" :""?>>
        否</td>
    </tr>
    <tr >
    <th class="align_r" width="20%"><STRONG>允许搜索：</STRONG>
      </td>
    <td class="align_l">
        <input type="radio" name="info[allowsearch]" value="1" id="2_0" <?=$info["allowsearch"]==1 ? "checked" :""?>>
        是
        <input type="radio" name="info[allowsearch]" value="2" id="2_1" <?=$info["allowsearch"]==2 ? "checked" :""?>>
        否</td>
    </tr>
    <tr >
      <th class="align_r" width="20%"></td>
        <STRONG>允许发布：</STRONG>
      <td class="align_l">
       <input type="radio" name="info[allowpost]" value="1" id="1_0" <?=$info["allowpost"]==1 ? "checked" :""?>>
        是
        <input type="radio" name="info[allowpost]" value="2" id="1_1" <?=$info["allowpost"]==2 ? "checked" :""?>>
        否</td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>允许会员自助升级：</STRONG>
      <td class="align_l">
        <input type="radio" name="info[allowupgrade]" value="1" id="1_0" <?=$info["allowupgrade"]==1 ? "checked" :""?>>
        是
        <input type="radio" name="info[allowupgrade]" value="2" id="1_1" <?=$info["allowupgrade"]==2 ? "checked" :""?>>
        否
        </td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>包年价格：</STRONG><BR>
      <td class="align_l"><input type="text" name="info[price_y]" size="10" value="<?=$info["price_y"]?>"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>包月价格：</STRONG><BR>
      <td class="align_l"><input type="text" name="info[price_m]" size="10" value="<?=$info["price_m"]?>"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>包日价格：</STRONG><BR>
      <td class="align_l"><input type="text" name="info[price_d]" size="10" value="<?=$info["price_d"]?>"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>最大短消息数：</STRONG><BR>
      <td class="align_l"><input type="text" name="info[allowmessage]" size="10" value="<?=$info["allowmessage"]?>"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>是否禁用：</STRONG><BR>
      <td class="align_l">
        <input type="radio" name="info[disabled]" value="1" id="1_0" <?=$info["disabled"]==1 ? "checked" :""?>>
        是
        <input type="radio" name="info[disabled]" value="2" id="1_1" <?=$info["disabled"]==2 ? "checked" :""?>>
        否
        </td>
    </tr>
    <tr >
      <th class="align_r" width="20%"></td>
      <td class="align_l"><input type="submit" name="dosubmit" value=" 确定 " /> <input type="reset" name="reset" value=" 清除 "></td>
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