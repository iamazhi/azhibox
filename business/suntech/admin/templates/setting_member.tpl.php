<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<form action="" method="post">
  <table align="center" cellpadding="0" cellspacing="1" class="table_form">
    <caption>
    ��������
    </caption>

    <tr>
      <th width="35%" class="align_r"><strong>�����»�Աע�᣺</strong></td>
      <td class="align_l">
         <input type='radio' name='setting[allowregister]' value='1'  <?php if($allowregister){ ?>checked <?php } ?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
	     <input type='radio' name='setting[allowregister]' value='0'  <?php if(!$allowregister){ ?>checked <?php } ?>> ��
        </th>
    </tr>
    <tr>
      <th class="align_r"><strong>ע��ѡ��ģ�ͣ�</strong></th>
      <td class="align_l">
      <input type='radio' name='setting[choosemodel]' value='1'  <?php if($choosemodel){ ?>checked <?php } ?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[choosemodel]' value='0'  <?php if(!$choosemodel){ ?>checked <?php } ?>> ��</td>
    </tr>
    <tr>
      <th class="align_r"><strong>�»�Աע����Ҫ�ʼ���֤��</strong></th>
      <td class="align_l">
      <input type='radio' name='setting[enablemailcheck]' value='1'  <?=($enablemailcheck ? 'checked' : '')?> /> ��&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[enablemailcheck]' value='0'   <?=($enablemailcheck ? '' : 'checked')?> /> ��
      </td>
    </tr>
    <tr>
      <th class="align_r"><strong>����ǰ̨�����Ա�б�</strong></th>
      <td class="align_l">
      <input type="radio" name="setting[enableshowlist]" value="1" <?=($enableshowlist ? 'checked' : '')?> /> ��&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="setting[enableshowlist]" value="0" <?=($enableshowlist ? '' : 'checked')?> /> ��
        </td>
    </tr>
    <tr>
      <th class="align_r"><strong>�»�Աע����Ҫ����Ա��ˣ�</strong></th>
      <td class="align_l">
      <input type='radio' name='setting[enableadmincheck]' value='1'  <?php if($enableadmincheck){ ?>checked <?php } ?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[enableadmincheck]' value='0'  <?php if(!$enableadmincheck){ ?>checked <?php } ?>> ��
      </td>
    </tr>
    <tr>
      <th class="align_r"><strong>��Աע��������֤�빦�ܣ�</strong></th>
      <td class="align_l">
       <input type='radio' name='setting[enablecheckcodeofreg]' value='1'  <?php if($enablecheckcodeofreg){ ?>checked <?php } ?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[enablecheckcodeofreg]' value='0'  <?php if(!$enablecheckcodeofreg){ ?>checked <?php } ?>> ��
      </td>
    </tr>
    <tr>
      <th class="align_r"><strong>��Աע��ʱ�����������֤��</strong></th>
      <td class="align_l">
      <input type='radio' name='setting[enableQchk]' value='1'  <?php if($enableQchk){ ?>checked <?php } ?>> ��&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[enableQchk]' value='0'  <?php if(!$enableQchk){ ?>checked <?php } ?>> ��
      </td>
    </tr>
    <tr>
      <td class="align_r"><strong>��Ա�������ѷ�ʽ��</strong></td>
      <td class="align_l">
      <input type='radio' name='setting[paytype]' value='amount'  <?php if($paytype=='amount'){ ?>checked <?php } ?>> ��Ǯ&nbsp;&nbsp;
	  <input type='radio' name='setting[paytype]' value='point'  <?php if($paytype=='point'){ ?>checked <?php } ?>> ����</td>
    </tr>
    <tr>
      <td class="align_r"><strong>�»�Աע��Ĭ�����͵�����</strong></td>
      <td class="align_l"><input name='setting[defualtpoint]' type='text' id='defualtpoint' value='<?=$defualtpoint?>' size='5' maxlength='5'> ��
      </td>
    </tr>
    <tr>
      <td class="align_r"><strong>�»�Աע��Ĭ�������ʽ�</strong></td>
      <td class="align_l"><input name='setting[defualtamount]' type='text' id='defualtamount' value='<?=$defualtamount?$defualtamount:'0.00'?>' size='5' maxlength='5' require="true" datatype="currency" msg="��������ȷ�Ľ��" msgid="err_currency"> Ԫ<span id="err_currency"></span></td>
    </tr>
    <tr>
      <td class="align_r"><strong>��Աע��Э�飺</strong></td>
      <td class="align_l"><textarea name='setting[reglicense]' cols='60' rows='20' id='reglicense' style="width:100%"><?=$reglicense?></textarea></td>
    </tr>
    <tr>
      <td class="align_r"><strong>������Ա�����ã�</strong></td>
      <td class="align_l"><textarea name='setting[preserve]' cols='30' rows='3' id='reglicense' style="width:50%"><?=$preserve?></textarea>&nbsp;&nbsp;<font style="color:#f00">�û���֮����Ӣ�ġ�,��������</font></td>
    </tr>
    <tr>
      <td class="align_r"><strong>ģ�������ַ��URL����</strong></td>
      <td class="align_l"><input name='setting[url]' type='text' id='url' value='<?=$url?>' size='40' maxlength='50'><br />
      ����������Ա��ص���Ŀ��ģ�������������(������������)�����Աģ��ķ�����ַ����д http://��վ����/member <br />
      ��Ȼ��Ҳ����Ϊ��Աģ�����������(��ҪWEB������������)</td>
    </tr>
    <tr>
      <td class="align_r">&nbsp;</td>
      <td class="align_l"><label>
        <input type="submit" name="dosubmit" id="button" value="�ύ" />
        <input type="reset" name="button2" id="button2" value="����" />
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
