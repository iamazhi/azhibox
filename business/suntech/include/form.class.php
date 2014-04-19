<?php
class form
{
	function editor($field = 'content', $toolbar = 'standard', $minlength = '400', $maxlength = '100%', $isshowext = 1)
	{
		$str = "<script type=\"text/javascript\" src=\"".SITE_URL."fckeditor/fckeditor.js\"></script>\n
		<script language=\"JavaScript\" type=\"text/JavaScript\">var SiteUrl = \"".SITE_URL."\"; 
		var sBasePath = \"".SITE_URL."\" + 'fckeditor/'; 
		var oFCKeditor = new FCKeditor( '".$field."' ) ; 
		oFCKeditor.BasePath = sBasePath ;
		oFCKeditor.Height = '".$minlength."'; 
		oFCKeditor.Width	= '".$maxlength."' ; 
		oFCKeditor.ToolbarSet	= '".$toolbar."' ;
		oFCKeditor.ReplaceTextarea();";
        $str .= "</script>";
		
		$str .= "<img src=\"".SITE_URL."images/editor_add.jpg\" title='增加编辑器高度' tag='1' fck=\"".$field."\"/>&nbsp;  <img src=\"".SITE_URL."images/editor_diff.jpg\" title='减少编辑器高度' tag='0' fck=\"".$field."\"/></div>";
		
	
		$str .= "<div id=\"MM_file_list_".$field."\" style=\"text-align:left\"></div><div id='FilePreview' style='Z-INDEX: 1000; LEFT: 0px; WIDTH: 10px; POSITION: absolute; TOP: 0px; HEIGHT: 10px; display: none;'></div><div id='".$field."_save'></div>";
		return $str;
	}
	
	
	function text($name, $id = '', $value = '',$minlength = '', $maxlength = '')
	{
		if(!$id) $id = $name;
		$showerrortips = "字符长度必须为".$minlength."到".$maxlength."位";
		if($name=="info[title]") 
		{
			$tag="require='true' datatype='limit' min='$minlength' max='$maxlength' msg='$showerrortips'";
			}
		if($name=="info[price]" or $name=="info[market]" or $name=="info[wholesale]")
		{
			$tag="require='false' datatype='number' msg='请输入正确的价格'";
			}
			
		return "<input type='text' name = '".$name."' value='".$value."' size='".$maxlength."' id='".$id."' ".$tag.">";
		}
		
	function textarea($name, $id = '', $value = '', $minlength = '', $maxlength = '')
	{
		if(!$id) $id = $name;
		if($character && $maxlength)
		{
			$data = ' <img src="images/icon.gif" width="12"> 还可以输入 <font id="ls_'.$id.'" color="#ff0000;">'.$maxlength.'</font> 个字符！<br />';
		}
		$data .= "<textarea name=\"$name\" id=\"$id\" rows=\"$minlength\" cols=\"$maxlength\" >$value</textarea>";
		return $data;
	}
	
	function style($name = 'style', $id = '', $style='')
	{   
	    global $styleid, $LANG;
		if(!$styleid) $styleid = 1; else $styleid++;
		$color = $strong = '';
		if(!$id) $id = $name;
		if($style)
		{
			list($color, $b) = explode(' ', $style);
		}
		$LANG['color'] = '颜色';
        $LANG['bold'] = '加粗';
		 
		$styleform = "<option value=\"\">".$LANG['color']."</option>\n";
		for($i=1; $i<=15; $i++)
		{
			$styleform .= "<option value=\"c".$i."\" ".($color == 'c'.$i ? "selected=\"selected\"" : "")." class=\"bg".$i."\"></option>\n";
		}
		$styleform = "<select name=\"style_color$styleid\"  id=\"style_color$styleid\" onchange=\"document.all.style_id$styleid.value=document.all.style_color$styleid.value;if(document.all.style_strong$styleid.checked)document.all.style_id$styleid.value += ' '+document.all.style_strong$styleid.value;\" >\n".$styleform."</select>\n";
		
		$styleform .= " <label><input type=\"checkbox\" name=\"style_strong$styleid\" id=\"style_strong$styleid\" value=\"b\" ".($b == 'b' ? "checked=\"checked\"" : "")." onclick=\"document.all.style_id$styleid.value=document.all.style_color$styleid.value;if(document.all.style_strong$styleid.checked)document.all.style_id$styleid.value += ' '+document.all.style_strong$styleid.value;\"> ".$LANG['bold'];
		
		$styleform .= "</label><input type=\"hidden\" name=\"info[".$name."]  \" id=\"style_id$styleid\" value=\"".$style."\">";
		return $styleform;
	}
	
	

	
	function upload_image($name, $id = '', $value = '', $size = 50, $class = '', $property = '')
	{
		if(!$id) $id = $name;
		return "<input type=\"text\" name=\"$name\" id=\"$id\" value=\"$value\" size=\"$size\" class=\"$class\" $property/> <input type=\"button\" name=\"{$name}_upimage\" id=\"{$id}_upimage\" value=\"上传图片\" style=\"width:60px\" class=\"jqModal\" onclick=\"javascript:openwinx('?file=upload&uploadtext={$id}','upload','480','350');\"/>";
	}
	//onclick=\"javascript:openwinx('?file=upload&uploadtext={$id}','upload','480','350')\"/>";({ajax:'@href',modal:true}); 
	//class="jqModal" onClick="get_db_source();$('.jqmWindow').show();"/>

    //模板列表
	function select_template($module, $name, $id = '', $value = '', $property = '', $pre = '')
	{
		if(!$id) $id = $name;
		$templatedir = TPL_ROOT.TPL_NAME.'/';
		$files = array_map('basename', glob($templatedir.$module.'/'.$pre.'*.html'));
		$names = cache_read('name.inc.php', $templatedir);
		$templates = array(''=>'请选择');
		foreach($files as $file)
		{
			$key = substr($file, 0, -5);
			$templates[$key] = isset($names[$module][$file]) ? $names[$module][$file].'('.$file.')' : $file;
		}
		ksort($templates);
		return form::select($templates, $name, $id, $value, $property);
	}
	//URL规则
	function select_urlrule($module = 'phpsin', $file = 'category', $ishtml = 1, $name = 'urlruleid', $id ='', $urlruleid = 0, $property = '')
	{
		global $db;
		$urlrules = array();
		$result = $db->query("SELECT `urlruleid`,`example` FROM `".DB_PRE."urlrule` WHERE `module`='$module' AND `file`='$file' AND `ishtml`='$ishtml' ORDER BY `urlruleid`");
		while($r = $db->fetch_array($result))
		{
			$urlrules[$r['urlruleid']] = $r['example'];
		}
		$db->free_result($result);
		if(!$id) $id = $name;
		return form::select($urlrules, $name, $id, $urlruleid, 1, '', $property);
	}
function date($name, $value = '', $isdatetime = 0)
	{
		if($value == '0000-00-00 00:00:00') $value = '';
		$id = preg_match("/\[(.*)\]/", $name, $m) ? $m[1] : $name;
		if($isdatetime)
		{
			$size = 21;
			$format = '%Y-%m-%d %H:%M:%S';
			$showsTime = 'true';
		}
		else
		{
			$size = 10;
			$format = '%Y-%m-%d';
			$showsTime = 'false';
		}
		$str = '';
		if(!defined('CALENDAR_INIT'))
		{
			define('CALENDAR_INIT', 1);
			$str .= '<link rel="stylesheet" type="text/css" href="images/js/calendar/calendar-blue.css"/>
			        <script type="text/javascript" src="images/js/calendar/calendar.js"></script>';
		}
		$str .= '<input type="text" name="'.$name.'" id="'.$id.'" value="'.$value.'" size="'.$size.'" readonly>&nbsp;';
		$str .= '<script language="javascript" type="text/javascript">
					date = new Date();document.getElementById ("'.$id.'").value="'.$value.'";
					Calendar.setup({
						inputField     :    "'.$id.'",
						ifFormat       :    "'.$format.'",
						showsTime      :    '.$showsTime.',
						timeFormat     :    "24"
					});
				 </script>';
		return $str;
	}
		
	
	function select($options, $name, $id = '', $value = '', $size = 1, $class = '', $ext = '')
	{
		if(!$id) $id = $name;
		if(!is_array($options)) $options = form::_option($options);
		if($size >= 1) $size = " size=\"$size\"";
		if($class) $class = " class=\"$class\"";
		$data .= "<select name=\"$name\" id=\"$id\" $size $class $ext>";
		foreach($options as $k=>$v)
		{
			$selected = $k == $value ? 'selected' : '';
			$data .= "<option value=\"$k\" $selected>$v</option>\n";
		}
		$data .= '</select>';
		return $data;
		
	}
	function select_tag($fromtype, $fromname, $id, $options ,$width)
	{
		$options = form::_option($options["options"]);
		$data .="<select name=$fromname>";
	foreach($options as $k=>$v)
	{
	 $data .= "<option value=$k>".$v."</option>";
	  }
	  $data .="</select>";
		return $data;
	}
	
		function radio($options, $name, $id = '', $value = '', $cols = 5, $class = '', $ext = '', $width = 100)
	{
		if(!$id) $id = $name;
		if(!is_array($options)) $options = form::_option($options);
		$i = 1;
		$data = '';
		if($class) $class = " class=\"$class\"";
		foreach($options as $k=>$v)
		{
			$checked = $k == $value ? 'checked' : '';
			$data .= "<span style=\"width:{$width}px\"><label><input type=\"radio\" name=\"{$name}\" id=\"{$id}\" value=\"{$k}\" style=\"border:0px\" $class {$ext} {$checked}/> {$v}</label></span> ";
			if($i >= 5) $data .= "<br />\n";
			$i++;
		}
		return $data;
	}
	
function _option($options, $s1 = "\n", $s2 = '|')
	{
		$options = explode($s1, $options);
		foreach($options as $option)
		{
			if(strpos($option, $s2))
			{
				list($name, $value) = explode($s2, trim($option));
			}
			else
			{
				$name = $value = trim($option);
			}
			$os[$value] = $name;
		}
		return $os;
	}
	
	function select_model($name = 'modelid', $id ='', $alt = '', $modelid = '', $property = '')
	{
		global $MODEL;
		if($alt) $arrmodel = array('0'=>$alt);
		foreach($MODEL as $k=>$v)
		{
			if($v['modeltype'] > 0) continue;
			$arrmodel[$k] = $v['name'];
		}
		if(!$id) $id = $name;
		return form::select($arrmodel, $name, $id, $modelid, 1, '', $property);
	}
	
	function select_member_model($name = 'modelid', $id = '', $alt = '', $modelid = '', $property = '')
	{
		global $MODEL;
		if($alt) $arrmodel = array('0'=>$alt);
		foreach($MODEL as $k=>$v)
		{
			if($v['modeltype'] == '2')
			{
				$arrmodel[$k] = $v['name'];
			}
		}
		if(!$id) $id = $name;
		return form::select($arrmodel, $name, $id, $modelid, 1, '', $property);
	}
	

	
	function checkbox($options, $name, $id = '', $value = '', $cols = 5, $class = '', $ext = '', $width = 100)
	{
		if(!$options) return '';
		if(!$id) $id = $name;
		if(!is_array($options)) $options = form::_option($options);
		$i = 1;
		$data = '<input type="hidden" name="'.$name.'" value="-99">';
		if($class) $class = " class=\"$class\"";
		if($value != '') $value = strpos($value, ',') ? explode(',', $value) : array($value);
		foreach($options as $k=>$v)
		{
			$checked = ($value && in_array($k, $value)) ? 'checked' : '';
			$data .= "<span style=\"width:{$width}px\"><label><input type=\"checkbox\" boxid=\"{$id}\" name=\"{$name}[]\" id=\"{$id}\" value=\"{$k}\" style=\"border:0px\" $class {$ext} {$checked}/> {$v}</label></span>\n ";
			if($i%$cols == 0) $data .= "<br />\n";
			$i++;
		}
		return $data;
	}
	
	function select_module($name = 'module', $id ='', $alt = '', $value = '', $property = '')
	{
		global $MODULE;
		if($alt) $arrmodule = array('0'=>$alt);
		foreach($MODULE as $k=>$v)
		{
			$arrmodule[$k] = $v['name'];
		}
		if(!$id) $id = $name;
		return form::select($arrmodule, $name, $id, $value, 1, '', $property);
	}
	
	function select_category($module = 'phpsin', $parentid = 0, $name = 'catid', $id ='', $alt = '', $catid = 0, $property = '', $type = 0, $optgroup = 0)
	{
		global $tree, $CATEGORY;
		if(!is_object($tree))
		{
			require_once 'tree.class.php';
			$tree = new tree;
		}
		if(!$id) $id = $name;
		if($optgroup) $optgroup_str = "<optgroup label='\$name'></optgroup>";
		$data = "<select name='$name' id='$id' $property>\n<option value='0'>".$alt."</option>\n";
		if(is_array($CATEGORY))
		{
			$categorys = array();
			foreach($CATEGORY as $id=>$cat)
			{
				if(($type == 2 && $cat['type'] ==2) || ($type == 1 && $cat['type'])) continue;
				if($cat['module'] == $module) $categorys[$id] = array('id'=>$id, 'parentid'=>$cat['parentid'], 'name'=>$cat["name"]);
				
			}
			$tree->tree($categorys);
			$data .= $tree->get_tree($parentid, "<option value=\$id \$selected>\$spacer\$name</option>\n", $catid, '' , $optgroup_str);
		} 
		$data .= '</select>';
		
		return $data;
	}
	
	function downfile($name, $id = '', $value = '', $size = 50, $mode, $class = '', $ext = '')
	{
		if(!$id) $id = $name;
		$mode = "&mode=".$mode;
		
			return "<input type=\"text\" name=\"$name\" id=\"$id\" value=\"$value\" size=\"$size\" class=\"$class\" $ext/> <input type=\"hidden\" name=\"{$id}_aid\" value=\"0\"> <input type=\"button\" name=\"{$name}_upfile\" id=\"{$id}_upfile\" value=\"上传文件\" style=\"width:60px\" onclick=\"javascript:openwinx('?file=upload&uploadtext={$id}{$mode}','upload','390','180')\"/>";
		
	}
	}
	
	
	
?>
