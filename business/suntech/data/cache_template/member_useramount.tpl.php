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
                    <li class="sec_2"> ����¼</li>
                  </ul>
      <form action="" method="post" name="">
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td bgcolor="#e6f1fb" width="10%" class="align_c">֧����</td>
      <td bgcolor="#e6f1fb" width="9%"class="align_c">֧����ʽ</td>
      <td bgcolor="#e6f1fb" width="10%"class="align_c">����ʱ��</td>
      <td bgcolor="#e6f1fb" width="10%"class="align_c">���ʱ��</td>
      <td bgcolor="#e6f1fb" width="9%"class="align_c">��ֵ���</td>
      <td bgcolor="#e6f1fb" width="25%" class="align_c">��Ա��ע</td>
      <td bgcolor="#e6f1fb" width="9%"class="align_c">״̬</td>
      </tr>
<?php $ARRAY = get("SELECT * FROM `phpjsj_pay_user_account` WHERE `userid` = '$user_id' AND `type` != '1' ORDER BY  `addtime` DESC", 20, $page, "", "", "","","0");$DATA=$ARRAY['data'];$total=$ARRAY['total'];$count=$ARRAY['count'];$pages=$ARRAY['pages'];unset($ARRAY);foreach($DATA AS $n=>$r){$n++;?>
      <tr>
       <td width="20%" class="align_c"><?php echo $r['sn'];?></td>
       <td width="15%"class="align_c"><?php echo $r['payment'];?></td>
       <td class="align_c"><?php echo date("Y-m-d",$r[addtime]);?></td>
       <td class="align_c"><?php if($r[paytime]!=0) { ?><?php echo date("Y-m-d",$r[paytime]);?><?php } ?></td>
       <td class="align_c"><?php if($r[type]==0) { ?><?php echo $r['amount'];?><?php } else { ?><?php echo $r['quantity'];?><?php } ?></td>
       <td class="align_c"><?php echo $r['usernote'];?></td>
       <td class="align_c"><?php if($r[ispay]==1) { ?><font color="#FF0000">���</font><?php } else { ?>δ���<?php } ?></td>
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