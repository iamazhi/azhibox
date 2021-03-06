<include file="Public:header" />
<style>
a:hover {text-decoration:none}

#newBox{
background: #fff;
border: 1px solid #f8c509;
border-bottom: none;
position:relative;
margin-bottom:0px;
}
#newBox input , #newBox textarea{border-radius:0px; border:none}
#newBox textarea  {border-bottom: 1px solid #f8c509;}

.siteBox {
position:relative;
background: #fff;
border: 1px solid #ccc;
background: -webkit-gradient(linear, 0% 20%, 0% 100%, from(#fff), to(#fff), color-stop(.1,#f3f3f3));
background: -webkit-linear-gradient(0% 0%, #fff, #f3f3f3 10%, #fff);
background: -moz-linear-gradient(0% 0%, #fff, #f3f3f3 10%, #fff);
background: -o-linear-gradient(0% 0%, #fff, #f3f3f3 10%, #fff);
-webkit-box-shadow: 0px 3px 30px rgba(0, 0, 0, 0.1) inset;
-moz-box-shadow: 0px 3px 30px rgba(0, 0, 0, 0.1) inset;
box-shadow: 0px 3px 30px rgba(0, 0, 0, 0.1) inset;
-moz-border-radius: 0 0 6px 0 / 0 0 50px 0;
-webkit-border-radius: 0 0 6px 0 / 0 0 50px 0;
border-radius: 0 0 6px 0 / 0 0 50px 0;
}

.cell  {margin-bottom:15px;}
.title {height:30px; padding:5px;}
.desc  {height:120px; padding:5px; border-bottom: 1px solid #ccc; border-top:1px solid #ccc}
.mix   {height:30px; padding:5px; color:#888; font-size:12px}
.mix .editAction a{color:green}
.mix .info {float:right;}

#createAction {position:absolute; top:80px; right:-20px; z-index:999;}
.removeAction {position:absolute; right:0px; color:#aaa; top:-4px}
</style>

<script>
   $(function(){
        $(".siteBox").mouseover(function(){
            $(this).find(".editAction").prop("hidden", false);
            $(this).find(".removeAction").prop("hidden", false);
        });
        $(".siteBox").mouseout(function(){
            $(this).find(".editAction").prop("hidden", true);
            $(this).find(".removeAction").prop("hidden", true);
        });

        $("#createAction").bind("click", function(){
            var fields = ["name", "url", "desc"];
            for(k in fields) 
            {
                var current = $("form [name=" + fields[k] + "]");
                if(current.val() == "")
                {
                    current.css("background", "#f8c509");
                    current.prop("placeholder", "放空作甚");
                    return;
                }
                else
                {
                    current.css("background", "white");
                }
            }
            $("form").submit();
        });

        $(".editAction").bind("click", function(){
            var currentBox = $(this).parent().parent();
            var id   = currentBox.find("div.hidden").text();
            var name = currentBox.find("div.title a").text();
            var url  = currentBox.find("div.title a").attr('href');
            var desc = currentBox.find("div.desc").text();
            $("#newBox [name=name]").val(name);
            $("#newBox [name=url]").val(url);
            $("#newBox [name=desc]").val(desc);
            $("form").attr("action", "/admin.php/Site/create/" + id);
        });

    });
</script>

<div class="row">
  <div class="col-md-1 col-sm-2 col-xs-3">
    <div class="affix">
      <ul class="nav bs-sidenav">
        <li style="background: #b5da9c"> <a href="#js-overview">最火</a></li>
        <li> <a href="#js-overview">最新</a></li>
      </ul>
    </div>
  </div>
  <div class="col-md-11 col-sm-10 col-xs-9">

    <div class='col-md-2 col-sm-4 col-xs-12 cell'>
      <form id='newBox' action='/admin.php/Site/create' method='post' name='siteForm'>
        <input class="form-control" name="name" placeholder="名称">
        <input type='url' class="form-control" name='url' placeholder="url">
        <textarea class="form-control" name='desc' rows=5 placeholder="描述（限250个字）"></textarea>
        <a id='createAction' href='#' type='submit'><i class="icon-angle-right icon-2x"></i> </a>
      </form>
    </div>

    <?php foreach($sites as $site):?>
      <div class='col-md-2 col-sm-4 col-xs-12 cell'>
        <div class='siteBox'>
          <a class='removeAction' hidden="true" href="/admin.php/Site/delete/<?php echo $site['id']?>"><i class='icon-remove'></i></a>
          <div class='hidden'><?php echo $site['id'];?></div>
          <div class='title'><a href="<?php echo $site['url']?>" target='_blank'><?php echo $site['name']?></a></div>
          <div class='desc'><?php echo $site['desc']?></div>
          <div class='mix'>
            <span class='editAction' hidden="true"><a href='#'><i class="icon-edit"></i></a></span>
            <span class='info'><?php echo substr($site['createTime'], 0, 10) . " " .  $site['author'];?> <i class="icon-eye-open"></i> <?php echo $site['views'];?></span>
          </div>
        </div>
      </div>
    <?php endforeach;?>

  </div>
</div>
<include file="Public:footer" />
