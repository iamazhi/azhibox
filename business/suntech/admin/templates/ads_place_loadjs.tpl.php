<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<form method="post" name="myform">
<table cellpadding="0" cellspacing="0" class="table_form" align="center">
<tr>
<caption><?php echo $loadadsplace['placename']; ?>&nbsp;���λ�������</caption>
</tr>
<tr>
<td height="60">
<b>����˵����</b><br />
1�����÷�ʽһ�Է���������������Ҫ�󣬿�ͳ�ƹ��չʾ�������Զ��жϹ���Ƿ���ڣ��������ķ�������Դ�������ٶ�������֧��Google��JS������棻<br />
2�����÷�ʽ���Է���������������Ҫ�����ķ�������Դ�٣������ٶȿ죬���ǲ���ͳ�ƹ��չʾ�������Զ��жϹ����Ч�ڣ���֧��Google��JS������棻<br />
3��shtml�������ķ�������Դ�٣������ٶȿ죬֧��Google��JS������棬���ǲ���ͳ�ƹ��չʾ�������Զ��жϹ����Ч�ڣ���Ҫ������֧��shtml���������վ��������ֵ��÷�ʽ���������վ����ҳ��׺Ϊ.html������Ҫ���÷�������.html��׺����ҳҲ֧��Ƕ�빦�ܣ�<a href="http://help.phpcms.cn/2007/0529/help_614.html" target="_blank" style="color:blue">�������˽�shtml���� >></a><br />
4�������������ѡ��һ�ֵ��÷�ʽ��Ȼ��ѵ��ô��븴��ճ������Ҫ��ʾ����ģ���ٸ��������ҳ���ɡ�
</td>
</tr>
<tr>
<td>���÷�ʽһ��JS���ô��루PHP��̬���ã�<font color='red'>�˷�ʽ����ͳ��չʾ����,�������ֲ�����!</font></td>
</tr>
<tr>
<td  height="60" align="center"><input name="jscode1" id="jscode1" value='<script language="javascript" src="<?=SITE_URL?>data/js.php?id=<?=$placeid?>"></script>' size="100">
<br><input type="button" onclick="$('#jscode1').select();document.execCommand('Copy');" value=" ���ƴ����������� ">
&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onclick="window.open('?file=ads_place&action=view&placeid=<?=$placeid?>');" value="Ԥ�����λ"></td>
</tr>
<tr>
<td>���÷�ʽ����JS���ô��루JS��̬���ã�</td>
</tr>
<tr>
<td height="60" align="center"><input name="jscode2" id="jscode2" value='<script language="javascript" src="<?=SITE_URL?>data/js/<?=$placeid?>.js"></script>' size="100">
<br><input type="button" onclick="$('#jscode2').select();$('#jscode2').val().execCommand('Copy');" value=" ���ƴ����������� ">
&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onclick="window.open('?file=ads_place&action=view&placeid=<?=$placeid?>');" value="Ԥ�����λ"></td>
</tr>
<tr>
<td class="tablerowhighlight">���÷�ʽ����shtmlǶ����� </td>
</tr>
<tr>
<td  height="100" align="center">
<textarea name="shtmlcode" cols="100" rows="5">{if defined('CREATEHTML')}
<!--#include virtual="<?=PHP_ROOT?>data/js/<?=$placeid?>.html"-->
{else}
{include PHP_ROOT.'/data/js/<?=$placeid?>.html'}
{/if}</textarea>
<br><input type="button" onclick="document.all.shtmlcode.select();document.execCommand('Copy');" value=" ���ƴ����������� ">
&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onclick="window.open('?file=ads_place&action=view&placeid=<?=$placeid?>');" value="Ԥ�����λ"></td>
</tr>
</table>
</form>
</body>
</html>