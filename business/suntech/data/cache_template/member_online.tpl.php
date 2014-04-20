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
                    <li class="sec_2">在线支付</li>
                  </ul>
      <form action="" method="post">
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td colspan="2" bgcolor="#e6f1fb" class="align_l">　 在线支付</td>
      </tr>
      <tr>
       <td width="25%" class="align_r">点数余额：</td>
       <td><?php echo $info['point'];?></td>
      </tr> 
      <tr>
       <td class="align_r">资金余额：</td>
       <td><?php echo $info['amount'];?></td>
      </tr>
      <tr>
       <td class="align_r"><font color="red">*</font>充值金额：</td>
       <td><input name="infos[amount]" type="text" id="amount" size="8" require="true"  datatype='currency'  msg='请输入整数或浮点数(格式：0.1)' msgid="msgid" value="" />&nbsp;元&nbsp;<span id="msgid" style="color:#F00"></span></td>
      </tr>
      <tr>
       <td class="align_r">充值方式：</td>
       <td>
<?php $DATA = get("SELECT * FROM `phpjsj_pay_payment` WHERE `pay_code` = 'bank' AND `enabled` = '1'", 20, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
<?php $i=$i+1;?>
      <input type="radio" name="infos[payment]" value="<?php echo $r['pay_name'];?>" id="1_<?php echo $i;?>" <?php if($i==1) { ?> checked="checked" <?php } ?>/><?php echo $r['pay_name'];?><Br/>
<?php } unset($DATA); ?>
</td>
      </tr>
      <tr>
       <td class="align_r">E-mail：</td>
       <td><input type="text" name="infos[email]" value="<?php echo $info['email'];?>" /></td>
      </tr>
      <tr>
       <td class="align_r"><font color="red">*</font>姓 名：</td>
       <td><input type="text" name="infos[contactname]" value="<?php echo $info['username'];?>" require="true" datatype="limit" min="2" max="20" msg=" 姓名不得少于2个字符超过20个字符"/></td>
      </tr>
      <tr>
       <td class="align_r"><font color="red">*</font>电 话：</td>
       <td><input type="text" name="infos[telephone]" value="<?php echo $info['telephone'];?>" require="true" datatype="custom" regexp="(^(((d{3}))|(d{3}-))?13[0-9]d{8}|15[89]d{8}?$)|(^(0[0-9]{2,3}-)?([2-9][0-9]{6,7})+(-[0-9]{1,4})?$)" msg="请输入正确的电话号码" msgid="msgid1"/> 格式：010-88888888或13888888888<span id="msgid1" ></span></td>
      </tr>
      <tr>
       <td class="align_r">备 注：</td>
       <td><textarea name="infos[usernote]" cols="30" rows="10"></textarea></td>
      </tr>
      <tr>
       <td class="align_r"></td>
       <td>  <input type="submit" value="确认" name="confirms"/>  <input name="" type="reset" value="重置"/> </td>
      </tr>
       </table>
       
      </form>
     </div>        
   </div>
  </div>
<?php include template('member','footer'); ?>
</body>
</html>