<?php
defined('IN_PHPJSJ') or exit('Access Denied');
require tpl('header');
?>
<body>
<form name="search" method="get" action="">
<input type="hidden" name="file" value="<?=$file?>"> 
<input type="hidden" name="action" value="<?=$action?>"> 
<input type="hidden" name="catid" value="<?=$catid?>">



  <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption class="align_c">��Ϣ��ѯ</caption>
    <tr>
      <td class="align_c"><?=form::select_category('phpsin','0', 'catid','','������Ŀ',$catid)?> 
      <select name='field'>
      <option value='title' <?=$field == 'title' ? 'selected' : ''?> >����</option>
      <option value='username' <?=$field == 'username' ? 'selected' : ''?> >�û���</option>
      <option value='userid' <?=$field == 'userid' ? 'selected' : ''?> >�û�ID</option>
      <option value='contentid' <?=$field == 'contentid' ? 'selected' : ''?> >ID</option>
      </select>
      <input type="text" name="q" value="<?=$q?>" size="15" />&nbsp;
����ʱ�䣺<?=form::date('inputdate_start')?> - <?=form::date('inputdate_end')?>&nbsp;
<input type="submit" name="dosubmit" value=" ��ѯ " />
      </td>
    </tr>
  </table>
</form>

<form name="myform" method="post" action="">
 <table width="664" align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption class="align_c">��Ϣ����</caption>
    <tr>
      <th width="33">ѡ��</th>
      <th width="39">����</th>
      <th width="32">ID</th>
      <th width="135">����</th>
      <th width="62">״̬</th>
      <th width="56">��Ŀ</th>
      <th width="55">����</th>
      <th width="20%" class="align_c">����ʱ��</th>
      <th width="163">�������</th>
    </tr>
    <? foreach($info as $v) {
		$r=$category->get("","WHERE catid= ".$v["catid"]."");?>
    
    <tr>
      <td class="align_c"><input type="checkbox" name="contentid[]" value="<?=$v['contentid']?>" id="content_<?=$v['contentid']?>" /></td>
      <td class="align_l"><input type="text" name="listorders[<?=$v['contentid']?>]" value="<?=$v['listorder']?>" size="4" /></td>
      <td class="align_l"><?=$v["contentid"]?></td>
      <td class="align_l"><?=$v["title"]?></td>
      <td class="align_c"><?=$projects["".$v["status"].""]?></td>
      <td class="align_c"><?=$r["name"]?></td>
      <td class="align_c"><?=$v["username"]?></td>
      <td class="align_c"><?=date("Y-m-d H:i:s",$v["updatetime"])?></td>
      <td class="align_c"><a href="?file=content&action=view&contentid=<?=$v["contentid"]?>&modelid=<?=$v["modelid"]?>">�鿴</a> | <a href="?file=content&action=edit&catid=<?=$v["catid"]?>&modelid=<?=$v["modelid"]?>&contentid=<?=$v["contentid"]?>">�޸�</a> | ��־ </td>
    </tr>
    <? }?>
  </table>
  <?=$info["contentid"]?>
   <div class="button_box"><span style="width:60px"><a href="###" onClick="javascript:$('input[type=checkbox]').attr('checked', true)">ȫѡ</a>/<a href="###" onClick="javascript:$('input[type=checkbox]').attr('checked', false)">ȡ��</a></span>
   <input type="button" name="listorder" value=" ���� " onClick="myform.action='?file=<?=$file?>&action=listorder';myform.submit();"> 

   <input type="button" name="delete" value=" ɾ�� " onClick="myform.action='?file=<?=$file?>&action=delete';myform.submit();"> 
   
   <?php if($action == "inspect"){?>
    <input type="button" name="delete" value=" ͨ�� " onClick="myform.action='?file=<?=$file?>&action=bystatus';myform.submit();"> 
   <?php }?>
</div>
<div id="pages"><?=$c->pages?></div>
</form>

</body>
</html>
