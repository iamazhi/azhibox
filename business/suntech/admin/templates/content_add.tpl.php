<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<script type="text/javascript" src="images/js/form.js"></script>
<body>
<?=$menu?>

<form action=""  name="myform" method="post"  enctype="multipart/form-data" >
<div class="tag_menu" style="width:99%;margin-top:10px;">
<ul>
  <li><a href="###" id='TabTitle0' onclick='ShowTabs(0)' class="selected">������Ϣ</a></li>
  <li><a href="###" id='TabTitle1' onclick='ShowTabs(1)'>�߼�����</a></li>
</ul></div>
  
  
<div id='Tabs0' style='display:'>
  <table align="center" cellpadding="0" cellspacing="1" class="table_form">
    <caption class="align_c">����</caption>
	<?php foreach($info as $v){?>
    <tr>
      <th width="150"class="align_r"><strong><?=$v["name"]?></strong><Br/><?=$v["tips"]?></th>
      <td class="align_l"><?=$content_form->$v["formtype"]($v["field"],$value='',$v["minlength"],$v["maxlength"]);?></td>
    </tr>
	<?php } ?>
 
    <tr>
      <td width="150"class="align_r"><strong>״̬</strong></td>
      <td>
	
	  <label><input type="radio" name="status" value="99" checked/> ����</label>
	
	  <label><input type="radio" name="status" value="3" > ���</label>
	  <label><input type="radio" name="status" value="2"> �ݸ�</label>
	  </td>
   </tr>
    </table>
  </div>

      <div id='Tabs1' style='display:none'>
      <table align="center" cellpadding="0" cellspacing="1" class="table_list">
       <caption class="align_c">�߼�����</caption>
       
       <tr>
		  <td class="align_r"> <strong>ת������</strong> <br /></td>
		  <td><input type="hidden" name="info[islink]" value="0"><input type="text" name="info[linkurl]" id="linkurl" value="" size="50" maxlength="255" disabled> <font color="#FF0000"><label><input name="info[islink]" type="checkbox" id="islink" value="1" onClick="ruselinkurl();" > ת������</label></font><br/><font color="#FF0000">���ʹ��ת���������������ֱ����ת������������Ч</font> </td>
		</tr>
        
       <Tr>
       <td class="align_r"><strong>html�ļ���</strong></td>
       <td><input type="text" name="info[prefix]" id="prefix" value="" size="20" class="" require="false" datatype="limit" min="0" max="20" msg='�ַ����ȱ���Ϊ0��20λ' />  </td>
       </Tr>
      
       <tr>
        <td class="align_r">����ҳģ��</td>
        <td><?=form::select_template('phpsin', 'info[template]', 'template_show', $MODEL[$modelid]['template_show'], '','show')?></td>
       </tr>
       
       <tr>
      <td width="150"class="align_r"><strong>�Ƽ�λ</strong><Br/>ȫѡ<input boxid='posids' type='checkbox' onClick="checkall('posids')" ></td>
      <td><? foreach($pos as $r){?>
          <span style="width:125px"><input type="checkbox" boxid="posids" name="info[posids][]" value="<?=$r["posid"]?>" id="posids"><?=$r["name"]?></span>
        <? }?>
          </td></tr>
          <tr>
       <Td class="align_r"><strong>����ʱ��</strong></Td>
       <td><?=form::date('info[inputtime]',date("Y-m-d H:i:s"),'inputtime')?></td>
       </tr>
        </table>

      </div>

<div style="padding-top:10px;padding-bottom:10px; text-align:center">
<label>
<input type="submit" name="dosubmit" value=" ȷ�� ">
      &nbsp; <input type="button" name="preview" value=" Ԥ�� " onClick="preview_content();">
	  &nbsp; <input type="reset" name="reset" value=" ��� ">
      </label>
      </div>
</form>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});

</script>
</body>
</html>

