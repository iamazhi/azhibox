<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>添加会员</caption>
    <tr >
    <th class="align_r" width="30%"><STRONG>用户名：</STRONG>
      </td>
    <td class="align_l"><input name="info[username]" type="text" size="15" require="true" datatype="limit|ajax" url="?file=member&action=checkuser" min="3" max="20" msg="用户名不得少于3个字符超过20个字符 ！"/></td>
    </tr>
   <tr >
    <th class="align_r" width="30%"><STRONG>密码：</STRONG><Br/>6到16个字符
      </td><td class="align_l"><input name="new_password" type="password" id="new_password" size="15" require="true" datatype="limit" min="6" max="16" msg="密码不得少于6个字符或超过16个字符！" /></td>
    </tr>
    
    <tr >
    <th class="align_r" width="30%"><STRONG>确认密码：</STRONG>
      </td>
    <td class="align_l"><input name="chk_password" type="password" id="chk_password" size="15" require="true" datatype="limit|repeat"  min="6" max="16" to="new_password" msg="密码不得少于6个字符或超过16个字符|两次输入的密码不一致" /></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><STRONG>会员组：</STRONG>
      </td>
    <td class="align_l"><select name="info[groupid]"/>
     <?php foreach($group as $v){ if($v["groupid"]!=1){?> <option value="<?=$v["groupid"]?>" <?=$v["groupid"]==6 ? "selected":""?> ><?=$v["name"]?></option><?php }}?>
      </select></td>
    </tr>
    <tr >
      <th class="align_r" width="30%"></td>
        <STRONG>会员模型：</STRONG>
      <td class="align_l"><select name="info[modelid]" require="true" datatype="number" min="1" max="16" msg="请选择分类！"/>
      <option value="">请选择</option>
      <?php foreach($model as $r){?><option value="<?=$r["modelid"]?>" <?=$r["modelid"]==8 ? "selected":""?>><?=$r["name"]?></option><?php }?></select></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>E-mail：</STRONG>
      <td class="align_l"><input type="text" name="info[email]" value="" require="true" datatype="email|limit|ajax" url="?file=member&action=email" min="1" max="20" msg="邮件格式不正确 ！"/></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>地区：</STRONG><BR>
      
      <td class="align_l"><select name="info[areaid]">
        <?=$is_tree?>
        </select></td>
    </tr>
    <tr >
      <th class="align_r" width="30%"></td>
      <td class="align_l"><input name="info[disabled]" type="hidden" value="1"><input type="submit" name="dosubmit" value=" 确定 " /> <input type="reset" name="reset" value=" 清除 "></td>
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
