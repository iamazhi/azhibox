<?php
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form action="?file=urlrule&action=edit&urlruleid=<?=$urlruleid?>" method="post" name="myform">
<table cellpadding="2" cellspacing="1" class="table_form">
    <caption>�޸�URL����</caption>
    <tr>
      <th width="20%"><strong>URL��������</strong></th>
      <td><input type="text" name="data[file]" value="<?=$file?>" size="30" require="true" datatype="require" msg="URL���Ʋ���Ϊ��"><font color="red">*</font></td>
    </tr>
    <tr>
    <th><strong>ģ������</strong></th>
    <td>
     <select name="data[module]" require="true" msg="��ѡ��ģ��" datatype="custom"  regexp="[^0\s*]$">
        <option value='-1'>����</option>
        <?php
        if(is_array($MODULE)){
            foreach($MODULE as $k=>$m){
                $selected = $module==$k ? "selected" : "";
                echo "<option value='".$k."' $selected>".trim($m['name'])."</option>\n";
            }
        }
        ?>
        </select>
       </td>
     </tr>
     <tr>
      <th ><strong>��̬URL����</strong><br/>���ɾ�̬ҳ����õ�URL����</th>
      <td>
        <input type="radio" value="1" name="data[ishtml]"  <?php if ($ishtml == 1){ ?>checked="checked"<?php }?> class="radio_style"/>��
        <input type="radio" value="0" name="data[ishtml]" <?php if ($ishtml == 0){?>checked="checked"<?php }?> class="radio_style"/>��
    </td>
    </tr>
    <tr>
      <th><strong>URL����</strong></th>
      <td>
      <input type="text" name="data[urlrule]" value="<?=$urlrule?>" style="width:90%" require="true" datatype="require" msg="URL������Ϊ��" />
      </td>
    </tr>
    <tr>
      <th><strong>URL��������</strong></th>
      <td>
      <input type="text" name="data[example]" value="<?=$example?>" style="width:90%" /></td>
    </tr>
    <tr>
      <th></th>
      <td>
	  <input type="hidden" name="forward" value="?file=urlrule&action=manage">
	  <input type="submit" name="dosubmit" value=" ȷ�� ">
      &nbsp; <input type="reset" name="reset" value=" ��� ">
	  </td>
    </tr>	
</table>
</form>
</body>
</html>
<script language="javascript" type="text/javascript">
$().ready(function() {
	 $('form').checkForm(1);
	});
</script>