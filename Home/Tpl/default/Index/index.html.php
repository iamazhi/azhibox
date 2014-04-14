<include file="Public:header" />

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
        <foreach name="rambles" item="ramble">
        <li>
          <h4 class="title"><i class="icon-lemon"></i> <a href='/index.php/Ramble/read/{$ramble.id}' target="_blank">{$ramble.title}</a></h4>
          <div class='content'>{$ramble.digest}</div>
          <div class='mix text-right'>
            <span class='mix'>
            <i class="icon-time"></i> {$ramble.createTime} 
            <i class="icon-user"></i> {$ramble.author}
            <i class="icon-eye-open"></i> {$ramble.views}
            </span>
          </div>
        </li>
        </foreach>
      <ul>
    </div>

  </div>
  <div class="col-md-4 col-sm-12 col-xs-12 " id='rightBox'>
    <div id='whisperBox'>
      <ul>
        <foreach name="whispers" item="whisper">
        <li>
          <i class="icon-leaf icon-large"></i>
          <div class="content">{$whisper.content}</div>
          <div class='mix'><span class='info'><i class="icon-time"></i> {$whisper.createTime} <i class="icon-user"></i> {$whisper.author}</span></div>
        </li>
        </foreach>
      <ul>
    </div>
  </div>
</div>
</div>
<include file="Public:footer" />
