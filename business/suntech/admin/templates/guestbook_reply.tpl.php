<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<body>
<table cellpadding="0" cellspacing="1" class="table_form">
<caption>�ظ�����</caption>
   <form action="?file=guestbook&action=reply&gid=<?=$guestbook['gid']?>&submit=1" method="post" name="myform" onSubmit="return doCheck();">
    <tr> 
      <td class="tablerowhighlight" colspan=2>���⣺<?=$guestbook['title']?> --- [<?=$guestbook['addtime']?>]</td>
   </td>
    <tr> 
      <td  width="30%">
     ���ƣ�<a href=""><?=$guestbook['username']?></a><br>
     QQ��<a href="http://wpa.qq.com/msgrd?V=1&Uin=<?=$guestbook['qq']?>&Site=localhost&Menu=yes" target="_blank"><?=$guestbook['qq']?></a><br>
     �绰��<?=$guestbook['phone']?><br/>
     ��ַ��<?=$guestbook['address']?><br/>
     E-mail��<a href="mailto:<?=$guestbook['email']?>"><?=$guestbook['email']?></a><br>
     �� ҳ��<a href="<?=$guestbook['homepage']?>" target="_blank"><?=$guestbook['homepage']?></a><br>
     IP��<?=$guestbook['ip']?> - <?=$guestbook['country']?>
      </td>
      <td  valign="top">
<?=$guestbook['content']?><p>
<? if($guestbook['reply']) { ?>
<table cellpadding="10" cellspacing="1" border="0" width="96%" bgcolor="#dddddd">
  <tr>
    <td bgcolor="#efefef"><font color="red"><b>����Ա[<?=$guestbook['replyer']?>]��<?=$guestbook['replytime']?>�ظ���</b></font><br>
          <?=$guestbook['reply']?>
</td>
  </tr>
</table>
<? } ?>
     </td>
    </tr>
    <tr> 
      <td>�ظ����ݣ�</td>
      <td>
	  <textarea name="reply" style="display:none" id="reply"><?=$guestbook['reply']?></textarea>
		<?=form::editor("reply","basic",400,500)?>
   </td>
    </tr>
    <tr>
         <td>���أ�</td>
         <td><input type='radio' name='hidden' value='1' <?php if($guestbook['hidden']){?>checked<?php }?>> �� <input type='radio' name='hidden' value='0' <?php if(!$guestbook['hidden']){?>checked<?php }?>> ��</td>
   </tr>
    <tr>
         <td>��׼��</td>
         <td><input type='radio' name='passed' value='1' checked> �� <input type='radio' name='passed' value='0'> ��</td>
   </tr>
    <tr> 
      <td></td>
      <td> <input type="submit" name="Submit" value=" ȷ�� "> 
        &nbsp; <input type="reset" name="Reset" value=" ��� "> </td>
    </tr>
  </form>
</table>
</body>
</html>
