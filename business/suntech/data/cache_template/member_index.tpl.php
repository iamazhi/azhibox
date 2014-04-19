<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?>
<?php include template('member','header'); ?>
<div class="container">
  
  <div class="content" id="top_t">
  <ul id="menu">
            <li class="sec2"><a href="../member">我的首页</a></li>
            <li class="sec1"><a href="../member/index.php?template=order">订单管理</a></li>
            <li class="sec1"><a href="../member/index.php?template=pay&type=amount">财务管理</a></li>
            <li class="sec1"><a href='index.php?template=account'>账户管理</a></li>
        </ul>
        
        <ul id="main">
               <li class=block id="m_left">
                 
<dl class='bitem'>
        <dt onClick='showHide("items1_1")'><b>基本操作</b></dt>
        <dd style='display:block' class='sitem' id='items1_1'>
          <div class='sitemu'>
            <p><a href='index.php?template=account'>账户管理</a></p>
            <p><a href='index.php?template=modify' >修改资料</a></p>
            <p><a href='index.php?template=pwd'>修改密码</a></p>
            <p><a href='../' target='_blank'>返回首页</a></p>
          </div>
        </dd>
      </dl>
      
 <dl class='bitem'>
        <dt onClick='showHide("items2_1")'><b>订单管理</b></dt>
        <dd style='display:block' class='sitem' id='items2_1'>
          <div class='sitemu'>
            <p><a href='../member/index.php?template=orderall' >全部订单</a></p>
               <p><a href='../member/index.php?template=order&status=0'><font color="red">待付款</font>订单</a></p>
               <p><a href='../member/index.php?template=order&status=1'><font color="#FF6600">已付款</font>订单</a></p>
               <p><a href='../member/index.php?template=order&status=2'><font color="#0000FF">已发货</font>订单</a></p>
               <p><a href='../member/index.php?template=order&status=3'><font color="#006600">交易成功</font>订单</a></p>
               <p><a href='../member/index.php?template=order&status=4'><font color="#999999">交易关闭</font>订单</a></p>
               <p><a href='index.php?template=order_address' >收货地址</a></p>
          </div>
        </dd>
      </dl>
      
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
               <div  id="member_l_box">
 <div class="tx_box"><font class="font_orange f_c">友情提醒：</font><font class="f_blue">警惕交易，谨防诈骗，注意账户安全!</font></div>
 <div class="g_infobox p_d10">
    <div class="g_l_box"><img src="../style/images/member_g.gif" /></div>
    <div class="g_r_box">
       <ul class="l_box"><span>欢迎您！<?php echo $username;?></span>
       <li>账户余款：<font class="font_orange f_c"><?php echo $info['amount'];?></font>元</li>
       <li>可用积分：</li>
      
       </ul>
    </div>
    
    <div class="g_r_box" id="top_t">
     <p>信用等级：</p>
     <p>本次登陆IP：<?php echo $info['lastloginip'];?>    本次时间：</p>
     <p><font class="f_c">买家提醒：</font> 全部订单(<strong><?php echo $qb;?></strong>) 已付款的物品(<font color="#FF6600"><strong><?php echo $fk;?></strong></font>) 我的购物车(<font color="red"><strong><?php echo $cc;?></strong></font>)</p>
     </div>
 </div>
 
  <div class="g_infonav ">
   <ul id="a_menu">
       <li class="a_sec2">站内公告</li>
        </ul>
        
        <ul id="a_main">
               <li class=a_block >{tag_会员站内公告表}</li>
               </ul>
  </div>
  
  
</div>
</div>
               
  </div>            
  </div>
  
<?php include template('member','footer'); ?>
</body>
</html>