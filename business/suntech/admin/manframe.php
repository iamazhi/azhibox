<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=CHARSET?>">
<title>后台首页</title>
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
	font-family:"宋体";
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
	font-family:"宋体";
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
    <h3>我的个人信息</h3>
    <div class="bdr">
		<!--管理员基本信息-->
		<p>您好，<?=$_username?><br />
		   角色：<? foreach($ht_role as $v){ foreach($ht_admin_role as $r) { if($v["roleid"]==$r["roleid"]){?><?=$v["name"]?> <? }}}?><br /><br />
		</p>
		<p>
		  登录时间：<?=date("Y-m-d H:i:s",$Here["lastlogintime"])?><Br/>
登 录 IP：<?=$Here["lastloginip"]?><Br/>
登录次数：<?=$Here["logintimes"]?><Br/>
	  </p>
    </div>

	<table cellpadding="0" cellspacing="1">
	<caption>网站统计信息</caption>
		<tr>
			<th>统计</th>
			<th>信息</th>
			<th>会员</th>
			<th>评论</th>
		  <th>留言</th>
    <th>订单</th>
			<th>栏目</th>
			<th>在线</th>
		</tr>
		<tr>
			<td>总数</td>
			<td><?=$ht_homes->count("content")?></td>
			<td><?=$ht_homes->count("member")?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><?=$ht_homes->count('order')?></td>
			<td><?=$ht_homes->count('category')?></td>
			<td><?=$ht_homes->count('session')?></td>
		</tr>
		<tr>
			<td>今日</td>
			<td><?=$ht_homes->count('content', 'inputtime', 'today')?></td>
			<td><?=$ht_homes->count('member_info', 'regtime', 'today')?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		    <td><?=$ht_homes->count('order', 'time', 'today')?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>昨日</td>
			<td><?=$ht_homes->count('content', 'inputtime', 'yesterday')?></td>
			<td><?=$ht_homes->count('member_info', 'regtime', 'yesterday')?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
            <td><?=$ht_homes->count('order', 'time', 'yesterday')?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>本周</td>
			<td><?=$ht_homes->count('content', 'inputtime', 'week')?></td>
			<td><?=$ht_homes->count('member_info', 'regtime', 'week')?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><?=$ht_homes->count('order', 'time', 'week')?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>本月</td>
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
	<caption>PhpWeb 开发团队</caption>
		<tr>
			<td width="100" class="align_r">总架构</td>
			<td class="align_l">孟琳淋</td>
		</tr>
		<tr>
			<td class="align_r">程序开发</td>
			<td class="align_l">孟朝 王伟 王涛</td>
		</tr>
		<tr>
			<td class="align_r">UI设计</td>
			<td class="align_l">孟琳淋 申雪冰 张洪峰 马明忠</td>
		</tr>
		<tr>
			<td class="align_r">官方网站</td>
			<td class="align_l">Http://Www.meiray.com </td>
		</tr>
	</table>

  </div>
  <div id="ManFrame_2_2">
   <h3><span id="memo_mtime" style="float:right; padding-right:10px;"></span>我的备忘录</h3>
    <div class="bdr"><textarea name="data" id="memo_data" class="inputtext" style="height:173px;width:99%;margin:5px; padding:5px" onblur='$.post("?file=memo&action=set", { data: this.value }, function(data){$("#memo_mtime").html(data);});'></textarea></div>

	<table cellpadding="0" cellspacing="1">
	<caption>
	授权信息
  </caption>
        <Tr>
        <td>PHP版本</td>
        <td class="align_l">Php<?=PHP_VERSION?></td>
        </Tr>
        <tr>
        <td>MYSQL版本</td>
        <td class="align_l">Mysql<?=$db->version()?></td>
        </tr>
		<tr>
			<td  width="20%" height="25" class="align_r">版本号</td>
			<td width="292" class="align_l"><?=PHPJSJ_RELEASE?></td>
		</tr>
		<tr>
			<td height="25" class="align_r">授权类型</td>
			<td class="align_l" id="phpcms_license">已授权</td>
		</tr>
		<tr>
			<td height="25" class="align_r">序列号</td>
			<td class="align_l" id="phpweb_sn"></td>
		</tr>
	</table>
  </div>
</div>
</body>
</html>
