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
                    <li class="sec_2">交易记录</li>
                  </ul>
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td bgcolor="#e6f1fb" class="align_l">　 交易状态</td>
      </tr>
      <tr>
       <td width="25%" class="align_c">
             <input type="radio" onclick="goUrl(1)"  value="amount" name="type" <?php if($type==amount) { ?>checked="checked"<?php } ?>/> 资金 
             <input type="radio" onclick="goUrl(2)"  value="point" name="type" <?php if($type==point) { ?>checked="checked"<?php } ?>/> 点数</td>
      
      </tr> 
      
       </table>
         <form action="" method="post" >
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td bgcolor="#e6f1fb" class="align_c" width="20%">交易时间</td>
      <td bgcolor="#e6f1fb" class="align_c">交易类型</td>
      <td bgcolor="#e6f1fb" class="align_c">交易金额</td>
      <td bgcolor="#e6f1fb" class="align_c">交易事由</td>
      </tr>

<?php $ARRAY = get("SELECT * FROM `phpjsj_pay_exchange` WHERE `type` = '$type' AND `userid` = '$user_id' ORDER BY  `time` DESC", 20, $page, "", "", "","","0");$DATA=$ARRAY['data'];$total=$ARRAY['total'];$count=$ARRAY['count'];$pages=$ARRAY['pages'];unset($ARRAY);foreach($DATA AS $n=>$r){$n++;?>
<tr>
      <td width="25%" class="align_c"><?php echo $r['time'];?></td> 
      <td class="align_c"><?php if(substr($r[number],0,1)=="-" ) { ?><font color="#006600">扣款</font><?php } else { ?><font color="#FF0000">入款</font><?php } ?></td>
      <td width="10%" class="align_c"><?php echo $r['number'];?></td>
      <td class="align_c"><?php echo $r['note'];?></td>
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
<script>
function goUrl(msg)
{
if(msg==1)
{
window.location="index.php?template=pay&type=amount";
}
   if(msg==2)
   {
 window.location="index.php?template=pay&type=point";  
   }
}
</script>