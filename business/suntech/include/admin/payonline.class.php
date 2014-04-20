<?php
class payonline
{
	var $_db;
	var $_table = '';
	var $_pay_online_table = '';
	var $_pay_account_table = '';
	var $exchange_table = '';
	var $error = '';
	function __construct()
	{
		$this->payonline();
	}
	function payonline()
	{
		global $db;
		$this->_db = $db;
		$this->table = DB_PRE.'pay_payment';
		$this->table_exchange = DB_PRE.'pay_exchange';
		$this->table_t	= DB_PRE.'pay_pointcard_type';
		$this->table_pay_account = DB_PRE.'pay_user_account';
	}

	
	/**
	 * 处理序列化的支付、配送的配置参数
	 * 返回一个以name为索引的数组
	 *
	 * @access  public
	 * @param   string       $cfg
	 * @return  void
	 */
	function unserialize_config($cfg)
	{
        if (is_string($cfg) )
		{
            $arr = string2array($cfg);
			$config = array();

			foreach ($arr AS $key => $val)
			{
				$config[$key] = $val['value'];
			}

			return $config;
		}
		else
		{
			return false;
		}
	}

	function error()
	{
		$ERRORMSG = array(0=>'卡号不存在',
			              1=>'请选择订阅类别',
			             );
		return $ERRORMSG[$this->error];
	}
}
?>