<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<form action="" method="post" name="myform">
<table cellpadding="1" align="center" cellspacing="1" class="table_form">
  <caption>
  ��ӽ���ͼƬ
  </caption>
    <tr >
    <th class="align_r" width="30%"><strong>��������</strong></td>
    <td class="align_l"><select name="info[typeid]" require="true" datatype="limit" min="1" max="16" msg="��ѡ����࣡"/><option value="">ѡ�����</option><?=$link?></select></td>
    </tr>

    <tr >
    <th class="align_r" width="30%"><strong>��������</strong></td>
    <td class="align_l"><input name="info[name]" type="text" size="50" require="true" datatype="limit" min="1" max="50" msg="��վ���Ʋ��ܿգ�"/>  <font color="red">*</font></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><strong>��ɫ</strong></td>
    <td class="align_l"><?=form::style('style','style', $style)?></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><strong>��վ��ַ</strong></td>
    <td class="align_l"><input name="info[url]" type="text" size="30" value="" />  <font color="red">*</font></td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><strong>����ͼƬ</strong><td class="align_l"><?=form::upload_image('info[thumb]', 'photo',$info["thumb"], 40)?></td>
    </tr>
  
    <tr >
    <th class="align_r" width="30%"><strong>����˵��</strong></td>
    <td class="align_l"><textarea name="info[introduce]" cols="30" rows="10"></textarea></td>
    </tr>
     <tr >
    <th class="align_r" width="30%"><strong>�Ƽ�</strong></td>
    <td class="align_l">
        <input name="info[elite]" type="radio" id="2_0" value="1" >��
        <input name="info[elite]" type="radio" id="2_1" value="2" checked>��
      </td>
    </tr>
    <tr >
    <th class="align_r" width="30%"><strong>��׼</strong></td>
    <td class="align_l">
        <input type="radio" name="info[passed]" value="1" id="3_0"checked>��
        <input type="radio" name="info[passed]" value="2" id="3_1">��
     </td>
    </tr>
    <tr >
    <th class="align_r" width="30%"></td>
    <td class="align_l"><input type="submit" name="dosubmit" value=" ȷ�� " /> <input type="reset" name="reset" value=" ��� "></td>
    </tr>
    </table>
    </form>
    <div class="jqmWindow" style="height:300px;"></div>
     <script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});

;
</script>
</body>
</html>