<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><?php include template('phpsin','header'); ?>
 <div class="bannerer"><script language="javascript" src="http://4113.website.meiray.net/data/js.php?id=1"></script></div>
<div class="main">
  <div class="left">
    <div class="hh2">栏目导航</div>
    <div class="daohang">
      <ul>
        <li><a href="index.php?file=list&catid=3">关于我们</a></li>
        <li><a href="index.php?file=list&catid=9">联系我们</a></li>
        <li><a href="index.php?file=list&catid=6">销售网络</a></li>
      </ul>
    </div>
    <p style="padding-top:10px;"><img src="skin/images/lianxi.jpg" width="210" height="84" /></p>
  </div>
  <div class="right">
    <div class="hh3">
      <div class="location" style="float:right;">当前位置：<a href="/">网站首页</a>留言板</div>
      <div class="hh4">留言板</div>
    </div>
    <div class="single"> 
      <form action="" method="post">
            <table width="100%" border="0" cellspacing="1">
  <tr>
    <td width="20%" style="text-align:right">标题：</td>
    <td><input type="text" /></td>
    </tr>
  <tr>
    <td style="text-align:right">留言人： </td>
    <td><input type="text"  name="info[title]"/></td>
  </tr>
  <tr>
    <td style="text-align:right">邮箱：</td>
    <td ><input type="text"  name="info[email]"/></td>
  </tr>
  <tr>
    <td style="text-align:right">留言内容：</td>
    <td><label>
      <textarea name="info[content]" id="info[content]" cols="45" rows="5" ></textarea>
    </label></td>
  </tr>
  <tr>
    <td colspan="2" style="text-align:center">
      <input type="submit" name="button" id="button" value="提交" />　
        <input type="reset" name="button2" id="button2" value="重置" />
     </td>
    </tr>
</table>
            </form>

</div>
  </div>
</div><?php include template('phpsin','footer'); ?>