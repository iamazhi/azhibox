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
                    <li class="sec_2"> 在线支付记录</li>
                  </ul>
      <form action="" method="post" name="">
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td bgcolor="#e6f1fb" width="10%" class="align_c">支付号</td>
      <td bgcolor="#e6f1fb" width="9%"class="align_c">支付方式</td>
      <td bgcolor="#e6f1fb" width="10%"class="align_c">申请时间</td>
      <td bgcolor="#e6f1fb" width="10%"class="align_c">审核时间</td>
      <td bgcolor="#e6f1fb" width="9%"class="align_c">充值金额</td>
      <td bgcolor="#e6f1fb" width="25%" class="align_c">会员备注</td>
      <td bgcolor="#e6f1fb" width="9%"class="align_c">状态</td>
      </tr>
<?php $ARRAY = get("SELECT * FROM `phpjsj_pay_user_account` WHERE `userid` = '$user_id' AND `type` = '1' ORDER BY  `addtime` DESC", 20, $page, "", "", "","","0");$DATA=$ARRAY['data'];$total=$ARRAY['total'];$count=$ARRAY['count'];$pages=$ARRAY['pages'];unset($ARRAY);foreach($DATA AS $n=>$r){$n++;?>
      <tr>
       <td width="20%" class="align_c"><?php echo $r['sn'];?></td>
       <td width="15%"class="align_c"><?php echo $r['payment'];?></td>
       <td class="align_c"><?php echo date("Y-m-d",$r[addtime]);?></td>
       <td class="align_c"><?php if($r[paytime]!=0) { ?><?php echo date("Y-m-d",$r[paytime]);?><?php } ?></td>
       <td class="align_c"><?php if($r[type]==0) { ?><?php echo $r['amount'];?><?php } else { ?><?php echo $r['quantity'];?><?php } ?></td>
       <td class="align_c"><?php echo $r['usernote'];?></td>
       <td class="align_c"><?php if($r[ispay]==1) { ?><font color="#FF0000">审核</font><?php } else { ?>未审核<?php } ?></td>
      </tr> 
<?php } unset($DATA); ?>
</table>
<div style="width:100%; text-align:center"><?php echo $pages;?></div>
      </form>
     </div>        
   </div>
  </div>
<?php include template('member','footer'); ?>
</body>
</html>