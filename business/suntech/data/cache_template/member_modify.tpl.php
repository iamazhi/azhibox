<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('member','header'); ?>
<div class="container">
  
  <div class="content" id="top_t">
  <ul id="menu">
            <li class="sec1"><a href="../member">我的首页</a></li>
            <li class="sec1"><a href="../member/index.php?template=order">订单管理</a></li>
            <li class="sec1"><a href="../member/index.php?template=pay&type=amount">财务管理</a></li>
            <li class="sec2"><a href='index.php?template=account'>账户管理</a></li>
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
                  
               </li>
               <li class=unblock id="m_left"></li>
               
              
               </ul>
                 <div id="m_right">
                  <ul class="my_nav" id="top_t">
                    <li class="sec_2">修改资料</li>
                  </ul>
                  <form action="" method="post">
                  
    <table cellpadding="0" cellspacing="1" class="table_list">
                  <tr></tr>
                  <tr>
                    <td class="align_r" width="20%">用户名：</td>
                    <td><?php echo $username;?></td>
                  </tr>
                  <tr>
                    <td class="align_r">E-mail：</td>
                    <td><input type="text" name="email[email]" value="<?php echo $info['email'];?>"></td>
                  </tr> 
                  <tr>
                    <td class="align_r">所在地区：</td>
                    <td><?php echo $str;?></td>
                  </tr>
                  <tr>
                    <td class="align_r">姓名：</td>
                    <td><input type="text" name="is[truename]" value="<?php echo $info['truename'];?>" ></td>
                  </tr>
                  <tr>
                    <td class="align_r">性别：</td>
                    <td>
                        <input type="radio" name="is[gender]" value="1" id="RadioGroup1_0" <?php if($info[gender]==1) { ?> checked="checked" <?php } ?> />
                        男
                        <input type="radio" name="is[gender]" value="2" id="RadioGroup1_1" <?php if($info[gender]==2) { ?> checked="checked" <?php } ?>/>
                        女
                        </td>
                  </tr>
                  <tr>
                    <td class="align_r">生日：</td>
                    <td><input type="text" name="is[birthday]" value="<?php echo $info['birthday'];?>" size="15"></td>
                  </tr>
                  <tr>
                    <td class="align_r">手机：</td>
                    <td><input type="text" name="is[mobile]" value="<?php echo $info['mobile'];?>"></td>
                  </tr>
                  <tr>
                    <td class="align_r">电话：</td>
                    <td><input type="text" name="is[telephone]" value="<?php echo $info['telephone'];?>"></td>
                  </tr>
                  <tr>
                    <td class="align_r">QQ：</td>
                    <td><input type="text" name="is[qq]" value="<?php echo $info['qq'];?>"></td>
                  </tr>
                  <tr>
                    <td class="align_r">MSN：</td >
                    <td><input type="text" name="is[msn]" value="<?php echo $info['msn'];?>"></td>
                  </tr>
                  <tr>
                    <td class="align_r">地址：</td >
                    <td><input type="text" name="is[address]" value="<?php echo $info['address'];?>" size="50"></td>
                  </tr>
                  <tr>
                    <td class="align_r">邮编：</td>
                    <td><input type="text" name="is[postcode]" value="<?php echo $info['postcode'];?>" size="10"></td>
                  </tr>
                  <tr>
                    <td class="align_r"></td>
                    <td><input type="submit" name="submit" value="确定" />  <input name="" value="重置"type="reset" /></td>
                  </tr>
                  </table>
         </form>
       </div>
  </div><?php include template('member','footer'); ?>
</body>
</html>