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
                    <li class="sec_2">在线下单<li>
                  </ul>
                 <form action="?action=confirm" method="post">
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td colspan="6" bgcolor="#e6f1fb" class="align_c">订单信息</td>
      </tr>
<?php $ARRAY = get("SELECT * FROM phpjsj_content a,phpjsj_c_product b WHERE a.contentid = '$contentid' AND a.contentid = b.contentid ", 20, $page, "", "", "","","0");$DATA=$ARRAY['data'];$total=$ARRAY['total'];$count=$ARRAY['count'];$pages=$ARRAY['pages'];unset($ARRAY);foreach($DATA AS $n=>$r){$n++;?>
<tr >
  <td width="20%" class="align_r">产品ID：</td>
  <td colspan="5" class="align_l">content_<?php echo $r['contentid'];?><input name="d[contentid]" type="hidden" value="<?php echo $r['contentid'];?>" /></td>
</tr>
<tr >
  <td class="align_r">产品名称：</td>
  <td colspan="5" class="align_l"><a href="../<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a></td>
</tr>
<tr >
  <td class="align_r">* 订购数量：</td>
  <td colspan="5" class="align_l"><input type="text" name="number" value="1" size="6" require="true" datatype="number" msg="请填写正确的数量" msgid="msg_number"/> 个<span id="msg_number"></span></td>
</tr>
<tr >
      <td class="align_r">给卖家留言：</td>
      <td colspan="5" class="align_l"><textarea name="note" id="note" rows="4" cols="60"></textarea></td>
      </tr>
<?php } unset($DATA); ?>
</table>


  <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td bgcolor="#e6f1fb" class="align_c">操作</td>
      <td bgcolor="#e6f1fb" class="align_c">收货人</td>
      <td bgcolor="#e6f1fb" class="align_c">配送区域</td>
      <td bgcolor="#e6f1fb" class="align_c">电话</td>
      <td bgcolor="#e6f1fb" class="align_c">手机</td>
      <td bgcolor="#e6f1fb" class="align_c">地址</td>
      <td bgcolor="#e6f1fb" class="align_c">邮编</td>
      
      </tr>
<?php $DATA = get("SELECT * FROM phpjsj_order_deliver a, phpjsj_area b WHERE a.userid = '$user_id' AND a.areaid = b.areaid", 100, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
 <tr>
                    <td class="align_c" ><input type="radio" name="deliverid" value="3" checked onclick="set_deliverid(this.value);"/></td>
                    <td class="align_c" id="consignee_3"><?php echo $r['consignee'];?></td>
                    <td class="align_c"><?php echo $r['name'];?></td>
                    <td class="align_c"><?php echo $r['telephone'];?></td>
                    <td class="align_c"><?php echo $r['mobile'];?></td>
                    <td class="align_c"><?php echo $r['address'];?></td>
                    <td class="align_c"><?php echo $r['postcode'];?></td>
                    </tr>
<?php } unset($DATA); ?>
                 
                  </table>

<?php $DATA = get("SELECT * FROM phpjsj_order_deliver a, phpjsj_area b WHERE a.userid = '$user_id' AND a.areaid = b.areaid", 100, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
<table cellpadding="0" cellspacing="1" id="newdeliver" style="display:none" class="table_form">
    <caption>新增收货地址</caption>
  <tr>
        <th width="15%"><font color="red">*</font> 配送区域：</th>
        <td>
            <input type="hidden" name="d[areaid]" id="areaid" value="<?php echo $r['areaid'];?>">
  <span id="load_areaid"></span>
<a href="javascript:areaid_reload();">重选</a>
          </td> 
      </tr>
      <tr>
        <th><font color="red">*</font> 收货人：</th>
        <td><input type="text" name="d[consignee]" id="consignee" value="<?php echo $r['consignee'];?>" size="12" require="true" datatype="require" msg="请填写收货人"/></td>       
      </tr>
  <tr>
        <th><font color="red">*</font> 电话：</th>
        <td><input type="text" name="d[telephone]" id="telephone" value="<?php echo $r['telephone'];?>" size="20" require="true" datatype="phone" regexp="^[d|-|+]{3,20}$"  msg="请填写正确的电话" msgid="telephone_notice"/> 格式：010-10000000-801 <span id="telephone_notice"></span></td>     
      </tr>
  <tr>
        <th><font color="red">*</font> 手机：</th>
        <td><input type="text" name="d[mobile]" id="mobile" value="<?php echo $r['mobile'];?>" size="20" require="true" datatype="mobile" msg="请填写正确的手机" msgid="mobile_notice"/> 格式：13800000000 <span id="mobile_notice"></span></td>       
      </tr>
  <tr>
        <th><font color="red">*</font> 地址：</th>
        <td><input type="text" name="d[address]" id="address" value="<?php echo $r['address'];?>" size="60" require="true" datatype="require" msg="填写正确的地址"/></td>       
      </tr>
      <tr>
        <th><font color="red">*</font> 邮编：</th>
        <td><input type="text" name="d[postcode]" id="postcode" value="<?php echo $r['postcode'];?>" size="8" require="true" /> 格式：100000 </td>       
      </tr>
</table>
<?php } unset($DATA); ?>
<div class="button_box" style="padding-left:10px"><input type="button" name="dosubmit" value="新增收货地址" style="width:100px" onclick="add_deliver();" />&nbsp;&nbsp;<input type="submit" name="next" value=" 下一步 " /></div>
  </form>

    
  </div>
  </div>
  </div>

<?php include template('member','footer'); ?>
</body>
</html>
<script language="javascript" type="text/javascript">
$().ready(function() {
    change_deliver('false');
  set_deliverid(deliverid);
    $('form').checkForm(1);
});

var deliverid = '3';
function set_deliverid(deliverid)
{
$('#areaid').val($('#areaid_'+deliverid).val());
$('#areaname').val($('#areaname_'+deliverid).val());
$('#consignee').val($('#consignee_'+deliverid).html());
$('#telephone').val($('#telephone_'+deliverid).html());
$('#mobile').val($('#mobile_'+deliverid).html());
$('#address').val($('#address_'+deliverid).html());
$('#postcode').val($('#postcode_'+deliverid).html());
}

function add_deliver()
{
    $('#newdeliver').show();
    $('#isnewdeliver').val('1');
change_deliver('true');
}

function change_deliver(val)
{
    $('#consignee').attr('require', val);
    $('#telephone').attr('require', val);
    $('#mobile').attr('require', val);
    $('#address').attr('require', val);
    $('#postcode').attr('require', val);
$('form').checkForm(1);
}

function areaid_load(id)
{
$.get("../load.php", { field: 'areaid', id: id }, function(data){
$('#load_areaid').append(data);
});
}

function areaid_reload()
{
$('#load_areaid').html('');
areaid_load(0);
}
areaid_reload();
</script>