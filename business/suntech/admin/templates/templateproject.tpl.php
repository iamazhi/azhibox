<?php 
defined('IN_PHPJSJ') or exit('Access Denied');
require ('header.tpl.php');
?>
<body>
<div>
<form action="?file=templateproject&action=update" method="post">
  <table align="center" cellpadding="0" cellspacing="1" class="table_list">
    <caption>ģ�巽������</caption>
    <tr>
      <th>��������</th>
      <th width="100">ģ��Ŀ¼</th>
      <th width="120">�޸�ʱ��</th>
      <th width="60">ϵͳĬ��</th>
      <th width="250">�������</th>
    </tr>
<?php 
if(is_array($templateprojects)){
	foreach($templateprojects as $basenames){
?>
    <tr>
      <td><input name="tempname[<?=$basenames['dir']?>]" type="text" value="<?=$basenames['name']?>"></td>
      <td class="align_l"><?=$basenames['dir']?></td>
      <td class="align_c">&nbsp;</td>
      <td class="align_c"><?php if($basenames['isdefault']){?>��<?php }?></td>
      <td class="align_c"><?php if($basenames['isdefault']){?><span class="gray">��ΪĬ��</span><?php }else{ ?><a href="?file=templateproject&action=setdefault&project=<?=$basenames['dir']?>">��ΪĬ��<?php } ?></a> 
<?php if($basenames['status']==$basenames['dir']){?>
            <a href="?file=templateproject&action=style&template=<?=$basenames['dir']?>&type=0">����</a>
<?php }else {?>
            <a href="?file=templateproject&action=style&template=<?=$basenames['dir']?>&type=1">ͣ��</a>
<?php }?>
      <a href="?file=templateproject&action=dir&dirname=<?=$basenames['dir']?>">��ϸ�б�</a></td>
    </tr>
<?php 
	}
}
?>
  </table>
  <div class="button_box"><input type="submit" name="submit" value=" ����ģ�巽������ "></div>
  </form>
  
  <table align="center" cellpadding="2" cellspacing="1" border="0" class="table_info" >
    <caption>��ʾ��Ϣ</caption>
  <tr>
    <td>
	1������ģ�巽���������� <font color="red">./templates/</font> Ŀ¼�£������Ҫ�����޸ģ���ͨ��ftp����Ŀ¼����Ϊ 777 ����Ӧ�õ���Ŀ¼��<br/>
	2����վ��ǰʹ�õ�ģ�巽��Ϊ��<font color="red"><?=$projects[TPL_NAME]?></font> ������·��Ϊ�� <font color="red">./templates/<?=TPL_NAME?>/</font> ������ģ�巽���ı仯����Ӱ����վǰ̨����ʾ��<br/>
	3���������Ҫ������վģ�巽��������µ�ģ�巽���ϴ��� <font color="red">./templates/</font> Ŀ¼ <br/>
	4���������ҪӦ���µ���վģ�巽������Ѹ�ģ�巽������ΪϵͳĬ�Ϸ��� <br/>
	</td>
  </tr>
</table>
</div>
</body>
</html>
