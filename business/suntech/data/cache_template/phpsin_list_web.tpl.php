<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('phpsin','header'); ?>
 <div class="content">
  <div class="list">
   <div class="listl">
    <div class="second"><span>��ҵ����</span></div>
    <div class="secondbt">
     <ul>
<?php $alls=$db->get_one("SELECT COUNT(*) AS count FROM sin_content a,sin_c_web b WHERE a.contentid=b.contentid ");?>
      <li><a href="index.php?file=list&catid=3"><strong style="color:#ff0000">����ģ��</strong><span>(<?php echo $alls['count'];?>)</span></a></li>
{tag_��Ŀ}
 <?php if(is_array($data)) foreach($data AS $n => $v) { ?>
<?php $DATA = get("SELECT * FROM `sin_category` WHERE `parentid` = '$v[parentid]'", 100, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
<?php $tols=$db->get_one("SELECT COUNT(*) AS count FROM sin_content a,sin_c_web b WHERE a.contentid=b.contentid AND a.catid=$r[catid]");?>
      <li><a href="<?php echo $r['url'];?>&pp=<?php echo $pp;?>&lang=<?php echo $lang;?>" title="<?php echo $r['name'];?>"><?php echo $r['name'];?><span>(<?php echo $tols['count'];?>)</span></a></li>
<?php } unset($DATA); ?>
<?php } ?>
<?php unset($data); ?>

     </ul>
    </div>
   </div>
   <div class="listr">
    <div class="pos"><span>��Ʒչʾ</span><div class="weizhi"><span>��ǰλ�ã�</span><a href="/">��ҳ</a><?php echo catpos($catid);?></div></div>
    <div class="shaixuan">
     <div class="shaixuanin">
      <h2>��Ʒɸѡ</h2>
      <p><span>Ʒ �ƣ�</span> <a href="index.php?file=list&catid=<?php echo $catid;?>&pp=&lang=<?php echo $lang;?>" <?php if($pp=="") { ?>class="selectd"<?php } ?>>ȫ��</a>  |  <a href="index.php?file=list&catid=<?php echo $catid;?>&pp=phpweb&lang=<?php echo $lang;?>" <?php if($pp==phpweb) { ?>class="selectd"<?php } ?>>phpweb</a>  |  <a href="index.php?file=list&catid=<?php echo $catid;?>&pp=dedecms&lang=<?php echo $lang;?>" <?php if($pp==dedecms) { ?>class="selectd"<?php } ?>>dedecms</a> |  <a href="index.php?file=list&catid=<?php echo $catid;?>&pp=phpsin&lang=<?php echo $lang;?>" <?php if($pp==phpsin) { ?>class="selectd"<?php } ?>>phpsin</a>  |  <a href="index.php?file=list&catid=<?php echo $catid;?>&pp=phpcms&lang=<?php echo $lang;?>" <?php if($pp==phpcms) { ?>class="selectd"<?php } ?>>phpcms</a></p>
      <p><span>�� �ԣ�</span> <a href="index.php?file=list&catid=<?php echo $catid;?>&pp=<?php echo $pp;?>&lang=" <?php if($lang=="") { ?>class="selectd"<?php } ?>>ȫ��</a>  |  <a href="index.php?file=list&catid=<?php echo $catid;?>&pp=<?php echo $pp;?>&lang=cn" <?php if($lang==cn) { ?>class="selectd"<?php } ?>>����</a>  | <a href="index.php?file=list&catid=<?php echo $catid;?>&pp=<?php echo $pp;?>&lang=en" <?php if($lang==en) { ?>class="selectd"<?php } ?>>Ӣ��</a> | <a href="index.php?file=list&catid=<?php echo $catid;?>&pp=<?php echo $pp;?>&lang=cnen" <?php if($lang==cnen) { ?>class="selectd"<?php } ?>>˫��[Ӣ��+����]</a></p>
    </div>
    </div>
    <div class="listmain">
     <ul>
<?php if($pp!="") { ?>
<?php $ppp="b.pp='$pp' AND";?>
<?php } ?>
<?php if($lang!="") { ?>
<?php $langs="b.lang='$lang' AND";?>
<?php } ?>
{tag_ģ���б�}
 <?php if(is_array($data)) foreach($data AS $n => $v) { ?>
      <li><a href="<?php echo $v['addr'];?>" target="_blank"><img src="<?php echo $v['thumb'];?>" alt="<?php echo $v['keywords'];?>"/></a><p><a href="<?php echo $v['addr'];?>" target="_blank"><?php echo $v['title'];?></a></p></li>
<?php } ?>
<?php unset($data); ?>
     </ul>
    </div>
    <div class="pages"><?php echo $pages['1'];?> </div>
   </div>
  </div>
 </div>
<?php include template('phpsin','footer'); ?>
