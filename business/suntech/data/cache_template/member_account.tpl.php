<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('member','header'); ?>
<div class="container">
  
  <div class="content" id="top_t">
  <ul id="menu">
            <li class="sec1"><a href="../member">�ҵ���ҳ</a></li>
            <li class="sec1"><a href="../member/index.php?template=order">��������</a></li>
            <li class="sec1"><a href="../member/index.php?template=pay&type=amount">�������</a></li>
            <li class="sec2"><a href='index.php?template=account'>�˻�����</a></li>
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
                      
               </li>
               <li class=unblock id="m_left"></li>
               
              
               </ul>
                 <div id="m_right">
                  <ul class="my_nav" id="top_t">
                    <li class="sec_2">������֤</li>
                  </ul>
                  <div class="info_box">
                    <div class="g_l_box"><img src="../style/images/member_g.gif" /></div>
    <div class="g_r_box">
       <ul class="l_box"><span>��ӭ����<?php echo $username;?></span>
       <li>�˻���<font class="font_orange f_c"><?php echo $info['amount'];?></font>Ԫ</li>
       <li>���û��֣�<?php echo $info['point'];?></li>
       </ul>
    </div>
    
   <div class="g_r_box" id="top_t">
     <p>������õȼ���</p>
     <p>���ε�½IP��<?php echo $info['lastloginip'];?>    ����ʱ�䣺<?php echo date("Y-m-d H:i:s",$info[lastlogintime]);?></p>

        </div>
      </div>       
    </div>
  </div>  
<?php include template('member','footer'); ?>
</body>
</html>