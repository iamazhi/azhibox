<include file="Public:headerlite" />
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
