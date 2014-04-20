<?php
class member_tag_form
{
	var $modelid;
	var $fields;
	var $member_fields;
	var $userid;
	var $common_fields;
	var $model_fields;
	
    function __construct($modelid)
    {
		global $db;
		$this->db = &$db;
		$this->modelid = $modelid;
		$this->model_fields = $this->modelid ? cache_read($this->modelid.'_fields.inc.php', CACHE_MODEL_PATH) : '';
		$this->common_fields = cache_read('member_fields.inc.php', CACHE_MODEL_PATH);
		$this->fields = $this->modelid ? array_merge($this->model_fields, $this->common_fields) : $this->common_fields;
    }
    
    function member_tag_form($modelid)
    {
    	$this->__construct($modelid);
    }

	function get($data = array())
	{
		$info = array();
		foreach($this->fields as $field=>$v)
		{
			if(!$v['iswhere']) continue;
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
				$.get('load.php', { field: 'areaid', id: id ,  value: '".$field."'},
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
			return "<input type=\"text\" name=\"info[$field]\" id=\"$field\" value=\"$value\" size=\"10\">
			<span onclick=\"this.style.display='none';\$('reselect_$field').style.display='';\" style=\"cursor:pointer;\">$areaname <font color=\"red\">点击重选</font></span>
			<span id=\"reselect_$field\" style=\"display:none;\">
			<span id=\"load_$field\"></span> 
			<a href=\"javascript:area_reload();\">重选</a>
			</span>$js";
		}
		else
		{
			return "<input type=\"text\" name=\"info[$field]\" id=\"$field\" value=\"$value\" size=\"10\">
			<span id=\"load_$field\"></span>
			<a href=\"javascript:area_reload();\">重选</a>$js";
		}
	}
	function box($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if($boxtype == 'radio')
		{
			return form::radio($options, 'info['.$field.']', $field, $value, $cols, $css, $formattribute, $width);
		}
		elseif($boxtype == 'checkbox')
		{
			if(is_array($value)) $value = implode(',',$value);
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
		$data = "<select name='info[$field]' id='$field' $size $css $formattribute>";

		foreach($CATEGORY AS $_k=>$_v)
		{
			if($_v['child']) continue;
			$options .= $_v['catname'].'|'.$_k."\n";
			$data .= "<option value='$_k'>$_v[catname]</option>";
		}
		$data .= "</select>";

		return $data;
	}

	
	function datetime($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		$isdatetime = $dateformat == 'datetime' ? 1 : 0;
		$str = form::date("info[$field]", $value, $isdatetime);
		return $str;
	}	function groupid($field, $value, $fieldinfo)
	{
		global $GROUP;
		extract($fieldinfo);
		$js = "<script type=\"text/javascript\">
				\$('#selectid').change(function(data){
					\$('#$field').val(\$('#selectid').val());
				});	
			</script>";
		return "<input type=\"text\" name=\"info[$field]\" id=\"$field\" value=\"$value\" size=\"10\">  ".form::select($GROUP, 'selectid', 'selectid', $value, 'text', 1, $css, '').$js;
	}	
	function image($field, $value, $fieldinfo)
	{
		global $catid;
		extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		$data = $isselectimage ? " <input type='button' value='浏览...' style='cursor:pointer;' onclick=\"file_select('$field', $catid, 1)\">" : '';
		return form::image('info['.$field.']', $field, $value, $size, $css, $formattribute, $modelid, $fieldid).$data;
	}	function number($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		return form::text('info['.$field.']', $field, $value, 'text', 10, $css, $formattribute);
	}
	function text($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		return form::text('info['.$field.']', $field, $value, 'text', 10, $css, $formattribute);
	}
	function textarea($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if(!$value) $value = $defaultvalue;
		return form::textarea('info['.$field.']', $field, $value, $rows, $cols, $css, $formattribute);
	}
}
?>