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
                    <li class="sec_2">������Ϣ</li>
                  </ul>
                 <form action="" method="post" >
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td bgcolor="#e6f1fb" class="align_c">��Ʒ</td>
      <td bgcolor="#e6f1fb" class="align_c">����</td>
      <td bgcolor="#e6f1fb" class="align_c">�ܽ��</td>
      <td bgcolor="#e6f1fb" class="align_c">�µ�ʱ��</td>
      </tr>
                 
       <?php $DATA = get("SELECT * FROM `phpjsj_order` WHERE `orderid` = '$orderid' AND `userid` = '$user_id' ORDER BY  `time` DESC", 1, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
       <tr>
                    <td class="align_l" width="45%">��<a href="../<?php echo $r['goodsurl'];?>" target="_blank"><?php echo str_cut($r[goodsname],$titlelen);?></a></td>
                    <td class="align_c"><?php echo $r['number'];?><?php echo $r['unit'];?></td>
                    <td class="align_c"><?php echo $r['amount'];?></td>
                    <td class="align_c"><?php echo $r['date'];?> <?php echo date("H:i:s",$r[time]);?></td>
                   
                  </tr>
       <?php } unset($DATA); ?>
       </table>
       <table cellpadding="0" cellspacing="1" class="table_list">
       <tr>
       <td colspan="2"  bgcolor="#e6f1fb" >������ע</td>
       </tr>
       <tr>
        <td width="20%" class="align_c" style="padding-top:5px;padding-bottom:5px;"><textarea name="infos[memo]" cols="100%" rows="20"><?php echo $infos['memo'];?></textarea></td>
       </tr>
       
       <tr>
        <td class="align_c">   <input type="submit" name="confirms" value="ȷ��" />  <input name="" type="reset" /></td>
       </tr>
       </table>    
  </form>
     </div>        
   </div>
  </div>  </div><?php include template('member','footer'); ?>
</body>
</html>