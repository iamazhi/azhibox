<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=CHARSET?>" />
<title> ��ʾ��Ϣ</title>
<link href="admin/skin/common.css" rel="stylesheet" type="text/css">

<script language="javascript" src="images/js/common.js"></script>
</head>
<body style="margin-top:20px">
<table align="center" cellpadding="0" cellspacing="0" class="table_info" style="width:400px">
  <caption>��ʾ��Ϣ</caption>
  <tr>
    <td height="60" valign="middle" class="align_c"><?=$msg?></td>
  </tr>
  <tr>
    <td height="20" valign="middle" class="align_c"><?php if($url_forward == "goback"){?>
      <a href="javascript:history.go(-1);" >[ �����ﷵ����һҳ ]</a>
      <?php  }elseif($url_forward){?>
      <a href="<?=$url_forward?>">������������û���Զ���ת����������</a>
      <script>setTimeout("redirect('<?=$url_forward?>');", <?=$ms?>);</script>
      <?php } ?>
    </td>
  </tr>
</table>
<?php if(debug()){?>
<div class="align_c">Processed in
  <?=DEBUG_TIME?>
  second(s),
  <?=DEBUG_QUERIES?>
  queries
  <?php if(GZIP){?>
  , Gzip enabled
  <?php } ?>
</div>
<?php } ?>
</body>
</html>
