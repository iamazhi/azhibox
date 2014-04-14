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
html {background:url("/Public/theme/default/images/sand.jpg");}
body {background:url("/Public/theme/default/images/whisper-bg.jpg") repeat-x; background-size: 100% 250px;}

#newWhisper { margin-bottom: 30px}
#newWhisper #editor { background-color:transparent; border:none; color: white; min-height:100px;}
#newWhisper #editor:focus {border:1px solid white; }

.whisper-box {
background: transparent;
border: 1px solid #ddd;
}

.cell    {margin-bottom:15px; padding-right:5px; padding-left:5px;}
.content {padding:5px; color:#555; word-wrap:break-word}
.mix     {height:30px; padding:5px; color:#888;}
.mix .edit-action a{color:green}
.mix .info {float:right;}

.remove-action {position:absolute; right:5px; color:#aaa; top:-4px}

</style>
<script>
   $(function(){
        $("#editor").text("少年，说两句？");
        $(".whisper-box").mouseover(function(){
            $(this).css("border", "1px solid skyblue")
            $(this).find(".edit-action").prop("hidden", false);
            $(this).find(".remove-action").prop("hidden", false);
        });
        $(".whisper-box").mouseout(function(){
            $(this).css("border", "1px solid #ddd")
            $(this).find(".edit-action").prop("hidden", true);
            $(this).find(".remove-action").prop("hidden", true);
        });

        $("#resetAction").bind("click", function(){ $("#editor").text(""); });
        $("#createAction").bind("click", function(){ 
            var imgWidth  = 250;
            var imgHeight = (250 * $("#editor").find("img").height()) / $("#editor").find("img").width();
            $("#editor").find("img").css({width: imgWidth + "px", height: imgHeight + "px"});
            $.post($("form").attr("action"), { content: $("#editor").html() }, function(data){
                window.location.reload(); 
            });
        });

        $(".edit-action").bind("click", function(){
            var currentBox = $(this).parent().parent();
            var id         = currentBox.find("div.hidden").text();
            var content    = currentBox.find("div.content").html();
            $("#editor").html(content);
            $("form").attr("action", $("form").attr("action") + "/" + id);
        });

    });
</script>

<div class="container" id="newWhisper">
  <form role="form" method="post" action="/admin.php/Whisper/create">
    <div class="col-md-2 col-sm-4 col-xs-6"><a id="resetAction" href="#"><img src="/Public/theme/default/images/seagull2.png"/></a></div>
    <div class="col-md-8 col-sm-4 col-xs-6">
        <script type='text/javascript' src='/Public/js/hotkeys/jquery.hotkeys.js'></script>
<script type='text/javascript' src='/Public/js/prettify/prettify.js'></script>
<script type='text/javascript' src='/Public/js/wysiwyg/bootstrap-wysiwyg.js'></script>
<script>
$(function(){
    $("#editor").bind("focus", function(){ $(".btn-toolbar").prop("hidden", false); });

    $(document).click(function() { $(".btn-toolbar").prop("hidden", true); });
    $('#editor').click(function(event){ event.stopPropagation(); });
    $('.btn-toolbar').click(function(event){ event.stopPropagation(); });

    $("#editor").wysiwyg();
});
</script>
<style>
#editor {padding:10px;}
.btn-group [class^="icon-"] {color:black}
.btn-group input[type=file] {opacity: 0; position: absolute; top: 0px; left: 0px; width: 41px; height: 30px;}

.btn-toolbar .btn-group .btn i{ color:white}
.btn-toolbar .btn-group a.btn-info {background:transparent; border:none;}
.btn-toolbar .btn-group a.btn-info i{color:#333}

#voiceBtn {
width: 10px;
background-color: transparent;
transform: scale(2.0, 2.0);
-webkit-transform: scale(2.0, 2.0);
-moz-transform: scale(2.0, 2.0);
border: transparent;
cursor: pointer;
box-shadow: none;
-webkit-box-shadow: none;
}

</style>
  <div id="editor"></div>
  <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor" hidden="true">
    <div class="btn-group">
      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
        <ul class="dropdown-menu">
        </ul>
      </div>
    <div class="btn-group">
      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
        <ul class="dropdown-menu">
        <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
        <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
        <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
        </ul>
    </div>
    <div class="btn-group">
      <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
      <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
      <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
      <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
    </div>
    <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
        <div class="dropdown-menu input-append">
          <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
          <button class="btn" type="button">Add</button>
        </div>
      <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>
    </div>
    <div class="btn-group">
      <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
      <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
    </div>
    <div class="btn-group">
      <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
      <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
    </div>
    <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
  </div>

    </div>
    <div class="col-md-2 col-sm-4 col-xs-6"><a id="createAction" href="#"><img src="/Public/theme/default/images/seagull3.png"/></a></div>
  </form>
</div>

<div>
  <?php foreach($whispers as $whisper):?>
    <div class='col-md-3 col-sm-4 col-xs-12 cell'>
      <div class='whisper-box'>
        <a class='remove-action' hidden="true" href="/admin.php/Whisper/delete/<?php echo $whisper['id']?>"><i class='icon-remove'></i></a>
        <div class='hidden'><?php echo $whisper['id'];?></div>
        <div class='content'> <?php echo $whisper['content']; ?> </div>
        <div class='mix'>
          <span class='edit-action' hidden="true"><a href='#'><i class="icon-edit"></i></a></span>
          <span class='info'><?php echo $whisper['createTime'] . " " . $whisper['author'];?> <i class="icon-eye-open"></i> <?php echo $whisper['views'];?></span>
        </div>
      </div>
    </div>
  <?php endforeach;?>
</div>
  </body>
</html>