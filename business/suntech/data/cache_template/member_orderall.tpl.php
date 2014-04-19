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
                    <li class="sec_2">全部订单<li>
                  </ul>
                 <form action="" method="post">
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td bgcolor="#e6f1fb" class="align_c" width="40%">产品</td>
      <td bgcolor="#e6f1fb" class="align_c">数量</td>
      <td bgcolor="#e6f1fb" class="align_c">总金额</td>
      <td bgcolor="#e6f1fb" class="align_c">下单时间</td>
      <td bgcolor="#e6f1fb" class="align_c">状态</td>
      <td bgcolor="#e6f1fb" class="align_c">操作</td>
      </tr>
<?php $ARRAY = get("SELECT * FROM `phpjsj_order` WHERE `userid` = '$user_id' ORDER BY  `time` ASC", 20, $page, "", "", "","","0");$DATA=$ARRAY['data'];$total=$ARRAY['total'];$count=$ARRAY['count'];$pages=$ARRAY['pages'];unset($ARRAY);foreach($DATA AS $n=>$r){$n++;?>
<tr >
      <td class="align_l">  ·<a href="../<?php echo $r['goodsurl'];?>" target="_blank"><?php echo str_cut($r[goodsname],$titlelen);?></a></td>
      <td class="align_c"><?php echo $r['number'];?><?php echo $r['unit'];?></td>
      <td class="align_c"><strong><?php echo $r['amount'];?></strong></td>
      <td class="align_c"><?php echo $r['date'];?> <?php echo date("H:i:s",$r[time]);?></td>
      <td class="align_c"><?php if($r[status]==1) { ?><font color="#FF9900"><strong>已付款</strong></font><?php } elseif ($r[status]==2) { ?><font color="#0000FF">已发货</font><br/><a href="index.php?template=receive&orderid=<?php echo $r['orderid'];?>"><font color="#FF0000">确认收货</font></a><?php } elseif ($r[status]==3) { ?><font color="#006600">交易成功</font><?php } elseif ($r[status]==4) { ?><font color="#999999">交易关闭</font><?php } else { ?><font color="red">待付款<br/><a href="index.php?template=orderid&orderid=<?php echo $r['orderid'];?>">立即付款</a></font><?php } ?></td>
      <td class="align_c"><a href="../member/index.php?template=view&orderid=<?php echo $r['orderid'];?>">查看</a> | <a href="../member/index.php?template=memo&orderid=<?php echo $r['orderid'];?>">备注</a> | <?php if($r[status]==1 or $r[status]==2 or $r[status]==3 or $r[status]==4) { ?><font color="#666666">取消</font><?php } else { ?><a href="../member/index.php?template=status&orderid=<?php echo $r['orderid'];?>">取消</a><?php } ?></td>
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