<include file="Public:header" />
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
        <include file="Public:wysiwyg" />
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
          <span class='info'><?php echo $whisper['createTime'] . " " .  $whisper['author'];?> <i class="icon-eye-open"></i> <?php echo $whisper['views'];?></span>
        </div>
      </div>
    </div>
  <?php endforeach;?>
</div>
<include file="Public:footer" />
