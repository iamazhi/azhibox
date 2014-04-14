<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
  <title><?php echo ($title); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="/Public/theme/default/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="/Public/theme/default/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="/Public/theme/default/style.css"/>
  <link rel="stylesheet" type="text/css" href="/Home/Tpl/default/Public/css/home.css"/>

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

<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="../" class="navbar-brand">Azhi's Blog</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        <li> <a href="/index.php/Azhi" target="_blank">关于我</a> </li>
      </ul>
      <ul class="nav navbar-nav  navbar-right">
        <li><a href="../getting-started">收藏</a></li>
        <li><a href="../css">漫谈</a></li>
        <li><a href="../components">轻语</a></li>
 <!--       <li><a href="../components">电台</a></li>
        <li><a href="../javascript">陈潇百世</a></li>
        -->
      </ul>
    </nav>
  </div>
</header>

  <div id="banner">
      <div class="container">
        <p>繁华尽处，寻一无人山谷，建一木制小屋，铺一青石小路，与你晨钟暮鼓，安之若素。</p>
      </div>
      <div id="bambooLeaf"><img src="/Public/theme/default/images/bamboo-leaf.png"></div>
    </div>



<style>
.ramble {
background: white;
border: 1px solid #CFCFCF;
box-shadow: 2px 2px 1px #aaaaaa;
padding: 15px;
}
.ramble .title {font-size:25px; margin-bottom:15px; color:#521314}
.ramble .mix   {margin-bottom:15px; color:#888}
</style>
<div class="container">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 ramble">
      <div class="title"> <?php echo ($ramble["title"]); ?></div>
      <div class="mix">
        <span><i class="icon-time"></i> <?php echo ($ramble["createTime"]); ?> </span>
        <span><i class="icon-user"></i> <?php echo ($ramble["author"]); ?> </span>
        <span><i class="icon-eye-open"></i> <?php echo ($ramble["views"]); ?> </span>
      </div>
      <div class="content">
        <?php echo ($ramble["content"]); ?>
      </div>
<?php echo ($ramble["tag"]); ?>
     </div>
    <div class="col-sm-2"></div>
</div>
  </body>
</html>