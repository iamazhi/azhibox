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
                    <li class="sec_2">���������Ϣ</li>
                  </ul>
      <form action="" method="post">
      <table cellpadding="0" cellspacing="1" class="table_list">
      
      <tr>
       <td width="25%" class="align_r">�ࡡ�ͣ�</td>
       <td>
           <input type="radio" name="infos[payment]" value="���л��/ת��" id="RadioGroup1_0" checked="checked"/>���л��/ת��<Br/>
          
           <input type="radio" name="infos[payment]" value="�ʾֻ��" id="RadioGroup1_1" />�ʾֻ��
           </td>
      </tr> 
      <tr>
       <td class="align_r">E-mail��</td>
       <td><input type="text" name="infos[email]"value="<?php echo $info['email'];?>" require="true" datatype="email" msg="�ʼ���ʽ����ȷ" /></td>
      </tr>
      
      <tr>
       <td class="align_r"><font color="red">*</font> �� ����</td>
       <td><input type="text" name="infos[contactname]" value="<?php echo $username;?>" require="true" datatype="limit" min="2" max="20" msg="������������2���ַ�����20���ַ�" msgid = "name"/> <span id="name" ></span></td>
      </tr>
      
      <tr>
       <td class="align_r">�� ����</td>
       <td><input type="text" name="infos[telephone]" value="<?php echo $info['telephone'];?>"/></td>
      </tr>
      
      <tr>
       <td class="align_r"><font color="red">*</font> �� �</td>
       <td><input type="text" name="infos[amount]" id="amount" size="15" require="true" datatype="number" msg="��������" msgid="msgid"/>&nbsp;Ԫ <span id="msgid"></span></td>
      </tr>
      
      <tr>
       <td class="align_r">�� ע��</td>
       <td><textarea name="setting[usernote]"  id="usernote" rows="5" cols="28" value= "88ctw" ></textarea></td>
      </tr>
      
      <tr>
       <td class="align_r"></td>
       <td>  <input type="submit" name="confirms"  value="ȷ��"/>  </td>
      </tr>
      
       </table>
       
      </form>
     </div>        
   </div>
  </div>
<?php include template('member','footer'); ?>
</body>
</html>