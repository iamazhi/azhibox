<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('member','header'); ?>
<div class="container">
  
  <div class="content" id="top_t">
  <ul id="menu">
            <li class="sec1"><a href="../member">�ҵ���ҳ</a></li>
            <li class="sec1"><a href="../member/index.php?template=order">��������</a></li>
            <li class="sec1"><a href="../member/index.php?template=pay&type=amount">�������</a></li>
            <li class="sec2"><a href='index.php?template=account'>�˻�����</a></li>
        </ul>
        
        <ul id="main">
               <li class=block id="m_left">
                 
<dl class='bitem'>
        <dt onClick='showHide("items1_1")'><b>��������</b></dt>
        <dd style='display:block' class='sitem' id='items1_1'>
          <div class='sitemu'>
            <p><a href='index.php?template=account'>�˻�����</a></p>
            <p><a href='index.php?template=modify' >�޸�����</a></p>
            <p><a href='index.php?template=pwd'>�޸�����</a></p>
            <p><a href='../' target='_blank'>������ҳ</a></p>
          </div>
        </dd>
      </dl>
                 
               </li>
               <li class=unblock id="m_left"></li>
               
              
               </ul>

<div id="m_right">
                  <ul class="my_nav" id="top_t">
                    <li class="sec_2">�޸�����</li>
                  </ul>
                  <form action="" method="post">
                  
    <table cellpadding="0" cellspacing="1" class="table_list">
                  <tr>
                    <td class="align_r" width="20%">�û�����</td>
                    <td><?php echo $username;?></td>
                  </tr>
                  <tr>
                    <td class="align_r">ԭ���룺</td>
                    <td><input type="password"  name="old_password" require="true" datatype="limit" min="6" max="16" msg="���벻������6���ַ��򳬹�16���ַ���" /></td>
                  </tr> 
                  <tr>
                    <td class="align_r">�����룺</td>
                    <td><input type="password"  name="new_password" id="new_password" size="30" require="true" datatype="limit" min="6" max="16" msg="���벻������6���ַ��򳬹�16���ַ���" /></td>
                  </tr>
                 <tr>
                 <td></td>
                 <td><div class="pw_box">
<div id="pw_check_1" class="pw_check" style="display:none;"><span><strong class="c_orange">��</strong></span><span>��</span><span>ǿ</span></div>
<div id="pw_check_2" class="pw_check" style="display:none;"><span>��</span><span><strong class="c_orange">��</strong></span><span>ǿ</span></div>
<div id="pw_check_3" class="pw_check" style="display:none;"><span>��</span><span>��</span><span><strong class="c_orange">ǿ</strong></span></div>
            </div></td>
                 </tr>
                  <tr>
                    <td class="align_r">ȷ�������룺</td>
                    <td><input type="password" name="chk_password" id="chk_password"  size="30" require="true" datatype="limit|repeat"  min="6" max="16" to="new_password" msg="���벻������6���ַ��򳬹�16���ַ�|������������벻һ��" /></td>
                  </tr>
                  <tr>
                    <td class="align_r"></td>
                    <td><input type="submit" name="submit" value="ȷ��" />  <input name="" value="����"type="reset" /></td>
                  </tr>
                  </table>
  </form>
   
       
       </div>
  </div>
</div>
<?php include template('member','footer'); ?>
</body>
</html>
<script language="javascript">
$().ready(function() {
$('form').checkForm(1);
});


function CharMode(iN)
{
if (iN>=65 && iN <= 90)
return 2;
if (iN>=97 && iN <= 122)
return 4;
else
return 1;
}

function bitTotal(num)
{
modes = 0;
for(i=0; i<3; i++)
{
if (num & 1) modes++;
num >>>= 1;
}
return modes;
}

function checkStrong(sPW){
Modes=0;

for (i=0;i<sPW.length;i++){
Modes|=CharMode(sPW.charCodeAt(i));
}
var btotal = bitTotal(Modes);
if (sPW.length >= 10) btotal++;
switch(btotal) {
case 1:
return "pw_check_1";
break;
case 2:
return "pw_check_2";
break;
case 3:
return "pw_check_3";
break;
default:
return "pw_check_1";
}
}

function ShowStrong(){
data = checkStrong($('#new_password').val());
pw_id = '#' + data;
$(".pw_check").hide();
$(pw_id).show();
}

$('#new_password').blur(function(){
 ShowStrong();
});
</script>