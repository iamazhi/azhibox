<?php include PHPSIN_PATH.'install/step/header.tpl.php';?>
<script type="text/javascript">
  $(document).ready(function() {
	$.formValidator.initConfig({autotip:true,formid:"install",onerror:function(msg){}});
	$("#username").formValidator({onshow:"2��20���ַ��������Ƿ��ַ���",onfocus:"�������û���3��20λ"}).inputValidator({min:3,max:20,onerror:"�û�������ӦΪ3��20λ"})
	$("#password").formValidator({onshow:"6��20���ַ�<font color='FFFF00'>��Ĭ��Ϊ phpsin��</font>",onfocus:"����Ϸ�����Ϊ6��20λ"}).inputValidator({min:6,max:20,onerror:"����Ϸ�����Ϊ6��20λ"});
	$("#pwdconfirm").formValidator({onshow:"���ٴ���������",onfocus:"������ȷ������",oncorrect:"����������ͬ"}).compareValidator({desid:"password",operateor:"=",onerror:"�����������벻ͬ"});
		
	$("#email").formValidator({onshow:"������email",onfocus:"������email",oncorrect:"email��ʽ��ȷ"}).regexValidator({regexp:"email",datatype:"enum",onerror:"email��ʽ����"})
	$("#dbhost").formValidator({onshow:"���ݿ��������ַ, һ��Ϊ localhost",onfocus:"���ݿ��������ַ, һ��Ϊ localhost",oncorrect:"���ݿ��������ַ��ȷ",empty:false}).inputValidator({min:1,onerror:"���ݿ��������ַ����Ϊ��"});

  })
</script>
  <div class="warp">
     <div class="header"></div>
     <div class="nav_hd">
       <div class="nav_bz a5">
      </div>
    </div>
     <div class="content">
       <div class="box">
       <div class="l_box"></div>
       <div class="right">
   			<form id="install" name="myform" action="install.php?" method="post">	
			<input type="hidden" name="step" value="6">	
   <fieldset>
  
   <legend>��д���ݿ���Ϣ</legend>
         	<table width="100%" cellspacing="1" cellpadding="0" >
			<tr>
			<th width="20%" align="right" >���ݿ�������</th>
			<td>
			<input name="dbhost" type="text" id="dbhost" value="<?php echo DB_HOST?>" class="input-text" />
			</td>
			</tr>
			<tr>
			<th align="right">���ݿ��ʺţ�</th>
			<td><input name="dbuser" type="text" id="dbuser" value="<?php echo DB_USER?>" class="input-text" /></td>
			</tr>
			<tr>
			<th align="right">���ݿ����룺</th>
			<td><input name="dbpw" type="password" id="dbpw" value="<?php echo $DB_PW?>" class="input-text" /></td>
			</tr>
			<tr>
			<th align="right">���ݿ����ƣ�</th>
			<td><input name="dbname" type="text" id="dbname" value="<?php echo DB_NAME?>" class="input-text" /></td>
			</tr>
			<tr>
			<th align="right">���ݱ�ǰ׺��</th>
			<td><input name="tablepre" type="text" id="tablepre" value="<?php echo DB_PRE?>" class="input-text" />  <img src="./skin/images/help.png" style="cursor:pointer;" title="���һ�����ݿⰲװ���phpcms�����޸ı�ǰ׺" align="absmiddle" />
			<span id='helptablepre'></span></td>
			</tr>
			<tr>
			<th align="right">���ݿ��ַ�����</th>
			<td>
			<input name="dbcharset" type="radio" id="dbcharset" value="" <?php if(strtolower(DB_CHARSET)=='') echo ' checked="checked" '?>/>Ĭ��
			<input name="dbcharset" type="radio" id="dbcharset" value="gbk" <?php if(strtolower(DB_CHARSET)=='gbk') echo '  checked="checked" '?> <?php if(strtolower($charset)=='utf8') echo 'disabled'?>/>GBK
			<input name="dbcharset" type="radio" id="dbcharset" value="utf8" <?php if(strtolower(DB_CHARSET)=='utf8') echo '  checked="checked" '?> <?php if(strtolower($charset)=='gbk') echo 'disabled'?>/>utf8 
			<input name="dbcharset" type="radio" id="dbcharset" value="latin1" <?php if(strtolower(DB_CHARSET)=='latin1') echo ' checked '?> />latin1  
			<img src="./skin/images/help.png" style="cursor:pointer;" title="���Mysql�汾Ϊ4.0.x������ѡ��Ĭ�ϣ�&#10;���Mysql�汾Ϊ4.1.x�����ϣ�����ѡ�������ַ�����һ��ѡGBK��" align="absmiddle" />
			<span id='helpdbcharset'></span>
			</td>
			</tr>
			<tr>
			<th align="right">���ó־����ӣ�</th>
			<td><input name="pconnect" type="radio" id="pconnect" value="1" 
<?php if(DB_PCONNECT==1) echo ' checked '?>/>��&nbsp;&nbsp;
<input name="pconnect" type="radio" id="pconnect" value="0" 
<?php if(DB_PCONNECT==0) echo ' checked '?>/>��
			<img src="./skin/images/help.png" style="cursor:pointer;" title="������ó־����ӣ������ݿ������Ϻ��ͷţ�����һֱ����״̬����������ã���ÿ�����󶼻������������ݿ⣬ʹ�����Զ��ر����ӡ�" align="absmiddle" /><span id='helppconnect'></span>
			<span id='helptablepre'></span></td>
			</tr>
		  </table>
   </fieldset> 
   <fieldset><legend>��ѡģ��</legend><table width="100%" cellspacing="1" cellpadding="0">
			  <tr>
				<th width="20%" align="right">��������Ա�ʺţ�</th>
				<td><input name="username" type="text" id="username" value="phpsin" class="input-text" /></td>
			  </tr>
			  <tr>
				<th align="right">����Ա���룺</th>
				<td><input name="password" type="password" id="password" value="phpsin" class="input-text" /></td>
			  </tr>
			  <tr>
				<th align="right">ȷ�����룺</th>
				<td><input name="pwdconfirm" type="password" id="pwdconfirm" value="phpsin" class="input-text" /></td>
			  </tr>
			  <tr>
				<th align="right">����ԱE-mail��</th>
				<td><input name="email" type="text" id="email" class="input-text" />
					<input type="hidden" name="selectmod" value="admin,phpsin,announce,comment,link,vote,message,mood,poster,formguide,wap,upgrade,tag,sms" />
					<input type="hidden" name="testdata" value="1" />
					<input type="hidden" id="install_phpsin" name="install_phpsin" value="1" />
			  </tr>

			</table>
</fieldset>
   </form>
         </div>
         <div class="clr"></div>
       </div>
       <div style="height:16px; background:url(skin/images/buttom.jpg) no-repeat"></div>
       <div class="btnbox">
       <div class="btn_box"><a href="javascript:history.go(-1);" class="s_btn pre">��һ��</a><a href="javascript:void(0);"  onClick="checkdb();return false;" class="x_btn">��һ��</a></div>
       </div>
     </div>
  </div>
</body>
</html>
<script language="JavaScript">
<!--
var errmsg = new Array();
errmsg[0] = '���Ѿ���װ��Phpsin��ϵͳ���Զ�ɾ�������ݣ��Ƿ������';
errmsg[2] = '�޷��������ݿ���������������ã�';
errmsg[3] = '�ɹ��������ݿ⣬����ָ�������ݿⲻ���ڲ����޷��Զ�����������ͨ��������ʽ�������ݿ⣡';
errmsg[6] = '���ݿ�汾����Mysql 4.0���޷���װPhpsin�����������ݿ�汾��';

function checkdb() 
{
	var url = '?step=dbtest&dbhost='+$('#dbhost').val()+'&dbuser='+$('#dbuser').val()+'&dbpw='+$('#dbpw').val()+'&dbname='+$('#dbname').val()+'&tablepre='+$('#tablepre').val()+'&sid='+Math.random()*5;
    $.get(url, function(data){
		if(data > 1) {
			alert(errmsg[data]);
			return false;
		}
		else if(data == 1 || (data == 0 && confirm(errmsg[0]))) {
			$('#install').submit();
		}
	});
    return false;
}
//-->
</script>