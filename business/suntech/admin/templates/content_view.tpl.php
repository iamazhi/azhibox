<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
include tpl('header');
?>
<script type="text/javascript" src="images/js/form.js"></script>
<style type="text/css" >
img { 
vertical-align: middle;
max-width:600px;   /* FF IE7 */
width:expression(this.width > 600 && this.width > this.height ? 600 : true);
overflow:hidden;
}
</style>
<body>

<table cellpadding="0" cellspacing="1" class="table_form">
    <caption>œÍœ∏–≈œ¢</caption>
<tr> 
      <th width="25%"><strong>ID</strong>
	  </td>
      <td><?=$_GET["contentid"]?></td>
    </tr>
<?php 
foreach($g as $k=>$d)
{
?>
<tr> 
      <th width="25%"><strong><?=$d["name"]?></strong>
	  </td>
      <td><? if($d["formtype"]!="image"){?><?=$info["".$d["field"].""]?><?}?><? if($d["formtype"]=="image"){ if($info["".$d["field"].""]!=""){?><img src="<?=$info["".$d["field"].""];?>"/><?}if($info["".$d["field"].""]==""){ ?><img src="/images/nopic.gif"/><? }}?></td>
    </tr>

<? }?>
</table>
</body>
</html>