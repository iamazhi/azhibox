<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><div id="footer">
  <div id="footerContent">
  <div>
<div>
  <div class="title"><a class="custom-font" href="index.php?file=list&catid=3">��������</a></div>
  <div class="desc">
<p>�麣����ά�����������޹�˾������1994�꣬��һ��רҵ���º��Ӳ�Ʒ���ۼ��Զ���ר���о�������ĸ��¼�����ҵ�� ����ռ�����30Ķ��һ�ڽ������4900ƽ����ӵ�к��ӣ������Զ�������е��Ƽ�����ȸ���רҵ���� �˲ż��ӹ��豸�����ṩ�Ӽ���������������죬��װ���Ե���ѵ����Ľ�Կ�׹���..
  <a href="index.php?file=list&catid=3">����>></a>
</p>
  </div>
</div>
  </div>

  <div>
<div>
  <div class="title"><a class="custom-font" href="index.php?file=list&catid=9">��ϵ����</a></div>
  <div class="desc">
<p><span class="icon-star">��</span> ��˾���ƣ��麣����ά�����������޹�˾</p>
<p><span class="icon-star">��</span> �绰��0756-6808989 4000-828-168</p>
<p><span class="icon-star">��</span> ���棺0756-6808966</p>
<p><span class="icon-star">��</span> ��˾���䣺sunteach.zh@gmail.com</p>
<p><span class="icon-star">��</span> ��ַ���㶫ʡ�麣�н����������������·1476��</p>
  </div>
</div>
  </div>

  <div>
   <div>
  <div class="title"><a class="custom-font" href="index.php?file=list&catid=5">��Ʒ�Ƽ�</a></div>
  <div class="desc">
<div>
<?php $data = tag('phpsin', '', "SELECT a.contentid,a.catid,a.title,a.style,a.thumb,a.url FROM `sin_content` a, `sin_content_position` p WHERE a.contentid=p.contentid AND p.posid=2 AND a.status=99  ".get_sql_catid(5)." ORDER BY a.contentid DESC", $page, 6, 5);$pages=$data[pages];$data=$data[data];?>
  <a href="<?php echo $data['1']['url'];?>" title="<?php echo str_cut($data[1][title],15);?>"><img src="<?php echo $data['1']['thumb'];?>" width="90" height="70" /></a>
  <a href="<?php echo $data['2']['url'];?>" title="<?php echo str_cut($data[2][title],15);?>"><img src="<?php echo $data['2']['thumb'];?>" width="90" height="70" /></a>
  <a href="<?php echo $data['3']['url'];?>" title="<?php echo str_cut($data[3][title],15);?>"><img src="<?php echo $data['3']['thumb'];?>" width="90" height="70" /></a>
  <a href="<?php echo $data['4']['url'];?>" title="<?php echo str_cut($data[4][title],15);?>"><img src="<?php echo $data['4']['thumb'];?>" width="90" height="70" /></a>
<?php unset($data); ?>
</div>
<div>
<?php $data = tag('phpsin', '', "SELECT a.contentid,a.catid,a.title,a.style,a.thumb,a.url FROM `sin_content` a, `sin_content_position` p WHERE a.contentid=p.contentid AND p.posid=2 AND a.status=99  ".get_sql_catid(5)." ORDER BY a.contentid DESC", $page, 6, 5);$pages=$data[pages];$data=$data[data];?>
  <a href="<?php echo $data['5']['url'];?>" title="<?php echo str_cut($data[5][title],15);?>"><img src="<?php echo $data['5']['thumb'];?>" width="90" height="70" /></a>
  <a href="<?php echo $data['6']['url'];?>" title="<?php echo str_cut($data[6][title],15);?>"><img src="<?php echo $data['6']['thumb'];?>" width="90" height="70" /></a>
  <a href="<?php echo $data['7']['url'];?>" title="<?php echo str_cut($data[7][title],15);?>"><img src="<?php echo $data['7']['thumb'];?>" width="90" height="70" /></a>
  <a href="<?php echo $data['8']['url'];?>" title="<?php echo str_cut($data[8][title],15);?>"><img src="<?php echo $data['8']['thumb'];?>" width="90" height="70" /></a>
<?php unset($data); ?>
</div>
  </div>
</div>
  </div>
  </div>
  <div id="copyRights">
    <span class="left custom-font"><?php echo $PHPSIN["icpno"];?></span>
    <span class="right custom-font">�ٶȷ�����̨����<span>
  </div>
</div>

</body>
</html>
