<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('member','header'); ?>
<div class="container">
  
  <div class="content" id="top_t">
  <ul id="menu">
            <li class="sec1"><a href="../member">�ҵ���ҳ</a></li>
            <li class="sec1"><a href="../member/index.php?template=order">��������</a></li>
            <li class="sec2"><a href="../member/index.php?template=pay&type=amount">�������</a></li>
            <li class="sec1"><a href='index.php?template=account'>�˻�����</a></li>
        </ul>
        
        <ul id="main">
        <li class=block id="m_left">
                       
      <dl class='bitem'>
        <dt onClick='showHide("items3_1")'><b>�������</b></dt>
        <dd style='display:block' class='sitem' id='items3_1'>
          <div class='sitemu'>
            <p><a href='../member/index.php?template=online'>����֧��</a></p>
            <p><a href='../member/index.php?template=bank'>���л��</a></p>
            <p><a href='../member/index.php?template=buypoint'>�������</a></p>
            <p><a href='../member/index.php?template=verified'>���ȷ��</a></p>
            <p><a href='../member/index.php?template=card'>�㿨��ֵ</a></p>
            <p><a href='../member/index.php?template=onlinerecord'>֧����¼</a></p>
            <p><a href='../member/index.php?template=useramount'>����¼</a></p>
            <p><a href='../member/index.php?template=pay&type=amount'>���׼�¼</a></p>
          </div>
        </dd>
      </dl>
                 
               </li>
               <li class=unblock id="m_left"></li>
               
              
               </ul>
                <div id="m_right">
                  <ul class="my_nav" id="top_t">
                    <li class="sec_2">���׼�¼</li>
                  </ul>
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td bgcolor="#e6f1fb" class="align_l">�� ����״̬</td>
      </tr>
      <tr>
       <td width="25%" class="align_c">
             <input type="radio" onclick="goUrl(1)"  value="amount" name="type" <?php if($type==amount) { ?>checked="checked"<?php } ?>/> �ʽ� 
             <input type="radio" onclick="goUrl(2)"  value="point" name="type" <?php if($type==point) { ?>checked="checked"<?php } ?>/> ����</td>
      
      </tr> 
      
       </table>
         <form action="" method="post" >
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td bgcolor="#e6f1fb" class="align_c" width="20%">����ʱ��</td>
      <td bgcolor="#e6f1fb" class="align_c">��������</td>
      <td bgcolor="#e6f1fb" class="align_c">���׽��</td>
      <td bgcolor="#e6f1fb" class="align_c">��������</td>
      </tr>

<?php $ARRAY = get("SELECT * FROM `phpjsj_pay_exchange` WHERE `type` = '$type' AND `userid` = '$user_id' ORDER BY  `time` DESC", 20, $page, "", "", "","","0");$DATA=$ARRAY['data'];$total=$ARRAY['total'];$count=$ARRAY['count'];$pages=$ARRAY['pages'];unset($ARRAY);foreach($DATA AS $n=>$r){$n++;?>
<tr>
      <td width="25%" class="align_c"><?php echo $r['time'];?></td> 
      <td class="align_c"><?php if(substr($r[number],0,1)=="-" ) { ?><font color="#006600">�ۿ�</font><?php } else { ?><font color="#FF0000">���</font><?php } ?></td>
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