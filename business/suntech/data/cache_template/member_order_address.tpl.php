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
                    <li class="sec_2">管理收货地址</li>
                  </ul>
                
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td bgcolor="#e6f1fb" class="align_c">收货人</td>
      <td bgcolor="#e6f1fb" class="align_c">配送区域</td>
      <td bgcolor="#e6f1fb" class="align_c">电话</td>
      <td bgcolor="#e6f1fb" class="align_c">手机</td>
      <td bgcolor="#e6f1fb" class="align_c">地址</td>
      <td bgcolor="#e6f1fb" class="align_c">邮编</td>
      <td bgcolor="#e6f1fb" class="align_c">操作</td>
      </tr>
<?php $DATA = get("SELECT * FROM phpjsj_order_deliver a, phpjsj_area b WHERE a.userid = '$user_id' AND a.areaid = b.areaid", 100, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
 <tr>
                    <td class="align_c"><?php echo $r['consignee'];?></td>
                    <td class="align_c"><?php echo $r['name'];?></td>
                    <td class="align_c"><?php echo $r['telephone'];?></td>
                    <td class="align_c"><?php echo $r['mobile'];?></td>
                    <td class="align_c"><?php echo $r['address'];?></td>
                    <td class="align_c"><?php echo $r['postcode'];?></td>
                    <td class="align_c"><a href="../member/index.php?template=order_edit&deliverid=<?php echo $r['deliverid'];?>">修改</a> | <a href="../member/index.php?template=order_delete&deliverid=<?php echo $r['deliverid'];?>">删除</a></td>
                  </tr>
<?php } unset($DATA); ?>
                 
                  </table>
    
    <form name="myform"action="" method="post">    
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td colspan="2" bgcolor="#e6f1fb" class="align_l">新增收货地址</td>
      </tr>
                 
                  <tr>
                    <td class="align_r" width="20%">* 配送区域：</td>
                    <td>
<select name="into[areaid]">
<?php $DATA = get("SELECT * FROM `phpjsj_area` ORDER BY  `listorder` DESC", 10, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
<option value="<?php echo $r['areaid'];?>"><?php echo $r['name'];?></option>
<?php } unset($DATA); ?>
</select>
</td>
                  </tr>
                  <tr>
                    <td class="align_r">* 收货人：</td>
                    <td><input type="text" name="into[consignee]"value="<?php echo $info['truename'];?>"/></td>
                  </tr>
                  <tr>
                    <td class="align_r">* 电话：</td>
                    <td><input type="text" name="into[telephone]" value="<?php echo $info['telephone'];?>"/>格式：010-10000000-801 </td>
                  </tr>
                  <tr>
                    <td class="align_r">* 手机：</td>
                    <td><input type="text" name="into[mobile]"value="<?php echo $info['mobile'];?>"/>格式：13800000000 </td>
                  </tr>
                  <tr>
                    <td class="align_r">* 地址：</td>
                    <td><input type="text" name="into[address]"size="50" value="<?php echo $info['address'];?>"/></td>
                  </tr>
                  <tr>
                    <td class="align_r">* 邮编：</td>
                    <td><input type="text" size="8" name="into[postcode]"value="<?php echo $info['postcode'];?>"/></td>
                  </tr>
                  <tr>
                    <td class="align_r"></td >
                    <td><input type="submit" name="address" value="确定" />  <input name="" value="重置"type="reset" /></td>
                  </tr>
                  </table>
  </form>
  </div>
                  
  </div>
  </div><?php include template('member','footer'); ?>
</body>
</html>