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
                 <form action="?action=add" method="post">
    <input type="hidden" name="d[contentid]" value="<?php echo $d['contentid'];?>/" />

    <input type="hidden" value="<?php echo $d['areaid'];?>" name="d[areaid]" />
    <input type="hidden" value="<?php echo $d['consignee'];?>" name="d[consignee]" />
    <input type="hidden" value="<?php echo $d['telephone'];?>" name="d[telephone]" />
    <input type="hidden" value="<?php echo $d['mobile'];?>" name="d[mobile]" />
    <input type="hidden" value="<?php echo $d['address'];?>" name="d[address]" />
    <input type="hidden" value="<?php echo $d['postcode'];?>" name="d[postcode]" />
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td colspan="6" bgcolor="#e6f1fb" class="align_c">订单信息</td>
      </tr>
<?php $ARRAY = get("SELECT * FROM phpjsj_content a,phpjsj_c_product b WHERE a.contentid = '$contentid' AND a.contentid = b.contentid ", 20, $page, "", "", "","","0");$DATA=$ARRAY['data'];$total=$ARRAY['total'];$count=$ARRAY['count'];$pages=$ARRAY['pages'];unset($ARRAY);foreach($DATA AS $n=>$r){$n++;?>
<tr >
  <td width="20%" class="align_r">产品ID：</td>
  <td colspan="5" class="align_l">content_<?php echo $r['contentid'];?></td>
</tr>
<tr >
  <td class="align_r">产品名称：</td>
  <td colspan="5" class="align_l"><a href="../<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a></td>
</tr>
<tr >
  <td class="align_r">* 订购数量：</td>
  <td colspan="5" class="align_l"><?php echo $number;?></td>
</tr>
<tr >
      <td class="align_r" >给卖家留言：</td>
      <td colspan="5" class="align_l><?php echo $note;?></td>
      </tr>
<?php } unset($DATA); ?>
</table>


   
<?php $DATA = get("SELECT * FROM phpjsj_order_deliver a, phpjsj_area b WHERE a.userid = '$user_id' AND a.areaid = b.areaid", 100, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
<table cellpadding="0" cellspacing="1" id="newdeliver"  class="table_form">
    <caption>新增收货地址</caption>
  <tr>
        <td width="15%" class="align_r"><font color="red">*</font> 配送区域：</td>
        <td>
<?php $DATA = get("SELECT * FROM `phpjsj_area` WHERE `areaid` = '$d[areaid]' ORDER BY  `areaid` DESC", 1, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
<?php echo $r['name'];?>
<?php } unset($DATA); ?>
          </td> 
      </tr>
      <tr>
        <td class="align_r"><font color="red">*</font> 收货人：</td>
        <td> <?php echo $d['consignee'];?></td>
      </tr>
  <tr>
        <td class="align_r"><font color="red">*</font> 电话：</td>
        <td> <?php echo $d['telephone'];?></td>
    </tr>
  <tr>
        <td class="align_r"><font color="red">*</font> 手机：</td>
        <td> <?php echo $d['mobile'];?></td> 
      </tr>
  <tr>
        <td class="align_r"><font color="red">*</font> 地址：</td>
        <td> <?php echo $d['address'];?></td>       
      </tr>
      <tr>
        <td class="align_r"><font color="red">*</font> 邮编：</td>
        <td> <?php echo $d['postcode'];?></td>       
      </tr>
</table>
<?php } unset($DATA); ?>
<div class="button_box" style="padding-left:10px"><input type="submit" name="dosubmit" value=" 确认订单 " /></div>
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
$.get("load.php", { field: 'areaid', id: id }, function(data){
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