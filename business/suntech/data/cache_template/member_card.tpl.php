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
                    <li class="sec_2">�������</li>
                  </ul>
      <form action="" method="post">
      <table cellpadding="0" cellspacing="1" class="table_list">
      <tr >
      <td colspan="2" bgcolor="#e6f1fb" class="align_l">�� �������</td>
      </tr>
      <tr>
       <td width="25%" class="align_r">������</td>
       <td><?php echo $info['point'];?></td>
      </tr> 
      <tr>
       <td class="align_r">�ʽ���</td>
       <td><?php echo $info['amount'];?></td>
      </tr>
      <tr>
       <td class="align_r"><font color="red">*</font> ���ţ�</td>
       <td>
           <input type="text" size="30" name="infos[card]" require='true' datatype='number'  msg='���鿨���Ƿ�������ȷ' msgid="card"/> <span id="card"></span>
        </td>
      </tr>
      
      <tr>
       <td class="align_r"></td>
       <td>  <input type="submit" value="ȷ��" name="confirms"/>  <input name="" type="reset" value="����"/> </td>
      </tr>
       </table>
       
      </form>
     </div>        
   </div>
  </div>

<?php include template('member','footer'); ?>
</body>
</html>