<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('phpsin','header'); ?>
 <div class="bannerer"><script language="javascript" src="http://4113.website.meiray.net/data/js.php?id=1"></script></div>
<div class="main">
  <div class="left">
    <div class="hh2">��Ŀ����</div>
    <div class="daohang">
      <ul>
        <li><a href="index.php?file=list&catid=3">��������</a></li>
        <li><a href="index.php?file=list&catid=9">��ϵ����</a></li>
        <li><a href="index.php?file=list&catid=6">��������</a></li>
      </ul>
    </div>
    <p style="padding-top:10px;"><img src="skin/images/lianxi.jpg" width="210" height="84" /></p>
  </div>
  <div class="right">
    <div class="hh3">
      <div class="location" style="float:right;">��ǰλ�ã�<a href="/">��վ��ҳ</a>���԰�</div>
      <div class="hh4">���԰�</div>
    </div>
    <div class="single"> 
      <form action="" method="post">
            <table width="100%" border="0" cellspacing="1">
  <tr>
    <td width="20%" style="text-align:right">���⣺</td>
    <td><input type="text" /></td>
    </tr>
  <tr>
    <td style="text-align:right">�����ˣ� </td>
    <td><input type="text"  name="info[title]"/></td>
  </tr>
  <tr>
    <td style="text-align:right">���䣺</td>
    <td ><input type="text"  name="info[email]"/></td>
  </tr>
  <tr>
    <td style="text-align:right">�������ݣ�</td>
    <td><label>
      <textarea name="info[content]" id="info[content]" cols="45" rows="5" ></textarea>
    </label></td>
  </tr>
  <tr>
    <td colspan="2" style="text-align:center">
      <input type="submit" name="button" id="button" value="�ύ" />��
        <input type="reset" name="button2" id="button2" value="����" />
     </td>
    </tr>
</table>
            </form>

</div>
  </div>
</div><?php include template('phpsin','footer'); ?>