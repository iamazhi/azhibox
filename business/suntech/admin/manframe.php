<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=CHARSET?>">
<title>��̨��ҳ</title>
<script type="text/javaScript" src="images/js/jquery.js"></script>
<style type="text/css">
<!--
.align_l1 {padding-left:5px;text-align:left}
.align_l1 {padding-left:5px;text-align:left}
-->
</style>
</head>
<style type="text/css">
body{
	margin: 0px;
	padding: 0px;
	font-size: 12px;
}
#ManFrame { padding:0 10px;}
caption{*margin-top:10px;
	line-height:25px;
	height:25px;
	text-align:left;
	padding-left:14px;
}
.bdr{
	border:1px solid #b1d0fc;
	clear:both;
}

caption,#ManFrame h3 {
	border:1px solid #99d3fb;
	border-bottom-width:0;
	color:#09459f;
	background:url(admin/skin/images/barbg.gif) repeat-x 0 0;
	height:25px;
	line-height:25px;
	font-size:12px;
	font-family:"����";
	margin-top: 10px;
	margin-right: auto;
	margin-bottom: 0;
	margin-left: auto;
	padding-left: 14px;
}
caption{border-bottom:1px solid #99d3fb !important; border:1px solid #99d3fb; border-

bottom-width:0; font-weight:bold; }
caption span{float:right; padding-right:10px;}

table{background:#99d3fb; margin-top:-5px !important; margin-top:10px; width:100%;}
td{
	background:#fff;
	font-size: 12px;
}
th,td{
	line-height:24px;
	text-align:center;
	color:#1f66d0;
}
th{
	font-size:12px;
	line-height:22px;
	height:24px !important;
	height:22px;
	font-weight:bold;
	background-image: url(admin/skin/images/bg_table.jpg);
	background-repeat: repeat-x;
	background-position: 0 -26px;
}
#ManFrame { padding:0 10px;}
caption{*margin-top:10px;
	line-height:25px;
	height:25px;
	text-align:left;
	padding-left:14px;
}
.bdr{
	border:1px solid #b1d0fc;
	clear:both;
}

caption,#ManFrame h3 {
	border:1px solid #99d3fb;
	border-bottom-width:0;
	color:#09459f;
	background:url(admin/skin/images/barbg.gif) repeat-x 0 0;
	height:25px;
	line-height:25px;
	font-size:12px;
	font-family:"����";
	margin-top: 10px;
	margin-right: auto;
	margin-bottom: 0;
	margin-left: auto;
	padding-left: 14px;
}
caption{border-bottom:1px solid #99d3fb !important; border:1px solid #99d3fb; border-

bottom-width:0; font-weight:bold; }
caption span{float:right; padding-right:10px;}

table{background:#99d3fb; margin-top:-5px !important; margin-top:10px; width:100%;}
td{
	background:#fff;
	font-size: 12px;
}
th,td{
	line-height:24px;
	text-align:center;
	color:#1f66d0;
}
th{
	font-size:12px;
	line-height:22px;
	height:24px !important;
	height:22px;
	font-weight:bold;
	background-image: url(admin/skin/images/bg_table.jpg);
	background-repeat: repeat-x;
	background-position: 0 -26px;
}
#ManFrame_2_1 {width:48%; float:left;}
#ManFrame_2_1 p {
	border-bottom:1px dotted #b4d3ef;
	margin:10px auto;
	text-align:left;
	padding:0 10px 10px;
	color:#1f66d0;
	line-height:22px;
}
#ManFrame_2_2 { float:left; margin-left:1.5%; width:48%;}
#ManFrame_2_2 li,#admin_main_2_1 li { background:#fff url(admin/skin/images/list_bg.gif) no-repeat 5px 

8px;}
#ManFrame_2_2 { float:left; margin-left:1.5%; width:48%;}
.align_l{padding-left:5px;text-align:left}
</style>
<body onLoad="$.get('?file=memo&action=get', function(data){$('#memo_mtime').html(data.substring(0, 19));$('#memo_data').val(data.substring(19));}); ">
   <div id=ManFrame>
   <div id="ManFrame_2_1">
    <h3>�ҵĸ�����Ϣ</h3>
    <div class="bdr">
		<!--����Ա������Ϣ-->
		<p>���ã�<?=$_username?><br />
		   ��ɫ��<? foreach($ht_role as $v){ foreach($ht_admin_role as $r) { if($v["roleid"]==$r["roleid"]){?><?=$v["name"]?> <? }}}?><br /><br />
		</p>
		<p>
		  ��¼ʱ�䣺<?=date("Y-m-d H:i:s",$Here["lastlogintime"])?><Br/>
�� ¼ IP��<?=$Here["lastloginip"]?><Br/>
��¼������<?=$Here["logintimes"]?><Br/>
	  </p>
    </div>

	<table cellpadding="0" cellspacing="1">
	<caption>��վͳ����Ϣ</caption>
		<tr>
			<th>ͳ��</th>
			<th>��Ϣ</th>
			<th>��Ա</th>
			<th>����</th>
		  <th>����</th>
    <th>����</th>
			<th>��Ŀ</th>
			<th>����</th>
		</tr>
		<tr>
			<td>����</td>
			<td><?=$ht_homes->count("content")?></td>
			<td><?=$ht_homes->count("member")?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><?=$ht_homes->count('order')?></td>
			<td><?=$ht_homes->count('category')?></td>
			<td><?=$ht_homes->count('session')?></td>
		</tr>
		<tr>
			<td>����</td>
			<td><?=$ht_homes->count('content', 'inputtime', 'today')?></td>
			<td><?=$ht_homes->count('member_info', 'regtime', 'today')?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		    <td><?=$ht_homes->count('order', 'time', 'today')?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>����</td>
			<td><?=$ht_homes->count('content', 'inputtime', 'yesterday')?></td>
			<td><?=$ht_homes->count('member_info', 'regtime', 'yesterday')?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
            <td><?=$ht_homes->count('order', 'time', 'yesterday')?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>����</td>
			<td><?=$ht_homes->count('content', 'inputtime', 'week')?></td>
			<td><?=$ht_homes->count('member_info', 'regtime', 'week')?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><?=$ht_homes->count('order', 'time', 'week')?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>����</td>
			<td><?=$ht_homes->count('content', 'inputtime', 'month')?></td>
			<td><?=$ht_homes->count('member_info', 'regtime', 'month')?></td>
			<td>&nbsp;</td>
			<td></td>
			<td><?=$ht_homes->count('order', 'time', 'month')?></td>
    <td></td>
			<td></td>
		</tr>
	</table>
    <div id="phpcms_notice"></div>
	<table cellpadding="0" cellspacing="1" >
	<caption>PhpWeb �����Ŷ�</caption>
		<tr>
			<td width="100" class="align_r">�ܼܹ�</td>
			<td class="align_l">������</td>
		</tr>
		<tr>
			<td class="align_r">���򿪷�</td>
			<td class="align_l">�ϳ� ��ΰ ����</td>
		</tr>
		<tr>
			<td class="align_r">UI���</td>
			<td class="align_l">������ ��ѩ�� �ź�� ������</td>
		</tr>
		<tr>
			<td class="align_r">�ٷ���վ</td>
			<td class="align_l">Http://Www.meiray.com </td>
		</tr>
	</table>

  </div>
  <div id="ManFrame_2_2">
   <h3><span id="memo_mtime" style="float:right; padding-right:10px;"></span>�ҵı���¼</h3>
    <div class="bdr"><textarea name="data" id="memo_data" class="inputtext" style="height:173px;width:99%;margin:5px; padding:5px" onblur='$.post("?file=memo&action=set", { data: this.value }, function(data){$("#memo_mtime").html(data);});'></textarea></div>

	<table cellpadding="0" cellspacing="1">
	<caption>
	��Ȩ��Ϣ
  </caption>
        <Tr>
        <td>PHP�汾</td>
        <td class="align_l">Php<?=PHP_VERSION?></td>
        </Tr>
        <tr>
        <td>MYSQL�汾</td>
        <td class="align_l">Mysql<?=$db->version()?></td>
        </tr>
		<tr>
			<td  width="20%" height="25" class="align_r">�汾��</td>
			<td width="292" class="align_l"><?=PHPJSJ_RELEASE?></td>
		</tr>
		<tr>
			<td height="25" class="align_r">��Ȩ����</td>
			<td class="align_l" id="phpcms_license">����Ȩ</td>
		</tr>
		<tr>
			<td height="25" class="align_r">���к�</td>
			<td class="align_l" id="phpweb_sn"></td>
		</tr>
	</table>
  </div>
</div>
</body>
</html>
