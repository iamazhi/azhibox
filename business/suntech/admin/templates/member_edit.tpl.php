<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>修改会员信息</caption>
    <tr >
    <th class="align_r" width="30%"><STRONG>用户名：</STRONG>
      </td>
    <td class="align_l"><input name="info[username]" type="text" size="15" require="false" value="<?=$info["username"]?>"datatype="limit|ajax" url="?file=member&action=checkuser&userid=<?=$info["userid"]?>" min="3" max="20" msg="用户名不得少于3个字符超过20个字符 ！"/></td>
    </tr>
   <tr >
    <th class="align_r" width="30%"><STRONG>密码：</STRONG><Br/>6到16个字符
      </td><td class="align_l"><input name="new_password" type="password" id="new_password" size="15" require="false" datatype="limit" min="6" max="16" msg="密码不得少于6个字符或超过16个字符！" /></td>
    </tr>
    
    <tr >
    <th class="align_r" width="30%"><STRONG>确认密码：</STRONG>
      </td>
    <td class="align_l"><input name="chk_password" type="password" id="chk_password" size="15" require="false" datatype="limit|repeat"  min="6" max="16" to="new_password" msg="密码不得少于6个字符或超过16个字符|两次输入的密码不一致" /></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>E-mail：</STRONG>    
      <td class="align_l"><input type="text" name="info[email]" value="<?=$info["email"]?>" require="true" datatype="email|limit|ajax" url="?file=member&action=email&userid=<?=$info["userid"]?>" min="1" max="20" msg="邮件格式不正确 ！"/></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><STRONG>会员组：</STRONG>
      </td>
    <td class="align_l"><?php if($groupid==1){?><?php $get_group=$a->get($table="member_group",$where="groupid=$groupid");echo $get_group["name"]; }else{?><select name="info[groupid]"/>
     <?php foreach($group as $v){ if($v["groupid"]!=1){?><option value="<?=$v["groupid"]?>" <?=$v["groupid"]==$groupid ? "selected":""?> ><?=$v["name"]?></option><?php }}}?>
      </select></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>地区：</STRONG>    
      <td class="align_l"><select name="info[areaid]">
        <?=$is_tree?>
      </select></td>
    </tr>
    <tr >
      <th class="align_r" width="30%"></td>
        <STRONG>会员模型：</STRONG>
      <td class="align_l"><select name="info[modelid]" require="true" datatype="number" min="1" max="16" msg="请选择分类！"/>
      <option value="">请选择</option>
      <?php foreach($model as $r){?><option value="<?=$r["modelid"]?>" <?=$r["modelid"]==$modelid ? "selected" :""?>><?=$r["name"]?></option><? }?></select></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>姓名：</STRONG>
      <td class="align_l"><input name="posuserid[userid]" type="hidden" value="<?=$userid?>"><input name="detail[truename]" type="text" value="<?=$detail["truename"]?>"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>性别：</STRONG>    
      <td class="align_l">
          <input type="radio" name="detail[gender]" value="1" id="1_0" <?=$detail["gender"]==1 ? "checked" :""?> >
          男
          <input type="radio" name="detail[gender]" value="2" id="1_1" <?=$detail["gender"]==2 ? "checked" :""?>>
          女
          </td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>生日：</STRONG>    
      <td class="align_l"><?=form::date('detail[birthday]',$detail["birthday"],$size='21')?></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>手机：</STRONG>    
      <td class="align_l"><input type="text" name="detail[mobile]" value="<?=$detail["mobile"]?>"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>电话：</STRONG>    
      <td class="align_l"><input type="text" name="detail[telephone]" value="<?=$detail["telephone"]?>"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>QQ：</STRONG>    
      <td class="align_l"><input type="text" name="detail[qq]" value="<?=$detail["qq"]?>"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>MSN：</STRONG>    
      <td class="align_l"><input type="text" name="detail[msn]" value="<?=$detail["msn"]?>"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>地址：</STRONG>    
      <td class="align_l"><input type="text" name="detail[address]" value="<?=$detail["address"]?>" size="40"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>邮编：</STRONG><BR>
      
      <td class="align_l"><input type="text" name="detail[postcode]" value="<?=$detail["postcode"]?>" size="10"></td>
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
