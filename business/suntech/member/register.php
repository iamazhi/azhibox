<?php
require("../include/common.inc.php");
require CLASS_PATH."all.class.php";
$a=new all();

//if(!$M['allowregister']) message('����վ����ע�ᣬ������վ����Ա��ϵ');

$head['title'] = '���û�ע��'.'_'.($get["title"] ? $get["title"] : $PHPSIN['sitename']);
$head['keywords'] = $get["keywords"];
$head['description'] = $get["description"];
$head['icpno'] = $PHPSIN['icpno'];
$head['copyright'] = $PHPSIN['copyright'];


switch($action)
{
	case 'member':
	    $resutl=$a->get($table="member",$where="username='$username'");
		
		if(!$resutl)
		{
		@extract(new_htmlspecialchars($M));
		$info["password"]=md5(PASSWORD_KEY.$chk_password);
		$sql=$a->add($table='member',$info);
		$info['userid'] = $userid = $db->insert_id();
		$a->add($table='member_cache',$info);
		//$is["userid"]=$db->insert_id($sql);
		//$ddd=$a->add($table='member_detail',$is["userid"]);
		//$ids=$db->insert_id($sql);
		//echo $is["userid"];
		$info["userid"]=$userid;
		$info["regip"]=IP;
		$info["regtime"]=TIME;
		
		$member_info_fields = $db->get_fields(DB_PRE."member_info");
        foreach($info as $field=>$val)
        {
			if(in_array($field, $member_info_fields))
			{
				$moreinfo[$field] = $val;
			}
		}
		//$r['answer'] = md5($memberinfo['answer']);
		$a->add($table='member_info',$moreinfo);
		//��ȡ�û�ģ��
		   if($info["modelid"])
		   {
			  $model["userid"]=$userid;
	  	     $tablename = 'member_'.$MODEL[$info["modelid"]]['tablename'];
		     $a->add($table="$tablename",$model);
		    }
		   else
		    {
			  message('���ݴ���δ���û�ģ��',"../");
			 }

		message('ע��ɹ�',"../member/login.php");
		}
		else
		 {
		  message('�û����ѱ�ռ�ã�',"../member/register.php");	
		   }
	 break;
	
		case 'checkuser':
        if(!$a->is_username($value) || !$a->username_exists($value))
         {
	      exit($a->msg());
	        }
	        else
		     {
			  exit('success');
		       }
         break;
		 
		 case 'checkemail':
	     if(!$a->username_email($value,$userid))
         {
	        exit($a->msg());
	        }
	        else
		     {
		 	     exit('success');
	  	       }
		 break;
		 
		 default:
		 include template('member','reg');
		 break;
	}

?>
