<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?>
<?php include template('member','header'); ?>
<div class="container">
  
  <div class="content" id="top_t">
  <ul id="menu">
            <li class="sec2"><a href="../member">�ҵ���ҳ</a></li>
            <li class="sec1"><a href="../member/index.php?template=order">��������</a></li>
            <li class="sec1"><a href="../member/index.php?template=pay&type=amount">�������</a></li>
            <li class="sec1"><a href='index.php?template=account'>�˻�����</a></li>
        </ul>
        
        <ul id="main">
               <li class=block id="m_left">
                 
<dl class='bitem'>
        <dt onClick='showHide("items1_1")'><b>��������</b></dt>
        <dd style='display:block' class='sitem' id='items1_1'>
          <div class='sitemu'>
            <p><a href='index.php?template=account'>�˻�����</a></p>
            <p><a href='index.php?template=modify' >�޸�����</a></p>
            <p><a href='index.php?template=pwd'>�޸�����</a></p>
            <p><a href='../' target='_blank'>������ҳ</a></p>
          </div>
        </dd>
      </dl>
      
 <dl class='bitem'>
        <dt onClick='showHide("items2_1")'><b>��������</b></dt>
        <dd style='display:block' class='sitem' id='items2_1'>
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
               <div  id="member_l_box">
 <div class="tx_box"><font class="font_orange f_c">�������ѣ�</font><font class="f_blue">���轻�ף�����թƭ��ע���˻���ȫ!</font></div>
 <div class="g_infobox p_d10">
    <div class="g_l_box"><img src="../style/images/member_g.gif" /></div>
    <div class="g_r_box">
       <ul class="l_box"><span>��ӭ����<?php echo $username;?></span>
       <li>�˻���<font class="font_orange f_c"><?php echo $info['amount'];?></font>Ԫ</li>
       <li>���û��֣�</li>
      
       </ul>
    </div>
    
    <div class="g_r_box" id="top_t">
     <p>���õȼ���</p>
     <p>���ε�½IP��<?php echo $info['lastloginip'];?>    ����ʱ�䣺</p>
     <p><font class="f_c">������ѣ�</font> ȫ������(<strong><?php echo $qb;?></strong>) �Ѹ������Ʒ(<font color="#FF6600"><strong><?php echo $fk;?></strong></font>) �ҵĹ��ﳵ(<font color="red"><strong><?php echo $cc;?></strong></font>)</p>
     </div>
 </div>
 
  <div class="g_infonav ">
   <ul id="a_menu">
       <li class="a_sec2">վ�ڹ���</li>
        </ul>
        
        <ul id="a_main">
               <li class=a_block >{tag_��Ավ�ڹ����}</li>
               </ul>
  </div>
  
  
</div>
</div>
               
  </div>            
  </div>
  
<?php include template('member','footer'); ?>
</body>
</html>