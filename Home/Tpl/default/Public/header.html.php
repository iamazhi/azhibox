<include file="Public:headerlite" />
<script>
$(function(){
    $("a[id$=Index]").removeClass("active");
    $("#{$Think.MODULE_NAME}Index").addClass("active");
    $("#{$Think.MODULE_NAME}Index").append("<i class='icon-leaf'></i>");
})
</script>
<style>
    header.navbar nav ul.nav li {position:relative}
    header.navbar nav ul.nav li a.active i{position:absolute; left:20px; top:32px;}
</style>

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
        <li><a id="SiteIndex" href="/index.php/Site" class="active">收藏</a></li> 
        <li><a id="RambleIndex" href="/index.php/Ramble">漫谈</a></li>
        <li><a id="WhisperIndex" href="/index.php/whisper">轻语</a></li>
        <li><a id="CommentIndex" href="/index.php/Comment">留言</a></li>
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


