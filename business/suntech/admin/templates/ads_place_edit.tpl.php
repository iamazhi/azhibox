<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>添加广告位</caption>
    <tr >
    <th class="align_r" width="30%"><STRONG>广告位名称</STRONG>
      </td>
    <td class="align_l"><input name="info[placename]" type="text" size="30" value="<?=$info["placename"]?>" equire="true" datatype="limit" min="1" max="16" msg="广告位名称不能空！"/>  <font color="red">*</font></td>
    </tr>
   <tr >
    <th class="align_r" width="30%"><STRONG>广告位介绍</STRONG>
      </td>
    <td class="align_l"><input name="info[introduce]" type="text" size="50" value="<?=$info["introduce"]?>"/></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><STRONG>广告价格</STRONG>
      </td>
    <td class="align_l"><input type="text" name="info[price]" value="<?=$info["price"]?>" size="8">元/月 </td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><STRONG>广告位模板</STRONG>
      </td>
    <td class="align_l">&nbsp;</td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><STRONG>广告位宽度</STRONG>
      </td>
    <td class="align_l"><input type="text" name="info[width]" value="<?=$info["width"]?>" size="8">px</td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><STRONG>广告位高度</STRONG>
    <td class="align_l"><input type="text" name="info[height]" value="<?=$info["height"]?>" size="8">px</td>
    </tr>
    <tr >
    <th class="align_r" width="30%"></td>
      <STRONG>多个广告时</STRONG>      <td class="align_l"><input type="radio" name="info[option]" value="1" id="s1_0" <?=$info["option"]==1 ? "checked" :""?>>全部列出
        <input type="radio" name="info[option]" value="0" id="s1_1" <?=$info["option"]=="0" ? "checked" :""?>>随机列出一个</td>
    </tr>
    <tr >
    <th class="align_r" width="30%"></td>
      <STRONG>是否启用</STRONG>      
      <td class="align_l"><input type="radio" name="info[passed]" value="1" id="3_0" <?=$info["passed"]==1 ? "checked" :""?>>是
        <input type="radio" name="info[passed]"  id="3_1" value="0" id="3_0" <?=$info["passed"]==0 ? "checked" : "" ?> >否</td>
    </tr>
    <tr >
      <th class="align_r" width="30%"></td>
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