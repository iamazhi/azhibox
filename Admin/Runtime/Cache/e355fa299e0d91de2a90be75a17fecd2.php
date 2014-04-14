<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
  <title><?php echo ($title); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="/Public/theme/default/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="/Public/theme/default/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="/Public/theme/default/style.css"/>
  <link rel="stylesheet" type="text/css" href="/Admin/Tpl/default/Public/css/admin.css"/>

  <script type='text/javascript' src='/Public/js/jquery.js'></script>
  <script type='text/javascript' src='/Public/js/bootstrap/bootstrap.min.js'></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


<nav class='navbar navbar-fixed-top' role='navigation' id='header'>

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
      <li><a href='/admin.php/Site'>收藏</a></li>
      <li><a href='/admin.php/Ramble'>漫谈</a></li>
      <li><a href='/admin.php/Whisper'>轻语</a></li>
      <li><a href='/admin.php'>陈潇百世</a></li>
    </ul>
    <ul class='nav navbar-nav navbar-right'>
      <li class='dropdown'><a href='###' class='dropdown-toggle' data-toggle='dropdown'><i class='icon-globe icon-large'></i> &nbsp;简体<span class='caret'></span></a>
        <ul class='dropdown-menu'>
          <li><a rel='nofollow' href='javascript:selectLang("zh-tw")'>繁体</a></li>
          <li><a rel='nofollow' href='javascript:selectLang("en")'>English</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href='/' target='_blank' class='navbar-link'><i class="icon-home icon-large"></i> 前台</a></li>
      <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-large"></i>阿智<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href='/' data-toggle='modal'>修改密码</a></li>
          <li><a href='/admin.php/User/logout'>退出</a></li>
        </ul>
      </li>
    </ul>  
  </div>
</nav>

<style>
.panel-actions a{color:green}
</style>
<div class="container">
<div class="clearfix">
  <div class='panel panel-success'>
    <div class='panel-heading'>
      <strong><i class="icon-list"></i> 漫谈列表</strong>
      <div class='panel-actions'><a href='/admin.php/Ramble/create'><i class='icon-plus icon-2x'></i></a> </div>
    </div>
    <table class='table table-hover table-striped tablesorter'>
      <thead><tr><th>ID</th><th>名称</th><th>标签</th><th>作者</th><th>创建时间</th><th>查看次数</th><th>操作</th> </tr> </thead>
      <tbody>
        <?php if(is_array($rambles)): foreach($rambles as $key=>$ramble): ?><tr>
          <td><?php echo ($ramble["id"]); ?></td>
          <td><a href='/index.php/Ramble/read/<?php echo ($ramble["id"]); ?>' target="_blank"><?php echo ($ramble["title"]); ?></a></td>
          <td><?php echo ($ramble["tag"]); ?></td>
          <td><?php echo ($ramble["author"]); ?></td>
          <td><?php echo ($ramble["createTime"]); ?></td>
          <td><?php echo ($ramble["views"]); ?></td>
          <td>
            <a href='/admin.php/Ramble/edit/<?php echo ($ramble["id"]); ?>'><i class='icon-edit icon-large'></i></a> 
            <a href='/admin.php/Ramble/delete/<?php echo ($ramble["id"]); ?>'><i class='icon-remove icon-large'></i></a>
          </td>
        </tr><?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>
</div>
  </body>
</html>