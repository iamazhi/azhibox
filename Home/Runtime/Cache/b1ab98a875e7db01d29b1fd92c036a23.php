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
#leftBox {border-top: 3px solid #a1b45c; border-right: 1px solid #a1b45c}
#rightBox {border-top: 3px solid #a1b45c; border-left: 1px solid #a1b45c}

#siteBox, #rambleBox { margin-top:15px;}
      
#rambleBox ul {
    padding-left:0px;
}
#rambleBox > ul > li {
background:white;
list-style: none;
margin-top:15px;
border:1px solid #cfcfcf;
padding:15px;
}

#rambleBox > ul > li > h4{
margin:0px;
padding-bottom:10px;
border-bottom:1px solid #ccc;
}

#rambleBox > ul > li > h4 > a{
color:#333;
}
#rambleBox > ul > li > h4 > a:hover{
color: #737373;
text-decoration: none;
}

#rambleBox .title { border-bottom: 1px solid #bbc086; padding-bottom:10px}
#rambleBox .title i { color: #ccff33}
#rambleBox .title a { color: #666633; font-size:16px;}
#rambleBox .content{ padding-top:15px; padding-bottom:15px;}
#rambleBox .mix{ padding-top:10px; font-size: 12px}
#rambleBox .mix i[class^=icon] {color: #99CC99}

#whisperBox { margin-top:15px; margin-left:15px}
#whisperBox > ul {padding-left:0px}
#whisperBox > ul > li {list-style:none; border:1px solid #cfcfcf; padding:15px; margin-top:15px; background:white; position:relative}
#whisperBox > ul > li > .content {border-bottom: 1px solid #BBC086; padding-bottom:10px;}
#whisperBox > ul > li > .mix {padding-top:10px; font-size:12px; text-align:right}
#whisperBox .icon-leaf {color: #009900; position:absolute; left:-31px; top:0px;}

</style>

<script>
$(function(){
    $("#rambleBox ul li .content").find("img").each(function(){
        if($(this).width() > $("#rambleBox ul").width()) $(this).width("100%");
    })
});
</script>

<div class="container">

<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row">
  <div class="col-md-8 col-sm-12 col-xs-12" id='leftBox'>

    <div id='rambleBox'>
      <ul>
        <?php if(is_array($rambles)): foreach($rambles as $key=>$ramble): ?><li>
          <div class="title"><i class="icon-lemon"></i> <a href='/index.php/Ramble/read/<?php echo ($ramble["id"]); ?>' target="_blank"><?php echo ($ramble["title"]); ?></a></div>
          <div class='content'><?php echo ($ramble["digest"]); ?></div>
          <div class='mix text-right'>
            <span class='mix'>
            <i class="icon-time"></i> <?php echo ($ramble["createTime"]); ?> 
            <i class="icon-user"></i> <?php echo ($ramble["author"]); ?>
            <i class="icon-eye-open"></i> <?php echo ($ramble["views"]); ?>
            </span>
          </div>
        </li><?php endforeach; endif; ?>
      <ul>
    </div>

  </div>
  <div class="col-md-4 col-sm-12 col-xs-12 " id='rightBox'>
    <div id='whisperBox'>
      <ul>
        <?php if(is_array($whispers)): foreach($whispers as $key=>$whisper): ?><li>
          <i class="icon-leaf icon-large"></i>
          <div class="content"><?php echo ($whisper["content"]); ?></div>
          <div class='mix'><span class='info'><i class="icon-time"></i> <?php echo ($whisper["createTime"]); ?> <i class="icon-user"></i> <?php echo ($whisper["author"]); ?></span></div>
        </li><?php endforeach; endif; ?>
      <ul>
    </div>
  </div>
</div>
</div>
<div id="bambooForest"></div>
<style>
#bambooForest {width:100%; background:url("/Public/theme/default/images/bamboo-forest.png") repeat-x; height:250px;}
</style>
  </body>
</html>