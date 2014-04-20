<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('member','header'); ?>
<div class="container">
  
  <div class="content" id="top_t">
  <ul id="menu">
            <li class="sec1"><a href="../member">我的首页</a></li>
            <li class="sec1"><a href="../member/index.php?template=order">订单管理</a></li>
            <li class="sec2"><a href="../member/index.php?template=pay&type=amount">财务管理</a></li>
            <li class="sec1"><a href='index.php?template=account'>账户管理</a></li>
        </ul>
        
        <ul id="main">
        <li class=block id="m_left">
                       
      <dl class='bitem'>
        <dt onClick='showHide("items3_1")'><b>财务管理</b></dt>
        <dd style='display:block' class='sitem' id='items3_1'>
          <div class='sitemu'>
            <p><a href='../member/index.php?template=online'>在线支付</a></p>
            <p><a href='../member/index.php?template=bank'>银行汇款</a></p>
            <p><a href='../member/index.php?template=buypoint'>购买点数</a></p>
            <p><a href='../member/index.php?template=verified'>汇款确认</a></p>
            <p><a href='../member/index.php?template=card'>点卡充值</a></p>
            <p><a href='../member/index.php?template=onlinerecord'>支付记录</a></p>
            <p><a href='../member/index.php?template=useramount'>汇款记录</a></p>
            <p><a href='../member/index.php?template=pay&type=amount'>交易记录</a></p>
          </div>
        </dd>
      </dl>
                 
               </li>
               <li class=unblock id="m_left"></li>
               
              
               </ul>
                <div id="m_right">
                  <ul class="my_nav" id="top_t">
                    <li class="sec_2">银行汇款</li>
                  </ul>
      <form action="" method="post">
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td bgcolor="#e6f1fb" class="align_l">　 银行汇款</td>
      </tr>
      <tr>
       <td><?php echo $payment['pay_desc'];?></td>
      </tr> 
      <tr>
       <td>收款人信息：姓名 ××× ；地址 ××× ；邮编 ××× 。注意事项： 请在汇款单背面的附言中注明您的订单号，只填写后6位即可。</td>
      </tr>
      
       </table>
       
      </form>
     </div>        
   </div>
  </div>
<?php include template('member','footer'); ?>
</body>
</html>