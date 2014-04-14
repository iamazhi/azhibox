<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
  <title><?php echo ($title); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="/Public/theme/default/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="/Admin/Tpl/default/Public/css/admin.css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


    <nav class='navbar navbar-inverse navbar-fixed-top' role='navigation' id='mainNavbar'>
      <div class='navbar-header'>
        <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-ex1-collapse'>
          <span class='sr-only'>Toggle navigation</span>
          <span class='icon-bar'></span>
          <span class='icon-bar'></span>
          <span class='icon-bar'></span>
        </button>
      </div>
      <div class='collapse navbar-collapse navbar-ex1-collapse'>
        <ul class='nav navbar-nav'>
          <li class='active'><a href='/admin.php'>首页</a></li>
          <li><a href='/admin.php/Site/browse'>收藏</a></li>
          <li><a href='/admin.php'>漫谈</a></li>
          <li><a href='/admin.php'>轻语</a></li>
          <li><a href='/admin.php'>陈潇百世</a></li>
        </ul>
        <ul class='nav navbar-nav navbar-right'>
          <li class='dropdown'><a href='###' class='dropdown-toggle' data-toggle='dropdown'><i class='icon-globe icon-large'></i> &nbsp;简体<span class='caret'></span></a>
          <ul class='dropdown-menu'><li><a rel='nofollow' href='javascript:selectLang("zh-tw")'>繁体</a></li><li><a rel='nofollow' href='javascript:selectLang("en")'>English</a></li></ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right"><li><a href='/' target='_blank' class='navbar-link'><i class="icon-home icon-large"></i> 前台</a>
        </li><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-large"></i> demo <b class="caret"></b></a><ul class="dropdown-menu"><li><a href='/chanzhiadmin.php?m=user&f=changePassword' data-toggle='modal'>修改密码</a>
        </li><li><a href='/admin.php/User/logout'>退出</a>
        </li></ul></li></ul>  </div>
    </nav>



<div class="container">

  <div class="page-header">
    <h1>添加收藏</h1>
  </div>

  <form class="form-horizontal" role="form" method="post">
    <div class="form-group">
      <label class="col-sm-2 control-label">标题</label>
      <div class="col-sm-10">
        <input class="form-control" name="name" placeholder="The name of website" value='<?php echo ($site["name"]); ?>'>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Url</label>
      <div class="col-sm-10">
        <input type='url' class="form-control" name='url' placeholder="The url of website" value='<?php echo ($site["url"]); ?>'>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">描述</label>
      <div class="col-sm-10">
        <textarea class="form-control" name='desc' placeholder="The describe of website" ><?php echo ($site["desc"]); ?></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
      </div>
    </div>
  </form>

</div>
    <script type='text/javascript' src='/Public/js/jquery.js'></script>
    <script type='text/javascript' src='/Public/js/bootstrap/bootstrap.min.js'></script>
  </body>
</html>