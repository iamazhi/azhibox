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
<form action="" method="post" name="myform" enctype="multipart/form-data" onSubmit="return checkform(this);return flase;">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>��ӹ��λ</caption>
    <tr >
    <th class="align_r" width="30%"><STRONG>���λ��</STRONG>
      </td>
    <td class="align_l">��ѡ����λ<select name="info[placeid]"require="true" datatype="limit" min="1" max="16" msg="��ѡ����࣡"/> <option value="">��ѡ����λ</option><?php foreach($info as $v){?><option value="<?=$v["placeid"]?>" <?=$v["placeid"]==$placeid ? "selected" : ""?> ><?=$v["placename"]?></option><?php } ?></select></td>
    </tr>
   <tr >
    <th class="align_r" width="30%"><STRONG>�������</STRONG>
      </td>
    <td class="align_l"><input name="info[adsname]" type="text" size="30" require="true" datatype="limit" min="1" max="16" msg="�����������ƣ�"/><font color="red">*</font> </td>
    </tr>
    
    <tr >
    <th class="align_r" width="30%"><STRONG>������</STRONG>
      </td>
    <td class="align_l"><input name="info[introduce]" type="text" size="50" /></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><STRONG>�������</STRONG>
      </td>
    <td class="align_l"><input type='radio' name='info[type]' value='image' onClick="alterUC('imageid')" checked>
        ͼƬ
        <input type='radio' name='info[type]' value='flash' onClick="alterUC('flashid')">
        FLASH
        <input type='radio' name='info[type]' value='text' onClick="alterUC('textid')">
        �ı�
        <input type='radio' name='info[type]' value='code' onClick="alterUC('codeid')">
        ������ <font color="red">*</font></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><STRONG>�������</STRONG>
    <td class="align_l">
    <table cellpadding="0" cellspacing="0" id="table">
          <tbody id="imageid" style="display:none">
            <tr>
              <td>�ϴ�ͼƬ1��<?=form::upload_image('info[imageurl]', 'photo', $photo, 40)?><Br/>
                        ͼƬ��ʾ ��<input type="text" name="info[alt]"size="40" ><br/>
                        ���ӵ�ַ ��<input type="text" name="info[linkurl]"size="40"  value="http://"/><br/>
                        �ϴ�ͼƬ2��<?=form::upload_image('info[s_imageurl]', 'photo', $photo, 40)?><br/>
                        (�ڶ���ͼƬ�����Ϊ�����ƶ������߶�������ʱ��Ч) 
                        </td></tr>
                        </tbody>
                        
              <tbody id="flashid" style="display:none">
            <tr>
              <td> FLASH��ַ��&nbsp;<?=form::upload_image('info[flashurl]', 'photo', $photo, 40)?><font color="red">*</font><br/>
                ����͸����
                <input type='radio' name='info[wmode]' value='transparent' checked>
                ��
                <input type='radio' name='info[wmode]' value=''>
                �� </td>
            </tr>
          </tbody>
          
          <tbody id="textid" style="display:none">
            <tr>
              <td><textarea name='info[text]' cols='64' rows='15' id='text'></textarea>
                <font color="red">*</font> </td>
            </tr>
          </tbody>
          
          <tbody id="codeid" style="display:none">
            <tr>
              <td>�������ݣ�<input type='text' name='info[code]' size=47><font color="red">*</font><br />
                ���ӵ�ַ��http://<input type='text' name='info[texturl]' size=40 ><font color="red">*</font> </td>
            </tr>
          </tbody>          
                        </table>
                        
    </td>
    </tr>
    <tr >
    <th class="align_r" width="30%"></td>
      <STRONG>�ͻ��ʺ�</STRONG>
    <td class="align_l"><input type="text" name="info[username]"></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>��淢������</STRONG>          
      <td class="align_l"><?=form::date('info[fromdate]','','fromdate',date("Y-m-d"),$size='21')?></td>
    </tr>
    <tr >
      <th class="align_r"><STRONG>����������</STRONG>          
      <td class="align_l"><?=form::date('info[todate]','','todate',date("Y-m-d",strtotime('+30 day')),$size='21')?></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"></td>
      <STRONG>�Ƿ�ͨ��</STRONG>
    <td class="align_l"><input type="radio" name="info[passed]" value="1" id="3_0"checked>��
        <input type="radio" name="info[passed]" value="2" id="3_1">��</td>
    </tr>
    <tr >
      <th class="align_r" width="30%"></td>
      <td class="align_l"><input name="info[status]" type="hidden" value="1">
      <input name="info[addtime]" type="hidden" value="<?=TIME?>">
      <input type="submit" name="dosubmit" value=" ȷ�� " /> <input type="reset" name="reset" value=" ��� "></td>
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
alterUC('imageid');
//-->
</SCRIPT>
</body>
</html>