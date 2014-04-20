<?php
defined('IN_PHPJSJ') or exit('Access Denied');
$a = new all();
switch($action)
{
	
	case'manage':
        $info=$a->listinfo($table="attachment", $where = '', $order = 'listorder,uploadtime desc');
	include tpl("attachment_manage");
	break;
		
	case 'delete':


        foreach ($aid as $k=>$v)
        {
          $is_aid=$aid[$k];
          $info=$a->get("attachment","aid = $is_aid");
          $filepath=UPLOAD_URL.$info["filepath"];
          unlink($filepath);

          $files=explode("/",$info["filepath"]);
          $file=UPLOAD_URL.$files[0]."/".$files[1];
          $years=UPLODE_URL.$files[0];
          rmdir($years);
          rmdir($file); 
         }


	$result = $a->delete("attachment","aid",$aid);
	if($result)  showmessage('操作成功！', "?file=attachment&action=manage");  else showmessage('操作失败！');
	break;

	case 'listorder':
		$result = $a->listorder($table='attachment',$listorders,$where='aid');
		if($result)
		{
			showmessage('操作成功！', $forward);
		}
		else
		{
			showmessage('操作失败！');
		}
		break;
		
	}
?>