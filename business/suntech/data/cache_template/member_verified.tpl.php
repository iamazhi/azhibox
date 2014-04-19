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
                    <li class="sec_2">汇款申请信息</li>
                  </ul>
      <form action="" method="post">
      <table cellpadding="0" cellspacing="1" class="table_list">
      
      <tr>
       <td width="25%" class="align_r">类　型：</td>
       <td>
           <input type="radio" name="infos[payment]" value="银行汇款/转帐" id="RadioGroup1_0" checked="checked"/>银行汇款/转帐<Br/>
          
           <input type="radio" name="infos[payment]" value="邮局汇款" id="RadioGroup1_1" />邮局汇款
           </td>
      </tr> 
      <tr>
       <td class="align_r">E-mail：</td>
       <td><input type="text" name="infos[email]"value="<?php echo $info['email'];?>" require="true" datatype="email" msg="邮件格式不正确" /></td>
      </tr>
      
      <tr>
       <td class="align_r"><font color="red">*</font> 姓 名：</td>
       <td><input type="text" name="infos[contactname]" value="<?php echo $username;?>" require="true" datatype="limit" min="2" max="20" msg="姓名不得少于2个字符超过20个字符" msgid = "name"/> <span id="name" ></span></td>
      </tr>
      
      <tr>
       <td class="align_r">电 话：</td>
       <td><input type="text" name="infos[telephone]" value="<?php echo $info['telephone'];?>"/></td>
      </tr>
      
      <tr>
       <td class="align_r"><font color="red">*</font> 金 额：</td>
       <td><input type="text" name="infos[amount]" id="amount" size="15" require="true" datatype="number" msg="请输入金额" msgid="msgid"/>&nbsp;元 <span id="msgid"></span></td>
      </tr>
      
      <tr>
       <td class="align_r">备 注：</td>
       <td><textarea name="setting[usernote]"  id="usernote" rows="5" cols="28" value= "88ctw" ></textarea></td>
      </tr>
      
      <tr>
       <td class="align_r"></td>
       <td>  <input type="submit" name="confirms"  value="确认"/>  </td>
      </tr>
      
       </table>
       
      </form>
     </div>        
   </div>
  </div>
<?php include template('member','footer'); ?>
</body>
</html>