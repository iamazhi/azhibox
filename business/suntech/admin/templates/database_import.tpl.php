<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<script >
function CheckedRev(fieldid, titleid)
{
	var fieldids = '#'+fieldid;
    var titleids = '#'+titleid;
    var inputfieldids = 'input[boxid='+fieldid+']';
    if($(fieldids).attr('checked')==false)
    {
        $(inputfieldids).attr('checked',true);
        $(titleids).val("ȡ��ȫѡ");

    }
    else
    {
        $(inputfieldids).attr('checked',false);
        $(titleids).val("ȫѡ");
    }
}
</script>
<body>
<form method="post" id="myform" name="myform" >
<table cellpadding="0" cellspacing="1" class="table_list">
	<caption>
	phpweb���ݵ�SQL�ļ�
	</caption>
	<tr>
		<th width="8%">ѡ��</th>
		<th>�ļ���</th>
		<th width="10%">�ļ���С</th>
		<th width="20%">����ʱ��</th>
		<th width="10%">���</th>
		<th width="15%">����</th>
	</tr>
<?php
if(is_array($infos)){
	foreach($infos as $id => $info){
$id++;
?>
  <tr bgcolor="<?=$info['bgcolor']?>" >
    <td class="align_c"><input type="checkbox" name="filenames[]" value="<?=$info['filename']?>" id="sql_phpcms" boxid="sql_phpcms"></td>
    <td><a href="?file=<?=$file?>&action=down&filename=<?=$info['filename']?>"><?=$info['filename']?></a></td>
    <td class="align_c"><?=$info['filesize']?> M</td>
	<td class="align_c"><?=$info['maketime']?></td>
    <td class="align_c"><?=$info['number']?></td>
    <td class="align_c">
	<a href="?file=<?=$file?>&action=<?=$action?>&pre=<?=$info['pre']?>&dosubmit=1">����</a> |
	<a href="?file=<?=$file?>&action=down&filename=<?=$info['filename']?>">����</a>
	</td>
</tr>
<?php
	}
}
?>
</table>
<div class="button_box" style="padding-left:20px">
<input name='phpcms_all' title="ȫ��" type='button' id='phpcms_all' onClick="CheckedRev('sql_phpcms','phpcms_all')"  value="ȫѡ" />
&nbsp;&nbsp;
	<select name="tocharset">
	<option value="">�������ַ���ת��</option>
	<option value="gbk2utf-8">GBK ת UTF-8</option>
	<option value="utf-82gbk">UTF-8 ת GBK</option>
	<option value="big52utf-8">BIG5 ת UTF-8</option>
	<option value="utf-82big5">UTF-8 ת BIG5</option>
	</select>
	<input type="submit" name="submit1" value=" �ַ���ת�� " title="ת����Ϻ������ַ���Ϊǰ׺����" onClick="document.myform.action='?file=<?=$file?>&action=changecharset'">
&nbsp;&nbsp;
    <input type="submit" name="submit2" value=" ɾ��ѡ�еı��� " onClick="document.myform.action='?file=<?=$file?>&action=delete'">
</div>
</form>

<form method="post" name="myform1" id="myform1" action="?file=<?=$file?>&action=delete">
<table cellpadding="0" cellspacing="1" class="table_list">
    <caption>��phpcms���ݵ�SQL�ļ�</caption>
	<tr>
	<th>ѡ��</th>
	<th>ID</th>
	<th>�ļ���</th>
	<th>�ļ���С</th>
	<th>����ʱ��</th>
	<th>����</th>
	</tr>
<?php
if(is_array($others)){
	foreach($others as $id => $other){
$id++;
?>
  <tr>
    <td class="align_c">
    <input type="checkbox" name="filenames[]" value="<?=$other['filename']?>" id="sql_other" boxid="sql_other">
	</td>
    <td><?=$id?></td>
    <td><a href="?file=<?=$file?>&action=down&filename=<?=$other['filename']?>"><?=$other['filename']?></a></td>
    <td><?=$other['filesize']?> M</td>
	<td><?=$other['maketime']?></td>
    <td class="align_c">
	<a href="?file=<?=$file?>&action=<?=$action?>&filename=<?=$other['filename']?>&dosubmit=1">����</a> |
	<a href="?file=<?=$file?>&action=down&filename=<?=$other['filename']?>">����</a>
	</td>
</tr>
<?php
	}
}
?>
</table>
<div class="button_box" style="padding-left:20px">
<input name='other_all' type='button' id='other_all' onClick="CheckedRev('sql_other','other_all')"  value="ȫѡ" />
&nbsp;&nbsp;
   <select name="tocharset">
	<option value="">�������ַ���ת��</option>
	<option value="gbk2utf-8">GBK ת UTF-8</option>
	<option value="utf-82gbk">UTF-8 ת GBK</option>
	<option value="big52utf-8">BIG5 ת UTF-8</option>
	<option value="utf-82big5">UTF-8 ת BIG5</option>
	</select>
	<input type="submit" name="submit1" value=" �ַ���ת�� " title="ת����Ϻ������ַ���Ϊǰ׺����" onClick="document.myform1.action='?file=<?=$file?>&action=changecharset'">
&nbsp;&nbsp;
    <input type="submit" name="submit2" value=" ɾ��ѡ�еı��� " onClick="document.myform1.action='?file=<?=$file?>&action=delete'">
</div>
</form>

<form name="upload" method="post" action="?file=<?=$file?>&action=uploadsql" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="1" class="table_form">
    <caption>�ϴ����ݿⱸ���ļ�</caption>
  <tr>
    <td>
	        �ϴ�SQL�ļ���
             <input name="uploadfile" type="file" size="25">
             <input type="hidden" name="MAX_FILE_SIZE" value="4096000">
             <input type="submit" name="submit" value=" �ϴ� "><br>ֻ�����ϴ�SQL��ʽ���ļ����ϴ��ɹ����ļ����Զ��ڱ����ļ��б�����ʾ
	</td>
  </tr>
</table>
</form>
<?php if(!function_exists("mb_convert_encoding")){ ?>
<table cellpadding="0" cellspacing="1" class="table_info">
  <caption>��ʾ��Ϣ</caption>
  <tr>
    <td>ǿ�ҽ���������PHP��mb_string��չ������˲���ʮ��������Դ�����ԶԴ���1M���ļ������ַ���ת������</td>
  </tr>
</table>
<?php } ?>
</body>
</html>