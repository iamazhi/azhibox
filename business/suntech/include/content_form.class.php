<?php
class content_form
{   
    var $modelid;
	var $fields;
	
    function __construct($modelid)
    {
		global $db,$modelid;
		$this->db = &$db;
		$this->category = DB_PRE.'category';
		$this->modelid = $modelid;
		$this->fields = cache_read($this->modelid.'_fields.inc.php', CACHE_MODEL_PATH);

    }

	function content_form($modelid)
	{
		$this->__construct($modelid);
	}

	function get($data = array(),$modelid)
	{
	   
	    $result=$this->db->query("SELECT * FROM ".DB_PRE."model_field WHERE modelid='$modelid'  AND iscore!=1 ORDER BY modelid,listorder");
		while($dd=$this->db->fetch_array($result))
		
	     {
			$array[] = $dd;
		 }
		//$info=$this->text("text", $fromname, $value = $data["title"], $width='10', $height);
	return $array;
	}

	function areaid($field, $value, $fieldinfo)
	{
		global $AREA;
		extract($fieldinfo);
		$js = "<script type=\"text/javascript\">
					function area_load(id)
					{
						$.get('plus/load.php', { field: 'areaid', id: id, value: '".$field."' },
							  function(data){
								$('#load_$field').append(data);
							  });
					}
					function area_reload()
					{
						$('#load_$field').html('');
						area_load(0);
					}
					area_load(0);
			</script>";
		if($value)
		{
			$areaname = $AREA[$value]['name'];
			return "<input type=\"hidden\" name=\"info[$field]\" id=\"$field\" value=\"$value\">
			<span onclick=\"this.style.display='none';\$('#reselect_$field').show();\" style=\"cursor:pointer;\">$areaname <font color=\"red\">点击重选</font></span>
			<span id=\"reselect_$field\" style=\"display:none;\">
			<span id=\"load_$field\"></span> 
			<a href=\"javascript:area_reload();\">重选</a>
			</span>$js";
		}
		else
		{
			return "<input type=\"hidden\" name=\"info[$field]\" id=\"$field\" value=\"$value\">
			<span id=\"load_$field\"></span>
			<a href=\"javascript:area_reload();\">重选</a>$js";
		}
	}

    //内容
	function editor($field, $value, $minlength, $maxlength)
	{
		if(!$value) $value = '';
		$data = "<textarea name=\"info[$field]\" id=\"$field\" style=\"display:none\">$value</textarea>\n";
	    $toolbar=$toolbar ? $value : "standard";
		return $data.form::editor($field, $toolbar, $minlength, $maxlength);
	}
	//文字
	function textarea($formtype, $value, $minlength, $maxlength)
	{
		if(!$value) $value = $defaultvalue;
		
		return $data.form::textarea("info[".$formtype."]",$formtype ,$value ,$minlength, $maxlength);
	}
	
	function text($formtype, $value ,$minlength, $maxlength )
	{
		if(!$value) $value = $this->fields[$formtype]["defaultvalue"];
		
		return $data.form::text("info[".$formtype."]",$formtype ,$value, $minlength, $maxlength);
	}
	//contentid
    function number($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		return form::text('info['.$field.']', $field, $value, 'text', 10, $css, $formattribute, $minlength, $maxlength, $pattern, $errortips);
	}
	//栏目
	function catid($field, $value, $minlength, $maxlength)
	{
		if(!$value) $value = $defaultvalue;
		$info=$this->db->get_one("select * from $this->category where catid='$_GET[catid]'");
		
		require_once 'tree.class.php';
			$tree = new tree;
			$array=array();
			$reuslt=$this->db->query("SELECT * from ".$this->category."");
			$data = "<select name='info[".$field."]' id=$field>\n";
			while($row=$this->db->fetch_array($reuslt))
			{
				$array[$id=$row["catid"]]=array('catid'=>$row["catid"],'id'=>$row["menuid"],'parentid'=>$row["pid"],'name'=>$row["name"]);
				}
			$tree->tree($array);
			$data .= $tree->get_tree($info["pid"],"<option value='\$catid' \$selected>\$name</option>\n",$_GET["catid"]);
			$data .="</select>\n";
		return $data;
	}
	
	
	function style($formtype, $value)
	{
		if(!$value) $value = $this->fields[$formtype]["defaultvalue"];
		return $data.form::style($formtype, $formtype, $value);
	}
	//单位
	function box($formtype, $value, $fieldinfo)
	{
     $boxtype=$this->fields[$formtype]["boxtype"];
	 $options=$this->fields[$formtype]["options"];
		   if($boxtype == 'radio')
		{
			return form::radio($options, 'info['.$formtype.']', $formtype, $value, $cols, $css, $formattribute, $width);
		}
		elseif($boxtype == 'checkbox')
		{
			return form::checkbox($options, 'info['.$formtype.']', $formtype, $value, $cols, $css, $formattribute, $width);
		}
		elseif($boxtype == 'select')
		{
			return form::select($options, 'info['.$formtype.']', $formtype, $value, $size, $css, $formattribute);
		}
		elseif($boxtype == 'multiple')
		{
			return form::multiple($options, 'info['.$formtype.']', $formtype, $value, $size, $css, $formattribute);
		}
	}
	
	//图片上传
	function image($formtype='', $value='', $size='', $maxlenght='' ,$fromtype='')
	{              //名称
		global $catid;
		//extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		$data = $isselectimage ? " <input type='button' value='浏览...' style='cursor:pointer;' onclick=\"file_select('$formtype', $catid, 1)\">" : '';
		$getimg = $get_img ? '<input type="checkbox" name="info[getpictothumb]" value="1" checked /> 保存文章第一张图片为缩略图' : '';
		if(defined('IN_ADMIN'))
		{
			return "<input type=\"text\" name=\"info[$formtype]\" id=\"$formtype\" value=\"$value\" size=\"$maxlenght\" class=\"$css\" $formattribute/> <input type=\"hidden\" name=\"{$fromname}_aid\" id=\"{$field}_aid\" value=\"0\"> <input type=\"button\" name=\"{$field}_upimage\" id=\"{$formtype}_upimage\" value=\"上传图片\" style=\"width:60px\" onclick=\"javascript:openwinx('?mod=phpsin&file=upload_field&uploadtext={$formtype}&modelid=1&catid=12&fieldid={$fieldid}','upload','450','350')\"/> $data <input name=\"cutpic\" type=\"button\" id=\"cutpic\" value=\"裁剪图片\" onclick=\"CutPic('$formtype','".SITE_URL."')\"/>{$getimg}";
		}
		else
		{
		
			return "<input type=\"text\" name=\"info[$formtype]\" id=\"$formtype\" value=\"$value\" size=\"$maxlenght\" class=\"$css\" $formattribute/> <input type=\"hidden\" name=\"{$formtype}_aid\" id=\"{$formtype}_aid\" value=\"0\"> <input type=\"button\" name=\"{$formtype}_upimage\" id=\"{$fromname}_upimage\" value=\"上传图片\" style=\"width:60px\" onclick=\"javascript:openwinx('?file=upload_field&uploadtext=$formtype&modelid=1&catid=$catid&fieldid=8','upload','450','350')\"/> $data <input name=\"cutpic\" type=\"button\" id=\"cutpic\" value=\"裁剪图片\" onclick=\"CutPic('$formtype','".SITE_URL."')\"/>";
		}
	}
	//组图
	function images($formtype)
	{
	   
	  global $attachment,$contentid;
	
		$data = "缩略图 尺寸 高：<input type='text' title='高' size='5' value='".$this->fields["thumb_size"]['thumb_height']."' name='thumb_height'> 宽：<input type='text' title='宽' size='5' value='".$this->fields["thumb_size"]['thumb_width']."' name='thumb_width'> ";
		$data .= "<div id='FilePreview' style='Z-INDEX: 1000; LEFT: 0px; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px; display: none;'></div>\n";
		if(isset($_POST["yes"]))
		{
			echo "opk";
			}
		if(!$contentid)
		{
		    $value ="";
		}
		else
		{
			
            $data .= "<div id='file_uploaded'>\n";
			$attachments = $attachment->listinfo("`contentid`=".$contentid." AND `field`='$formtype'", '`aid`,`filename`,`filepath`,`description`,`listorder`,`isthumb`');
			foreach($attachments as $k=>$v)
			{
				$aid = $v['aid'];
			    $url = $v['isthumb'] ? $attachment->get_thumb($v['filepath']) : $v['filepath'];
			    $data .= "<div id='file_uploaded_$aid'>
				<span style='width:30px'><input type='checkbox' name='{$formtype}_delete[]' value='$aid' title='删除'></span>
				<span style='width:40px'><input type='text' name='{$formtype}_listorder[$aid]' value='$v[listorder]' size='3' title='排序'></span>
				<span style='width:60px'><input type='text' name='{$formtype}_description[$aid]' value='$v[description]' size='20' title='修改图片说明'></span> <a href='###' onMouseOut='javascript:FilePreview(\"$url\", 0);' onMouseOver='javascript:FilePreview(\"$url\",1);'>$v[filename]".($v['description'] ? '('.$v['description'].')' : '')."</a></div>\n";
				
			}
			
		    $data .= "</div>\n";
		}
		
		$addmorepic = '<input type="button" onclick="AddMorePic(\'addmore_'.$formtype.'\');" value="批量添加">';
		$data .= "<div id='addmore_$formtype'></div>";
		$data .= '<input type="hidden" name="info['.$formtype.']" value="'.$value.'"/>';
        $data .= '<div id="file_div">';
		$data .= '<div id="file_1"><input type="file" name="'.$formtype.'[1]" size="20" onchange="javascript:AddInputFile(\''.$formtype.'\')"> <input type="text" name="'.$formtype.'_description[1]" size="20" title="名称"> <input type="button" value="删除" name="Del" onClick="DelInputFile(1);"> 
		'.$addmorepic.'</div>';
		$data .= '</div>';
		$_SESSION['field_images'] = 1;
		return $data;
	}
	
	
	function author($field, $value, $minlength, $maxlength)
	{
		
		$data = ' <select name="" onchange="$(\'#'.$field.'\').val(this.value)" style="width:75px"><option>常用作者</option>';
		$result = $this->db->query("SELECT * FROM ".DB_PRE."author ");
		while($r = $this->db->fetch_array($result))
		{
			$data .= "<option value='".$r["username"]."'>".$r["username"]."</option>\n";
		}
		$data .= '</select>';
		//$data .= ' <a href="###" onclick="SelectAuthor();">更多&gt;&gt;</a>';
		return form::text('info['.$field.']', $field, $value, $minlength, $maxlength).$data;
	}
	function source($field, $value, $minlength, $maxlength)
	{
		$data = ' <select name="" onchange="$(\'#'.$field.'\').val(this.value)" style="width:75px"><option>常用来源</option>';
		$result = $this->db->query("SELECT * FROM ".DB_PRE."source ");
		while($r = $this->db->fetch_array($result))
		{
			$data .= "<option value='".$r["name"]."|".$r["url"]."'>".$r["name"]."</option>\n";
		}
		$data .= '</select>';
		//if(defined('IN_ADMIN')) $data .= ' <a href="###" onclick="SelectAuthor();">更多&gt;&gt;</a>';
		return form::text('info['.$field.']', $field, $value, $minlength, $maxlength).$data;
		}
		
	function keywords($formtype, $value, $minlength, $maxlength)
	{
		$data = ' <select name="" onchange="$(\'#'.$formtype.'\').val(this.value)" style="width:75px"><option>关键词</option>';
		$result = $this->db->query("SELECT * FROM ".DB_PRE."keyword ");
		while($r = $this->db->fetch_array($result))
		{
			$data .= "<option value='".$r["tag"]."'>".$r["tag"]."</option>\n";
		}
		$data .= '</select>';
		//if(defined('IN_ADMIN')) $data .= ' <a href="###" onclick="SelectAuthor();">更多&gt;&gt;</a>';
		return form::text('info['.$formtype.']', $formtype, $value, $minlength, $maxlength).$data;
		}
	//标题
	function title($formtype, $value, $minlength, $maxlength)
	{
		global $catid;
		//extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		global $catid;
		//extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		$data = '';
		if(defined('IN_ADMIN'))
		{
			$data = "<input type=\"button\" value=\"检测是否已存在\" onclick=\"$.post('?file=content&catid=".$catid."', { action : 'check_title', c_title:$('#title').val()}, function(data){ $('#t_msg').html(data); })\">&nbsp;<span style=\"color:'#ff0000'\" id='t_msg'></span>";
		}
		$formattribute .= 'onBlur="$.post(\'api/get_keywords.php?number=3&sid=\'+Math.random()*5, {data:$(\'#title\').val()}, function(data){if(data) $(\'#keywords\').val(data); })"';
		
		return form::text('info['.$formtype.']', $formtype, $value, $minlength, $maxlength).$data;
	}
	
	function downfile($formtype, $value, $fieldinfo)
	{
	extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		return form::downfile('info['.$formtype.']', $formtype, $value, $size, $mode, $css, $formattribute);
	}
	
	function downfiles($formtype, $value, $fieldinfo)
	{
		global $catid;
		extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		
		$string = "<textarea name='info[$formtype]' cols='70' rows='6' id='$formtype' $formattribute>".$value."</textarea><input type='hidden' name='".$formtype."_aid' value='' id='".$formtype."_aid'>";
		
			$string .= "<iframe id='uploads' name='uploads' src='?file=downfiles&uploadtext={$id}&catid={$catid}' border='0' vspace='0' hspace='0' marginwidth='0' marginheight='0' framespacing='0' frameborder='0' scrolling='no' width='100%' height='50'></iframe>";
		
		return $string;
	}
	
	function datetime($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if(!$value)
		{
			if($defaulttype == 0)
			{
				$value = '';
				$dateformat == 'datetime' ? 'Y-m-d H:i:s' : $TIME;
				$isdatetime = $dateformat == 'datetime' ? 1 : 0;
				if($dateformat == 'int')
				{
					if($format=='Y-m-d H:i:s' || $format=='Y-m-d H:i')
					$isdatetime = 1;
					else $isdatetime = 0;
				}
			}
			elseif($defaulttype == 1)
			{
				
				$df = $dateformat == 'datetime' ? 'Y-m-d H:i:s' : 'Y-m-d';
				$isdatetime = $dateformat == 'datetime' ? 1 : 0;
				if($dateformat == 'int')
				{
					$df = $format;
					if($format=='Y-m-d H:i:s' || $format=='Y-m-d H:i')
					$isdatetime = 1;
					else $isdatetime = 0;
				}
				
				$value = date($df, TIME);
			}
			else
			{
				$value = $defaultvalue;
			}
		}
		else
		{
			if(substr($value, 0, 10) == '0000-00-00') $value = '';
			if($dateformat == 'int')
			{
				$value = date('Y-m-d H:i:s', $value);
				if($format=='Y-m-d H:i:s' || $format=='Y-m-d H:i')
				$isdatetime = 1;
				else $isdatetime = 0;
			}
		}
		$str = form::date("info[$field]", $value, $isdatetime);
		return $str;
	}

	function flashupload($formtype, $value, $fieldinfo)
	{	
	    global $attachment, $player;

		if(!is_a($player, 'player'))
		{
			$player = load('player.class.php');
		}
		$arr_player = $player->listinfo('disabled=0');
		$session_id = session_id();
		$cookie_auth = get_cookie('auth'); 

		$cookie_cookietime = get_cookie('cookietime');
	    @extract($fieldinfo);
		if($this->fields[$formtype]["upload_allowext"])
		{
			$org_upload_allowext = $this->fields[$formtype]["upload_allowext"];
			$arr_allowext = explode('|', $this->fields[$formtype]["upload_allowext"]);
			foreach($arr_allowext as $k=>$v)
			{
				$v = '*.'.$v;
				$array[$k] = $v;
			}
			$upload_allowext = implode(';', $array);
		}
		$firstid = $formtype.'1';
	    $data = '';
	    if(!$value)
	    {
	    	 $value = $this->fields[$formtype]["defaultvalue"];
	    }
		else
		{
			$value = str_replace(array('&amp;', '&quot;', '&#039;', '&lt;', '&gt;'),array('&', '"', "'", '<', '>') ,$value);
			eval("\$value = $value;");
			$playid = $value['player'];
			@extract($value);
			$value['str_video'] = str_replace(';', "\n", $value['str_video']);
		}
		
	    $script = "
		<textarea name=\"info[$formtype][videourl]\" id=\"videoshow\" cols=\"80\" rows=\"5\" />".$value['str_video']."</textarea>
		<link href=\"admin/skin/common.css\" rel=\"stylesheet\" type=\"text/css\">
		<script language=\"JavaScript\" src=\"images/js/swfupload/swfupload.js\"></script>
		<script language=\"JavaScript\" src=\"images/js/swfupload/fileprogress.js\"></script>
		<script language=\"JavaScript\" src=\"images/js/swfupload/hanlders.js\"></script>
		<script language=\"javascript\">
		var swfu;
window.onload = function() {
var settings = {
	upload_url : \"flash_upload.php?dosubmit=1\",
	flash_url : \"images/js/swfupload/swfupload.swf\",
	post_params: 
	{\"PHPSESSID\" : \"$session_id\",
	 \"auth\" : \"".$cookie_auth."\",
	 \"cookietime\" : \"$cookie_cookietime\",
	 \"modelid\" : \"$this->modelid\",
	 \"fieldid\" : \"".$this->fields[$formtype]["fieldid"]."\"},
	file_size_limit : \"".$this->fields[$formtype]["upload_maxsize"]." KB\",
	file_types : \"$upload_allowext\",
	file_types_description : \"All Files\",
	file_upload_limit : 100,
	file_queue_limit : \"".$this->fields[$formtype]["upload_items"]."\",
	custom_settings : {
		progressTarget : \"fsUploadProgress\",
		cancelButtonId : \"btnCancel\"
	},
	debug: false,
	
	button_image_url: \"images/flash_button.gif\",	// Relative to the Flash file
	button_placeholder_id: \"spanButtonPlaceHolder\",
	button_width: 80,
	button_height: 22,
	
	file_dialog_start_handler : fileDialogStart,
	file_queued_handler : fileQueued,
	file_queue_error_handler : fileQueueError,
	file_dialog_complete_handler : fileDialogComplete,
	upload_progress_handler : uploadProgress,
	upload_error_handler : uploadError,
	upload_success_handler : uploadSuccess,
	upload_complete_handler : uploadComplete
};
swfu = new SWFUpload(settings);
	};
var n = 1;
function uploadSuccess(file, serverData) {
	try {
		if(serverData==1)
		{
			alert('上传的文件超过了 php.ini 中 upload_max_filesize=".ini_get('upload_max_filesize')." 选项限制的值');
			return false;
		}
		else if(serverData==99)
		{
			alert('上传的文件超过了 php.ini 中 post_max_size=".ini_get('post_max_size')."选项限制的值');
			return false;
		}
		var progress = new FileProgress(file, this.customSettings.progressTarget);
		progress.setComplete();
		progress.setStatus(\"上传完成\");
		progress.toggleCancel(false);
		if($('#videoshow').html())
		{
			document.getElementById('videoshow').value += serverData + \"\\n\";
		}
		else
		{
			document.getElementById('videoshow').value = serverData + \"\\n\";
		}	
	} catch (ex) {
		this.debug(ex);
	}
}

function setvideo()
{
	var i = 0;
	var data = '';
	var startnum = parseInt($('#startvideo').val());
	var endnum = parseInt($('#endvideo').val());
	var videourl = $('#playurl').val();
	var videoext = $('#vext').val();
	for(i=startnum; i<=endnum; i++)
	{
		data = i + '|' +videourl + i +videoext;
		document.getElementById('videoshow').value += data + \"\\n\";
	}
}
			</script>
    <fieldset class=\"flash\" id=\"fsUploadProgress\">
			<legend>上传列表</legend>
			</fieldset>
<span id=\"spanButtonPlaceHolder\"></span>&nbsp;
<input type=\"button\" id=\"btupload\" value=\"开始上传\" onClick=\"swfu.startUpload();\" />
<input id=\"btnCancel\" type=\"button\" value=\"取消上传\" onClick=\"cancelQueue(upload1);\" disabled=\"disabled\" style=\"margin-left: 2px; height: 22px; font-size: 8pt;\" />";
	foreach($arr_player as $play)
	{
		$arr_p[$play['playerid']] = $play['subject']; 
	}
	if($arr_p)
	{
		$arr_p[''] = '自动选择播放器';
		ksort($arr_p);
		$sele_player = form::select($arr_p, 'info['.$formtype.'][player]', 'player', $player);
	}
	if($this->fields[$formtype]["servers"])
	{
		$sele_server = form::select($this->fields[$formtype]["servers"], 'info['.$formtype.'][server]', 'player', $server);
		
	}
	$op_server = $sele_player.'&nbsp;'.$sele_server.'<br />'.'播放地址：<input type="text" name="playurl" id="playurl" >开始集数：<input type="text" name="startvideo" id="startvideo" value="1">结束：<input type="text" name="endvideo" id="endvideo" value="1">视频格式：<input type="text" name="vext" id="vext" value=".rm">&nbsp;<input type="button" value="设定" onclick="setvideo()">';
	$data = $op_server.'<br />'.$script;
	    return  $data;
	}
}
?>
