<?php
class memo
{
	var $file;
    
    function __construct()
    {
		global $user_id;
		$this->file = PHP_ROOT.'data/memo/'.$user_id.'.php';
		if(!file_exists($this->file)) $this->set('');
    }

	function memo()
	{
		$this->__construct();
	}

	function get()
	{
		$data = file_get_contents($this->file);
		return substr($data, 13);
	}

	function set($data)
	{
		if(CHARSET != 'utf-8') $data = iconv('utf-8', CHARSET, $data);
		$data = '<?php exit;?>'.$data;
		return file_put_contents($this->file, $data);
	}

	function mtime($format = 'Y-m-d H:i:s')
	{
		return date($format, filemtime($this->file));
	}
}
?>