<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('member','header'); ?>
<div class="container">
  
  <div class="content" id="top_t">
  <ul id="menu">
            <li class="sec1"><a href="../member">�ҵ���ҳ</a></li>
            <li class="sec1"><a href="../member/index.php?template=order">��������</a></li>
            <li class="sec2"><a href="../member/index.php?template=pay&type=amount">�������</a></li>
            <li class="sec1"><a href='index.php?template=account'>�˻�����</a></li>
        </ul>
        
        <ul id="main">
        <li class=block id="m_left">
                       
      <dl class='bitem'>
        <dt onClick='showHide("items3_1")'><b>�������</b></dt>
        <dd style='display:block' class='sitem' id='items3_1'>
          <div class='sitemu'>
            <p><a href='../member/index.php?template=online'>����֧��</a></p>
            <p><a href='../member/index.php?template=bank'>���л��</a></p>
            <p><a href='../member/index.php?template=buypoint'>�������</a></p>
            <p><a href='../member/index.php?template=verified'>���ȷ��</a></p>
            <p><a href='../member/index.php?template=card'>�㿨��ֵ</a></p>
            <p><a href='../member/index.php?template=onlinerecord'>֧����¼</a></p>
            <p><a href='../member/index.php?template=useramount'>����¼</a></p>
            <p><a href='../member/index.php?template=pay&type=amount'>���׼�¼</a></p>
          </div>
        </dd>
      </dl>
                 
               </li>
               <li class=unblock id="m_left"></li>
               
              
               </ul>
               <div id="m_right">
                  <ul class="my_nav" id="top_t">
                    <li class="sec_2">����֧��</li>
                  </ul>
      <form action="" method="post">
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td colspan="2" bgcolor="#e6f1fb" class="align_l">�� ����֧��</td>
      </tr>
      <tr>
       <td width="25%" class="align_r">������</td>
       <td><?php echo $info['point'];?></td>
      </tr> 
      <tr>
       <td class="align_r">�ʽ���</td>
       <td><?php echo $info['amount'];?></td>
      </tr>
      <tr>
       <td class="align_r"><font color="red">*</font>��ֵ��</td>
       <td><input name="infos[amount]" type="text" id="amount" size="8" require="true"  datatype='currency'  msg='�����������򸡵���(��ʽ��0.1)' msgid="msgid" value="" />&nbsp;Ԫ&nbsp;<span id="msgid" style="color:#F00"></span></td>
      </tr>
      <tr>
       <td class="align_r">��ֵ��ʽ��</td>
       <td>
<?php $DATA = get("SELECT * FROM `phpjsj_pay_payment` WHERE `pay_code` = 'bank' AND `enabled` = '1'", 20, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
<?php $i=$i+1;?>
      <input type="radio" name="infos[payment]" value="<?php echo $r['pay_name'];?>" id="1_<?php echo $i;?>" <?php if($i==1) { ?> checked="checked" <?php } ?>/><?php echo $r['pay_name'];?><Br/>
<?php } unset($DATA); ?>
</td>
      </tr>
      <tr>
       <td class="align_r">E-mail��</td>
       <td><input type="text" name="infos[email]" value="<?php echo $info['email'];?>" /></td>
      </tr>
      <tr>
       <td class="align_r"><font color="red">*</font>�� ����</td>
       <td><input type="text" name="infos[contactname]" value="<?php echo $info['username'];?>" require="true" datatype="limit" min="2" max="20" msg=" ������������2���ַ�����20���ַ�"/></td>
      </tr>
      <tr>
       <td class="align_r"><font color="red">*</font>�� ����</td>
       <td><input type="text" name="infos[telephone]" value="<?php echo $info['telephone'];?>" require="true" datatype="custom" regexp="(^(((d{3}))|(d{3}-))?13[0-9]d{8}|15[89]d{8}?$)|(^(0[0-9]{2,3}-)?([2-9][0-9]{6,7})+(-[0-9]{1,4})?$)" msg="��������ȷ�ĵ绰����" msgid="msgid1"/> ��ʽ��010-88888888��13888888888<span id="msgid1" ></span></td>
      </tr>
      <tr>
       <td class="align_r">�� ע��</td>
       <td><textarea name="infos[usernote]" cols="30" rows="10"></textarea></td>
      </tr>
      <tr>
       <td class="align_r"></td>
       <td>  <input type="submit" value="ȷ��" name="confirms"/>  <input name="" type="reset" value="����"/> </td>
      </tr>
       </table>
       
      </form>
     </div>        
   </div>
  </div>
<?php include template('member','footer'); ?>
</body>
</html>