<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>
<form action="?file=model&action=edit&saveedit=<?=$modelid?>" method="post">
  <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>
    修改<?=$name?>类型
    </caption>

    <tr>
      <td class="align_r">类型名称：</td>
      <td class="align_l"><label>
        <input type="text" name="info[name]" value="<?=$name?>"require="true" datatype="limit" min="1" max="50" msg="不得少于1个字符超过50个字符"/>
      </label></td>
    </tr>
    <tr>
      <td class="align_r">描述：</td>
      <td class="align_l"><label>
        <textarea name="info[description]" cols="30" rows="5"><?=$description?></textarea>
      </label></td>
    </tr>
    <tr>
      <td class="align_r"><strong>数据表名</strong>：</td>
      <td class="align_l"><?=DB_PRE?>c_
  
<input name="info[tablename]" type="text" size="12" value="<?=$tablename?>"regexp="^[a-z0-9_]+$" require="true" truedatatype="limit|custom" min="1" max="50"  msg="字符长度范围必须为1到50位|只能为数字、和字母，下划线"> 
     </td>
    </tr>
    <tr>
      <td class="align_r"><strong>前台发布信息是否需要审核</strong></td>
      <td class="align_l"><p>
<input type="radio" name="info[auditing]" value="1" <?php if($auditing==1){echo "checked='checked'";}?>/>
          是
<input type="radio" name="info[auditing]" value="2" <?php if($auditing==2){echo "checked='checked'";}?>  />
          否
      </td>
    </tr>
    <tr>
      <td width="182" class="align_r">&nbsp;</td>
      <td width="477" class="align_l"><label>
        <input type="submit" name="button" id="button" value="确定" />
        <input type="reset" name="button2" id="button2" value="清楚" />
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
