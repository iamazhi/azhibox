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
                    <li class="sec_2">��������</li>
                  </ul>
                 <form action="" method="post" >
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td colspan="2" bgcolor="#e6f1fb" class="align_l">�� �鿴����</td>
      </tr>
      <tr>
       <td width="25%" class="align_r">����״̬��</td>
       <td><?php if($infos[status]==0) { ?><font color="#FF0000">������</font><?php } elseif ($infos[status]==1) { ?><font color="#FF6600">�Ѹ���</font><?php } elseif ($infos[status]==2) { ?><font color="#0000FF">�ѷ���</font><?php } elseif ($infos[status]==3) { ?><font color="#006600">���׳ɹ�</font><?php } else { ?><font color="#666666">���׹ر�</font><?php } ?></td>
      </tr> 
      <tr>
       <td class="align_r">����������</td>
       <td class="f_blue"><a href="../member/index.php?mod=memo&orderid=<?php echo $infos['orderid'];?>">��ע</a></td>
      </tr>     
       </table>
        
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td colspan="2" bgcolor="#e6f1fb" class="align_l">�� ������Ϣ</td>
      </tr>
      
      <tr><td width="25%" class="align_r">����ID��</td> <td><?php echo $infos['orderid'];?></td></tr>
      <tr><td class="align_r ">��Ʒ��</td> <td class="f_blue"><a href="../<?php echo $infos['goodsurl'];?>" target="_blank"><?php echo $infos['goodsname'];?></a></td></tr>
      <tr><td class="align_r">���ۣ�</td> <td><strong><?php echo $infos['price'];?></strong></td></tr>
      <tr><td class="align_r">������</td> <td><?php echo $infos['number'];?></td></tr>
      <tr><td class="align_r">�����</td> <td><font color="#FF0000"><strong><?php echo $infos['amount'];?></strong></font></td></tr>
      <tr><td class="align_r">�µ�ʱ�䣺</td> <td><?php echo $infos['date'];?> <?php echo date("H:i:s",$infos[time]);?></td></tr>
      </table>
      
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td colspan="2" bgcolor="#e6f1fb" class="align_l">�� �ջ���Ϣ</td>
      <tr><td width="25%" class="align_r">�ջ��ˣ�</td> <td><?php echo $infos['consignee'];?></td></tr>
      <tr><td class="align_r">����</td> <td><?php echo $areaid['name'];?></td></tr>
      <tr><td class="align_r">�绰��</td> <td><?php echo $infos['telephone'];?></td></tr>
      <tr><td class="align_r">�ֻ���</td> <td><?php echo $infos['mobile'];?></td></tr>
      <tr><td class="align_r">��ַ��</td> <td><?php echo $infos['address'];?></td></tr>
      <tr><td class="align_r">�ʱࣺ</td> <td><?php echo $infos['postcode'];?></td></tr>
      <tr><td class="align_r">���ԣ�</td> <td><?php echo $infos['note'];?></td></tr>
      </tr>
      </table>
      </form>
     </div>        
   </div>
  </div>
<?php include template('member','footer'); ?>
</body>
</html>