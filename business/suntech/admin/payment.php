<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require CLASS_PATH."payment.class.php";
$a=new payment();
switch($action)
{
	case'manage':
	
	$info=$a->listtable($table="pay_payment",$where,$order='pay_order');
	include tpl("payment_manage");
	break;
	
	case 'edit':
	if($dosubmit)
	 {
		     $data = $config = array();
			 $info = $a->get_payment($pay_code);
			 $config = $info['config'];
			 foreach ($config_name as $key => $value)
			 {
				$config[$value]['value'] = $config_value[$key];
			    }
			
			  $data['pay_name'] = $pay_name;
			  $data['pay_desc'] = $pay_desc;
			  $data['pay_fee'] = $pay_fee;
              $data['pay_order'] = $pay_order;
              $data['config'] = array2string($config, 0);
	         if ($a->update($data,"pay_id = '$pay_id'"))
			    {
			   	 showmessage('编辑成功','?file=payment&action=manage');
			     }
	    }
	else
	{
		      $info=$a->get($table="pay_payment",$where="pay_id='$pay_id'");
	          if( !empty($info) )
		       {
               $info['config'] = string2array($info['config']);
		        }
			
	            include tpl("payment_edit");
		}
	break;
	case 'enabled':
	$db->query("UPDATE ".DB_PRE."pay_payment SET enabled='$enabled' WHERE pay_id = '$pay_id'");
	showmessage('操作成功！', $forward);
	break;
	}
?>