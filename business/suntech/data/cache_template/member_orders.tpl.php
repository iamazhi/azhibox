<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('member','header'); ?>

<div class="container">
 <div class="content" id="top_t">
  <ul id="menu">
            <li class="sec1"><a href="../member">�ҵ���ҳ</a></li>
            <li class="sec2"><a href="../member/index.php?template=order">��������</a></li>
            <li class="sec1"><a href="../member/index.php?template=pay&type=amount">�������</a></li>
            <li class="sec1"><a href='index.php?template=account'>�˻�����</a></li>
        </ul>
        
        <ul id="main">
               <li class=block id="m_left">
                 
                 
                  <dl class='bitem'>
 
      
       <dt onClick='showHide("items1_1")'><b>��������</b></dt>
        <dd style='display:block' class='sitem' id='items1_1'>
          <div class='sitemu'>
               <p><a href='../member/index.php?template=orderall' >ȫ������</a></p>
               <p><a href='../member/index.php?template=order&status=0'><font color="red">������</font>����</a></p>
               <p><a href='../member/index.php?template=order&status=1'><font color="#FF6600">�Ѹ���</font>����</a></p>
               <p><a href='../member/index.php?template=order&status=2'><font color="#0000FF">�ѷ���</font>����</a></p>
               <p><a href='../member/index.php?template=order&status=3'><font color="#006600">���׳ɹ�</font>����</a></p>
               <p><a href='../member/index.php?template=order&status=4'><font color="#999999">���׹ر�</font>����</a></p>
               <p><a href='index.php?template=order_address' >�ջ���ַ</a></p>
          </div>
        </dd>
        
        
        
    </dl>
                 
               </li>
               <li class=unblock id="m_left"></li>
               
              
               </ul>
                <div id="m_right">
                  <ul class="my_nav" id="top_t">
                    <li class="sec_2">�����µ�<li>
                  </ul>
                 <form action="?action=confirm" method="post">
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td colspan="6" bgcolor="#e6f1fb" class="align_c">������Ϣ</td>
      </tr>
<?php $ARRAY = get("SELECT * FROM phpjsj_content a,phpjsj_c_product b WHERE a.contentid = '$contentid' AND a.contentid = b.contentid ", 20, $page, "", "", "","","0");$DATA=$ARRAY['data'];$total=$ARRAY['total'];$count=$ARRAY['count'];$pages=$ARRAY['pages'];unset($ARRAY);foreach($DATA AS $n=>$r){$n++;?>
<tr >
  <td width="20%" class="align_r">��ƷID��</td>
  <td colspan="5" class="align_l">content_<?php echo $r['contentid'];?><input name="d[contentid]" type="hidden" value="<?php echo $r['contentid'];?>" /></td>
</tr>
<tr >
  <td class="align_r">��Ʒ���ƣ�</td>
  <td colspan="5" class="align_l"><a href="../<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a></td>
</tr>
<tr >
  <td class="align_r">* ����������</td>
  <td colspan="5" class="align_l"><input type="text" name="number" value="1" size="6" require="true" datatype="number" msg="����д��ȷ������" msgid="msg_number"/> ��<span id="msg_number"></span></td>
</tr>
<tr >
      <td class="align_r">���������ԣ�</td>
      <td colspan="5" class="align_l"><textarea name="note" id="note" rows="4" cols="60"></textarea></td>
      </tr>
<?php } unset($DATA); ?>
</table>


  <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td bgcolor="#e6f1fb" class="align_c">����</td>
      <td bgcolor="#e6f1fb" class="align_c">�ջ���</td>
      <td bgcolor="#e6f1fb" class="align_c">��������</td>
      <td bgcolor="#e6f1fb" class="align_c">�绰</td>
      <td bgcolor="#e6f1fb" class="align_c">�ֻ�</td>
      <td bgcolor="#e6f1fb" class="align_c">��ַ</td>
      <td bgcolor="#e6f1fb" class="align_c">�ʱ�</td>
      
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
    <caption>�����ջ���ַ</caption>
  <tr>
        <th width="15%"><font color="red">*</font> ��������</th>
        <td>
            <input type="hidden" name="d[areaid]" id="areaid" value="<?php echo $r['areaid'];?>">
  <span id="load_areaid"></span>
<a href="javascript:areaid_reload();">��ѡ</a>
          </td> 
      </tr>
      <tr>
        <th><font color="red">*</font> �ջ��ˣ�</th>
        <td><input type="text" name="d[consignee]" id="consignee" value="<?php echo $r['consignee'];?>" size="12" require="true" datatype="require" msg="����д�ջ���"/></td>       
      </tr>
  <tr>
        <th><font color="red">*</font> �绰��</th>
        <td><input type="text" name="d[telephone]" id="telephone" value="<?php echo $r['telephone'];?>" size="20" require="true" datatype="phone" regexp="^[d|-|+]{3,20}$"  msg="����д��ȷ�ĵ绰" msgid="telephone_notice"/> ��ʽ��010-10000000-801 <span id="telephone_notice"></span></td>     
      </tr>
  <tr>
        <th><font color="red">*</font> �ֻ���</th>
        <td><input type="text" name="d[mobile]" id="mobile" value="<?php echo $r['mobile'];?>" size="20" require="true" datatype="mobile" msg="����д��ȷ���ֻ�" msgid="mobile_notice"/> ��ʽ��13800000000 <span id="mobile_notice"></span></td>       
      </tr>
  <tr>
        <th><font color="red">*</font> ��ַ��</th>
        <td><input type="text" name="d[address]" id="address" value="<?php echo $r['address'];?>" size="60" require="true" datatype="require" msg="��д��ȷ�ĵ�ַ"/></td>       
      </tr>
      <tr>
        <th><font color="red">*</font> �ʱࣺ</th>
        <td><input type="text" name="d[postcode]" id="postcode" value="<?php echo $r['postcode'];?>" size="8" require="true" /> ��ʽ��100000 </td>       
      </tr>
</table>
<?php } unset($DATA); ?>
<div class="button_box" style="padding-left:10px"><input type="button" name="dosubmit" value="�����ջ���ַ" style="width:100px" onclick="add_deliver();" />&nbsp;&nbsp;<input type="submit" name="next" value=" ��һ�� " /></div>
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