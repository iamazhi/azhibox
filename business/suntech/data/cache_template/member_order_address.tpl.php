<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('member','header'); ?>
<div class="container">
 <div class="content" id="top_t">
  <ul id="menu">
            <li class="sec1"><a href="../member">�ҵ���ҳ</a></li>
            <li class="sec2"><a href="../member/index.php?template=order">��������</a></li>
            <li class="sec1"><a href="../member/index.php?template=pay&type=amount">�������</a></li>
            <li class="sec1"><a href='index.php?template=account'>�˻�����</a></li>
        </ul>
        
        <ul id="main">
               <li class=block id="m_left">
                 
                 
                  <dl class='bitem'>
 
      
       <dt onClick='showHide("items1_1")'><b>��������</b></dt>
        <dd style='display:block' class='sitem' id='items1_1'>
          <div class='sitemu'>
               <p><a href='../member/index.php?template=orderall' >ȫ������</a></p>
               <p><a href='../member/index.php?template=order&status=0'><font color="red">������</font>����</a></p>
               <p><a href='../member/index.php?template=order&status=1'><font color="#FF6600">�Ѹ���</font>����</a></p>
               <p><a href='../member/index.php?template=order&status=2'><font color="#0000FF">�ѷ���</font>����</a></p>
               <p><a href='../member/index.php?template=order&status=3'><font color="#006600">���׳ɹ�</font>����</a></p>
               <p><a href='../member/index.php?template=order&status=4'><font color="#999999">���׹ر�</font>����</a></p>
               <p><a href='index.php?template=order_address' >�ջ���ַ</a></p>
          </div>
        </dd>
        
        
        
    </dl>
                 
               </li>
               <li class=unblock id="m_left"></li>
               
              
               </ul>
                <div id="m_right">
                  <ul class="my_nav" id="top_t">
                    <li class="sec_2">�����ջ���ַ</li>
                  </ul>
                
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td bgcolor="#e6f1fb" class="align_c">�ջ���</td>
      <td bgcolor="#e6f1fb" class="align_c">��������</td>
      <td bgcolor="#e6f1fb" class="align_c">�绰</td>
      <td bgcolor="#e6f1fb" class="align_c">�ֻ�</td>
      <td bgcolor="#e6f1fb" class="align_c">��ַ</td>
      <td bgcolor="#e6f1fb" class="align_c">�ʱ�</td>
      <td bgcolor="#e6f1fb" class="align_c">����</td>
      </tr>
<?php $DATA = get("SELECT * FROM phpjsj_order_deliver a, phpjsj_area b WHERE a.userid = '$user_id' AND a.areaid = b.areaid", 100, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
 <tr>
                    <td class="align_c"><?php echo $r['consignee'];?></td>
                    <td class="align_c"><?php echo $r['name'];?></td>
                    <td class="align_c"><?php echo $r['telephone'];?></td>
                    <td class="align_c"><?php echo $r['mobile'];?></td>
                    <td class="align_c"><?php echo $r['address'];?></td>
                    <td class="align_c"><?php echo $r['postcode'];?></td>
                    <td class="align_c"><a href="../member/index.php?template=order_edit&deliverid=<?php echo $r['deliverid'];?>">�޸�</a> | <a href="../member/index.php?template=order_delete&deliverid=<?php echo $r['deliverid'];?>">ɾ��</a></td>
                  </tr>
<?php } unset($DATA); ?>
                 
                  </table>
    
    <form name="myform"action="" method="post">    
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td colspan="2" bgcolor="#e6f1fb" class="align_l">�����ջ���ַ</td>
      </tr>
                 
                  <tr>
                    <td class="align_r" width="20%">* ��������</td>
                    <td>
<select name="into[areaid]">
<?php $DATA = get("SELECT * FROM `phpjsj_area` ORDER BY  `listorder` DESC", 10, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
<option value="<?php echo $r['areaid'];?>"><?php echo $r['name'];?></option>
<?php } unset($DATA); ?>
</select>
</td>
                  </tr>
                  <tr>
                    <td class="align_r">* �ջ��ˣ�</td>
                    <td><input type="text" name="into[consignee]"value="<?php echo $info['truename'];?>"/></td>
                  </tr>
                  <tr>
                    <td class="align_r">* �绰��</td>
                    <td><input type="text" name="into[telephone]" value="<?php echo $info['telephone'];?>"/>��ʽ��010-10000000-801 </td>
                  </tr>
                  <tr>
                    <td class="align_r">* �ֻ���</td>
                    <td><input type="text" name="into[mobile]"value="<?php echo $info['mobile'];?>"/>��ʽ��13800000000 </td>
                  </tr>
                  <tr>
                    <td class="align_r">* ��ַ��</td>
                    <td><input type="text" name="into[address]"size="50" value="<?php echo $info['address'];?>"/></td>
                  </tr>
                  <tr>
                    <td class="align_r">* �ʱࣺ</td>
                    <td><input type="text" size="8" name="into[postcode]"value="<?php echo $info['postcode'];?>"/></td>
                  </tr>
                  <tr>
                    <td class="align_r"></td >
                    <td><input type="submit" name="address" value="ȷ��" />  <input name="" value="����"type="reset" /></td>
                  </tr>
                  </table>
  </form>
  </div>
                  
  </div>
  </div><?php include template('member','footer'); ?>
</body>
</html>