<?php
defined('IN_PHPJSJ') or exit('Access Denied');

$a=new all();
require CLASS_PATH."card.class.php";
$card= new card();
switch($action)
{
	case 'add':
	if ($dosubmit)
		{
		   if($card->add($ptypeid, $cardnum, $carlength, $prefix,$endtime)) showmessage($LANG['operation_success'], '?file=card&action=manage');
		}
		else
		{
			$ptype=$a->listtable($table="pay_pointcard_type",$where,$order);
	        include tpl("card_add");
			}
	break;
	
	case 'manage':
	if($status==1)
	{
		$where =" status='0'";
		}
	if($status==2)
	{
		$where =" status='1'";
		}	
	$info=$a->listinfo($table="pay_card",$where,$order="mtime",$page,20);
	include tpl("card_manage");
	break;
	
	case 'delete':
	  $a->delete($table="pay_card",$where="id",$id);
	  showmessage('╡ывВЁи╧╕ё║', $forward);
	break;
	}
?>