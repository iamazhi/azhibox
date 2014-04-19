<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>添加友情链接</caption>
    <tr >
    <th class="align_r" width="30%"><strong>所属分类</strong></td>
    <td class="align_l"><select name="info[typeid]" require="true" datatype="limit" min="1" max="16" msg="请选择分类！"/><option value="">选择分类</option><?=$link?></select></td>
    </tr>
   <tr >
    <th class="align_r" width="30%"><strong>连接类型</strong></td>
    <td class="align_l">
        <input name="info[linktype]" type="radio" value="1" id="1_0" checked>Logo链接
        <input name="info[linktype]" type="radio" value="2" id="1_1">文字链接
      </td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><strong>网站名称</strong></td>
    <td class="align_l"><input name="info[name]" type="text" size="30" require="true" datatype="limit" min="1" max="16" msg="网站名称不能空！"/>  <font color="red">*</font></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><strong>链接颜色</strong></td>
    <td class="align_l"><?=form::style('style','style', $style)?></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><strong>网站地址</strong></td>
    <td class="align_l"><input name="info[url]" type="text" size="30" value="" />  <font color="red">*</font></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><strong>网站Logo</strong></td>
    <td class="align_l"><?=form::upload_image('info[logo]', 'photo',$info["logo"], 40)?></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><strong>站长姓名</strong></td>
    <td class="align_l"><input name="info[username]" type="text" size="30"></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><strong>网站介绍</strong></td>
    <td class="align_l"><textarea name="info[introduce]" cols="30" rows="10"></textarea></td>
    </tr>
     <tr >
    <th class="align_r" width="30%"><strong>推荐</strong></td>
    <td class="align_l">
        <input name="info[elite]" type="radio" id="2_0" value="1" >是
        <input name="info[elite]" type="radio" id="2_1" value="2" checked>否
      </td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><strong>批准</strong></td>
    <td class="align_l">
        <input type="radio" name="info[passed]" value="1" id="3_0"checked>是
        <input type="radio" name="info[passed]" value="2" id="3_1">否
     </td>
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