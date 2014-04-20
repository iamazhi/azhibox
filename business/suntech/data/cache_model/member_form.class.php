<?php
class member_form
{
	var $db;
	var $modelid;
	var $fields;
	var $userid;

    function __construct($modelid)
    {
		global $db;
		$this->db = &$db;
		$this->modelid = $modelid;
		$this->fields = cache_read($this->modelid.'_fields.inc.php', CACHE_MODEL_PATH);
		
	}

	function member_form($modelid)
	{
		$this->__construct($modelid);
	}
	
	function get($data = array())
	{
		global $_roleid, $_groupid;
		if(isset($data['userid'])) $this->userid = $data['userid'];
		$info = array();
		if(empty($this->fields)) return false;
		foreach($this->fields as $field=>$v)
		{
			if(check_in($_roleid, $v['unsetroleids']) || check_in($_groupid, $v['unsetgroupids'])) continue;
			$func = $v['formtype'];
			$value = isset($data[$field]) ? $data[$field] : '';
			$form = $this->$func($field, $value, $v);
			$info[$field] = array('name'=>$v['name'], 'tips'=>$v['tips'], 'form'=>$form, 'star'=>$v['minlength']);
		}
		return $info;
	}

	function areaid($field, $value, $fieldinfo)
	{
		global $AREA;
		extract($fieldinfo);
		$js = "<script type=\"text/javascript\">
					function area_load(id)
					{
						$.get('".PHPCMS_PATH."load.php', { field: 'areaid', id: id, value: '".$field."' },
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
	function box($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if($value == '-99') $value = $defaultvalue;
		if($boxtype == 'radio')
		{
			return form::radio($options, 'info['.$field.']', $field, $value, $cols, $css, $formattribute, $width);
		}
		elseif($boxtype == 'checkbox')
		{
			return form::checkbox($options, 'info['.$field.']', $field, $value, $cols, $css, $formattribute, $width);
		}
		elseif($boxtype == 'select')
		{
			return form::select($options, 'info['.$field.']', $field, $value, $size, $css, $formattribute);
		}
		elseif($boxtype == 'multiple')
		{
			return form::multiple($options, 'info['.$field.']', $field, $value, $size, $css, $formattribute);
		}
	}
	
	function catids($field, $value, $fieldinfo)
	{
		global $CATEGORY;
		extract($fieldinfo);
		$CATEGORY = subcat('yp');
		$selected_values = '';
		if($value)
		{
			$_array_selected = explode(',',$value);
			foreach($_array_selected AS $_array)
			{
				if($_array) $selected_values .= "<option value='$_array'>$_array</option>";
			}
		}
		$data = "<table><tr><td><select name='f_filed_1' id='f_$field' $css $formattribute>";
		foreach($CATEGORY AS $_k=>$_v)
		{
			if(!$_v['child']) $data .= "<option value='$_v[catname]'>$_v[catname]</option>";
		}
		$data .= "</select></td><td><input id='addbutton' type='button' value='添加到列表  >>' disabled style='width:100px;color:#ff0000' onclick=\"transact('update','f_$field','$field');\"><BR><BR>
		<input id='deletebutton' type='button' value='从列表删除  <<' style='width:100px;color:#ff0000' onclick=\"transact('delete','','$field');\"> </td><td><select name=\"info[$field][]\" multiple id='$field' size='8' style='width:195px;'>$selected_values</select></td></tr></table>";

		return $data;
	}
	function datetime($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if(!$value)
		{
			if($defaulttype == 0)
			{
				$value = '';
			}
			elseif($defaulttype == 1)
			{
				$df = $dateformat == 'datetime' ? 'Y-m-d H:i:s' : 'Y-m-d';
				$value = date($df, TIME);
			}
			else
			{
				$value = $defaultvalue;
			}
		}
		if(substr($value, 0, 10) == '0000-00-00') $value = '';
		$isdatetime = $dateformat == 'datetime' ? 1 : 0;
		$str = form::date("info[$field]", $value, $isdatetime);
		return $str;
	}
	function editor($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		if($this->userid && $this->fields[$field]['storage'] == 'file') $value = content_get($this->userid, $field);
		$data = "<textarea name=\"info[$field]\" id=\"$field\" style=\"display:none\">$value</textarea>\n";
		return $data.form::editor($field, $toolbar, $width, $height);
	}
	function groupid($field, $value, $fieldinfo)
	{
	    global $GROUP;
		extract($fieldinfo);
		return form::select($GROUP, 'info['.$field.']', $id, $value, $size, $class = '', $ext = '');
	}
	function image($field, $value, $fieldinfo)
	{
		global $catid;
		extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		$data = $isselectimage ? " <input type='button' value='浏览...' style='cursor:pointer;' onclick=\"file_select('$field', $catid, 1)\">" : '';
		if(defined('IN_ADMIN'))
		{
			return "<input type=\"text\" name=\"info[$field]\" id=\"$field\" value=\"$value\" size=\"$size\" class=\"$css\" $formattribute/> <input type=\"hidden\" name=\"{$field}_aid\" value=\"0\"> <input type=\"button\" name=\"{$field}_upimage\" id=\"{$field}_upimage\" value=\"上传图片\" style=\"width:60px\" onclick=\"javascript:openwinx('?mod=phpcms&file=upload_field&uploadtext={$field}&modelid={$modelid}&fieldid={$fieldid}','upload','450','350')\"/> $data <input name=\"cutpic\" type=\"button\" id=\"cutpic\" value=\"裁剪图片\" onclick=\"CutPic('$field','$PHPCMS[siteurl]')\"/>";
		}
		else
		{
			return "<input type=\"text\" name=\"info[$field]\" id=\"$field\" value=\"$value\" size=\"$size\" class=\"$css\" $formattribute/> <input type=\"hidden\" name=\"{$field}_aid\" value=\"0\"> <input type=\"button\" name=\"{$field}_upimage\" id=\"{$field}_upimage\" value=\"上传图片\" style=\"width:60px\" onclick=\"javascript:openwinx('".PHPCMS_PATH."upload_field.php?uploadtext={$field}&modelid={$modelid}&fieldid={$fieldid}','upload','450','350')\"/> <input name=\"cutpic\" type=\"button\" id=\"cutpic\" value=\"裁剪图片\" onclick=\"CutPic('$field','".SITE_URL."')\" />";
		}
	}
	function number($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		return form::text('info['.$field.']', $field, $value, 'text', 10, $css, $formattribute, $minlength, $maxlength, $pattern, $errortips);
	}
	function text($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		$type = $ispassword ? 'password' : 'text';
		return form::text('info['.$field.']', $field, $value, $type, $size, $css, $formattribute, $minlength, $maxlength, $pattern, $errortips);
	}
	function textarea($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		return form::textarea('info['.$field.']', $field, $value, $rows, $cols, $css, $formattribute);
	}
}
?>