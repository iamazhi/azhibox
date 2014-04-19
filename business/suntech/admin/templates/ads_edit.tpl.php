<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<SCRIPT LANGUAGE="JavaScript">
<!--

function alterUC(eID) {
	$("#table tbody").hide();
	$("#"+eID).show();
}

//-->
</SCRIPT>
<body>
<form action="" method="post" name="myform" enctype="multipart/form-data" >
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>添加广告位</caption>
    <tr >
    <th class="align_r" width="30%"><STRONG>广告位：</STRONG>
      </td>
    <td class="align_l">请选择广告位<select name="info[placeid]"require="true" datatype="limit" min="1" max="16" msg="请选择分类！"/> <option value="">请选择广告位</option><?php foreach($into as $v){?><option value="<?=$v["placeid"]?>" <?=$v["placeid"]==$placeid ? "selected" :""?> ><?=$v["placename"]?></option><?php } ?></select></td>
    </tr>
   <tr >
    <th class="align_r" width="30%"><STRONG>广告名称</STRONG>
      </td>
    <td class="align_l"><input name="info[adsname]" type="text" size="30" value="<?=$info["adsname"]?>"require="true" datatype="limit" min="1" max="16" msg="请输入广告名称！"/><font color="red">*</font> </td>
    </tr>
    
    <tr >
    <th class="align_r" width="30%"><STRONG>广告介绍</STRONG>
      </td>
    <td class="align_l"><input name="info[introduce]" type="text" size="50" value="<?=$info["introduce"]?>"/></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><STRONG>广告类型</STRONG>
      </td>
    <td class="align_l"><input type='radio' name='info[type]' value='image' onClick="alterUC('imageid')" <?=$info["type"]=="image" ? "checked":""?>>
        图片
        <input type='radio' name='info[type]' value='flash' onClick="alterUC('flashid')" <?=$info["type"]=="flash" ? "checked":""?>>
        FLASH
        <input type='radio' name='info[type]' value='text' onClick="alterUC('textid')" <?=$info["type"]=="text" ? "checked":""?>>
        文本
        <input type='radio' name='info[type]' value='code' onClick="alterUC('codeid')" <?=$info["type"]=="code" ? "checked":""?>>
        文字链 <font color="red">*</font></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><STRONG>广告内容</STRONG>
    <td class="align_l">
    <table cellpadding="0" cellspacing="0" id="table">
          <tbody id="imageid" style="display:none">
            <tr>
              <td>上传图片1：<?=form::upload_image('info[imageurl]', 'photo', $info["imageurl"], 40)?><Br/>
                        图片提示 ：<input type="text" name="info[alt]"size="40" value="<?=$info["alt"]?>"><br/>
                        链接地址 ：<input type="text" name="info[linkurl]" size="40" value="<?=$info["linkurl"]?>" /><br/>
                        上传图片2：<?=form::upload_image('info[s_imageurl]', 'photo', $info["s_imageurl"], 40)?><br/>
                        (第二张图片当广告为随屏移动广告或者对联广告的时有效) 
                        </td></tr>
                        </tbody>
                        
              <tbody id="flashid" style="display:none">
            <tr>
              <td> FLASH地址：&nbsp;<?=form::upload_image('info[flashurl]', 'flashurl', $info["flashurl"], 40)?><font color="red">*</font><br/>
                背景透明：
                <input type='radio' name='info[wmode]' value='transparent' <?=$info["wmode"]=="transparent" ? "checked" :""?>>
                是
                <input type='radio' name='info[wmode]' value='' <?=$info["wmode"]=="" ? "checked" :""?>>
                否 </td>
            </tr>
          </tbody>
          
          <tbody id="textid" style="display:none">
            <tr>
              <td><textarea name='info[text]' cols='64' rows='15' id='text'><?=$info["text"]?></textarea>
                <font color="red">*</font> </td>
            </tr>
          </tbody>
          
          <tbody id="codeid" style="display:none">
            <tr>
              <td>链接内容：<input type='text' name='info[code]' size=47 value="<?=$info["code"]?>"><font color="red">*</font><br />
                链接地址：http://<input type='text' name='info[texturl]' size=40  value="<?=$info["texturl"]?>"><font color="red">*</font> </td>
            </tr>
          </tbody>          
                        </table>
                        
    </td>
    </tr>
    <tr >
    <th class="align_r" width="30%"></td>
      <STRONG>客户帐号</STRONG>
    <td class="align_l"><input type="text" name="info[username]" value="<?=$info["username"]?>"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>广告发布日期</STRONG>          
      <td class="align_l"><?=form::date('info[fromdate]',date("Y-m-d",$info["fromdate"]))?></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>广告结束日期</STRONG>          
      <td class="align_l"><?=form::date('info[todate]',date("Y-m-d",$info["todate"]))?></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"></td>
      <STRONG>是否通过</STRONG>
    <td class="align_l"><input type="radio" name="info[passed]" value="1" id="3_0" <?=$info["passed"]==1 ? "checked" : ""?>>是
        <input type="radio" name="info[passed]" value="2" id="3_1" <?=$info["passed"]==2 ? "checked" : ""?>>否</td>
    </tr>
    <tr >
      <th class="align_r" width="30%"></td>
      <td class="align_l"><input name="info[status]" type="hidden" value="1">
      <input name="info[addtime]" type="hidden" value="<?=TIME?>">
      <input type="submit" name="dosubmit" value=" 确定 " /> <input type="reset" name="reset" value=" 清除 "></td>
    </tr>
    </table>
</form>
     <script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});

</script>
<SCRIPT LANGUAGE="JavaScript">
<!--
alterUC('<?=$info["type"]?>id');
//-->
</SCRIPT>
</body>
</html>