<?php
defined('IN_PHPJSJ') or exit('Access Denied');
include ('header.tpl.php');
?>
<body>
	<?php
		foreach($alltables as $name=>$tables) if($tables){
	?>
	<table cellpadding="0" cellspacing="1" class="table_list">
	  	<caption><?=$name=='phpwebtables' ? 'phpweb' : '����'?>���ݿⱸ��</caption>
		<form method="post" name="myform<?=$name?>" id="myform<?=$name?>" action="?file=<?=$file?>&action=<?=$action?>&tabletype=<?=$name?>">
		<tr>
			<th width="15%"><a href="###" onClick="javascript:$('input[type=checkbox]').attr('checked', true)">ȫѡ</a>/<a href="###" onClick="javascript:$('input[type=checkbox]').attr('checked', false)">ȡ��</a></th>
			<th>���ݿ��</th>
			<th width="10%">��¼����</th>
			<th width="15%">ʹ�ÿռ�</th>
		</tr>
		<?php
		if(is_array($tables)) foreach($tables as $k => $tableinfo){
		?>
	 	<tr>
		    <td class="align_c"><input type="checkbox" name="tables[]" value="<?=$tableinfo['name']?>" checked /></td>
		    <td class="align_l"><?=$tableinfo['name']?></td>
		    <td class="align_c"><?=$tableinfo['rows']?></td>
			<td class="align_l"><?php echo sizecount($tableinfo['size']);?></td>
		</tr>
		<?php
		}
		?>
	  	<tr>
	    	<td class="tablerowhighlight" colspan=4>�־�������</th>
	  	</tr>
	  	<tr>
		    <td class="align_r">ÿ���־��ļ���С��</td>
		    <td colspan=3><input type=text name="sizelimit" value="2048" size=5> K</td>
	  	</tr>
	   	<tr>
		    <td class="align_r">��������ʽ��</td>
		    <td colspan=3><input type="radio" name="sqlcompat" value="" checked> Ĭ�� &nbsp; <input type="radio" name="sqlcompat" value="MYSQL40"> MySQL 3.23/4.0.x &nbsp; <input type="radio" name="sqlcompat" value="MYSQL41"> MySQL 4.1.x/5.x &nbsp;</td>
	  	</tr>
	   	<tr>
		    <td class="align_r">ǿ���ַ�����</td>
		    <td colspan=3><input type="radio" name="sqlcharset" value="" checked> Ĭ�� &nbsp; <input type="radio" name="sqlcharset" value="latin1"> LATIN1 &nbsp; <input type="radio" name="sqlcharset" value='utf8'> UTF-8</option></td>
	  	</tr>
	  	<tr>
		    <td></td>
		    <td colspan=3><input type="submit" name="dosubmit" value=" ��ʼ�������� "></td>
	  	</tr>
		</form>
	</table>
	<?php
		}
	?>
</body>
</html>