<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('phpsin','header'); ?>
<div id="banner"><img src="skin/images/banner.jpg"></div>
<div id="slogan"><p>���ǳ���Ϊ���ṩ���ȶ��Ĳ�Ʒ����רҵ�ļ�����������ȫ������ķ���</p></div>
<div id="ours">
  <div class="our">
    <div>
      <h2><a class="custom-font" href="index.php?file=list&catid=3">���ǵĹ�˾</a></h2>
      <p>���ǳ�����1994�꣬��רҵ�������綥��Ʒ�ƺ������ļ������з������Զ�������ר���ĸ��¼�����ҵ��</p>
    </div>
  </div>
  <div class="our">
    <div>
      <h2><a class="custom-font" href="index.php?file=list&catid=5">���ǵĲ�Ʒ</a></h2>
      <p>������ŷ��������ƺ����豸���Ĳķ����й������̣��編��AIRLIQUIDE/SAF��AXXAIR���¹�ORBITALUM��STAPLA�ȣ� ��˾���������������ִ��ʵ����Ӻ��������庸�ӻ��������ڵ����ӻ��ȡ�</p>
    </div>
  </div>
  <div class="our">
    <div>
      <h2><a class="custom-font" href="index.php?file=list&catid=46">���ǵķ���</a></h2>
      <p>�����ṩ�Ӽ���������������죬��װ���Ե���ѵ��Ա��ȫ�����Ƶķ���</p>
    </div>
  </div>
  <div class="our">
    <div>
      <h2><a class="custom-font" href="index.php?file=list&catid=4">���ǵļ���</a></h2>
      <p>�����зǳ�רҵ�ļ����˲ţ�����ʱ����ʹ��ں�������Ŀ���ԺУ���о��������ֽ��ܵ���ϵ����ʱ���ռ�������ҵ���г��Ķ�̬</p>
    </div>
  </div>
</div>

<div id="services">
  <div id="firstBox">
    <div class="cellBox11"><div class="cell padding-l padding-r padding-b"><img src="skin/images/Nipic_1659036_20110616131013393143.jpg"></div></div>
    <div class="cellBox21" id="customBox1"><div class="cell padding-b padding-l"><div><a class="custom-font">������ҵ</a></div></div></div>
    <div class="cellBox32"><div class="cell padding-t padding-l"><img src="skin/images/Nipic_5289513_20100630130047069195.jpg"></div></div>
  </div>
  <div id="middleBox">
    <div class="cellBox32"><div class="cell padding-b"><img src="skin/images/Nipic_8981243_20120521092023333000.jpg"></div></div>
    <div class="cellBox11"><div class="cell padding-t padding-r"><img src="skin/images/Nipic_6842469_20121220194403229185.jpg"></div></div>
    <div class="cellBox21"><div class="cell padding-t padding-l"><img src="skin/images/Nipic_8981243_20120521092023756000.jpg"></div></div>
  </div>
  <div id="thirdBox">
    <div class="cellBox21"><div class="cell padding-r padding-b"><img src="skin/images/Nipic_8981243_20120521092019979000.jpg"></div></div>
    <div class="cellBox11"><div class="cell padding-l padding-b"><img src="skin/images/Nipic_11840347_20130820104422632178.jpg"></div></div>
    <div class="cellBox11"><div class="cell padding-t padding-r padding-b"><img src="skin/images/Nipic_9808227_20120424153557179114.jpg"></div></div>
    <div class="cellBox22"><div class="cell padding-t padding-l"><img src="skin/images/Nipic_218586_20100319131605084941.jpg"></div></div>
<div class="clear"></div>
    <div class="cellBox11" id="customBox2">
      <div class="cell padding-t padding-r">
        <div><a class="custom-font" href="index.php?file=list&catid=46">����..</a></div>
      </div>
    </div>
  </div>
</div>

<div id="friends">
  <div class="title"><a class="custom-font" >��������</a></div>
  <div class="desc"><p>���Ǿ�����������ѣ���Ӧ�ð����ǽ������Ž��������Χ��--ɯʿ����</p></div>
  <div class="links">
    <?php $DATA = get("SELECT * FROM `sin_link` WHERE linktype=2 AND passed=1", 20, 0, "", "");foreach($DATA AS $n => $r) { $n++;?>
     <a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['name'];?></a>
    <?php } unset($DATA); ?>
  </div>

</div>

<div id="liteFooter">
  <div class="leftBox">
    <div>
      <h2 class="custom-font" >ֻҪ�нӴ����ͻ����ջ�</h2>
      <p>--���й��������ܵ��Ĺ�Ӧ��</p>
    </div>
  </div>
  <div class="rightBox">
    <div><a class="custom-font" href="index.php?file=list&catid=5">�������</a></div>
  </div>
</div>

<div id="footer">
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
</div>

<?php include template('phpsin','footer'); ?>
