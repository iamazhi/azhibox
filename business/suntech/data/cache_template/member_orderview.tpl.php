<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('member','header'); ?>
<div class="container">
 <div class="content" id="top_t">
  <ul id="menu">
            <li class="sec1"><a href="../member">我的首页</a></li>
            <li class="sec2"><a href="../member/index.php?template=order">订单管理</a></li>
            <li class="sec1"><a href="../member/index.php?template=pay&type=amount">财务管理</a></li>
            <li class="sec1"><a href='index.php?template=account'>账户管理</a></li>
        </ul>
        
        <ul id="main">
               <li class=block id="m_left">
                 
                 
                  <dl class='bitem'>
 
      
       <dt onClick='showHide("items1_1")'><b>订单管理</b></dt>
        <dd style='display:block' class='sitem' id='items1_1'>
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
                 
               </li>
               <li class=unblock id="m_left"></li>
               
              
               </ul>
               <div id="m_right">
                  <ul class="my_nav" id="top_t">
                    <li class="sec_2">订单处理</li>
                  </ul>
                 <form action="" method="post" >
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td colspan="2" bgcolor="#e6f1fb" class="align_l">　 查看订单</td>
      </tr>
      <tr>
       <td width="25%" class="align_r">交易状态：</td>
       <td><?php if($infos[status]==0) { ?><font color="#FF0000">待付款</font><?php } elseif ($infos[status]==1) { ?><font color="#FF6600">已付款</font><?php } elseif ($infos[status]==2) { ?><font color="#0000FF">已发货</font><?php } elseif ($infos[status]==3) { ?><font color="#006600">交易成功</font><?php } else { ?><font color="#666666">交易关闭</font><?php } ?></td>
      </tr> 
      <tr>
       <td class="align_r">订单操作：</td>
       <td class="f_blue"><a href="../member/index.php?mod=memo&orderid=<?php echo $infos['orderid'];?>">备注</a></td>
      </tr>     
       </table>
        
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td colspan="2" bgcolor="#e6f1fb" class="align_l">　 订单信息</td>
      </tr>
      
      <tr><td width="25%" class="align_r">订单ID：</td> <td><?php echo $infos['orderid'];?></td></tr>
      <tr><td class="align_r ">产品：</td> <td class="f_blue"><a href="../<?php echo $infos['goodsurl'];?>" target="_blank"><?php echo $infos['goodsname'];?></a></td></tr>
      <tr><td class="align_r">单价：</td> <td><strong><?php echo $infos['price'];?></strong></td></tr>
      <tr><td class="align_r">数量：</td> <td><?php echo $infos['number'];?></td></tr>
      <tr><td class="align_r">付款金额：</td> <td><font color="#FF0000"><strong><?php echo $infos['amount'];?></strong></font></td></tr>
      <tr><td class="align_r">下单时间：</td> <td><?php echo $infos['date'];?> <?php echo date("H:i:s",$infos[time]);?></td></tr>
      </table>
      
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td colspan="2" bgcolor="#e6f1fb" class="align_l">　 收货信息</td>
      <tr><td width="25%" class="align_r">收货人：</td> <td><?php echo $infos['consignee'];?></td></tr>
      <tr><td class="align_r">区域：</td> <td><?php echo $areaid['name'];?></td></tr>
      <tr><td class="align_r">电话：</td> <td><?php echo $infos['telephone'];?></td></tr>
      <tr><td class="align_r">手机：</td> <td><?php echo $infos['mobile'];?></td></tr>
      <tr><td class="align_r">地址：</td> <td><?php echo $infos['address'];?></td></tr>
      <tr><td class="align_r">邮编：</td> <td><?php echo $infos['postcode'];?></td></tr>
      <tr><td class="align_r">留言：</td> <td><?php echo $infos['note'];?></td></tr>
      </tr>
      </table>
      </form>
     </div>        
   </div>
  </div>
<?php include template('member','footer'); ?>
</body>
</html>