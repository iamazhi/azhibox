<?php defined('IN_PHPJSJ') or exit('Access Denied'); ?><div class="footer">
  <p><img src="skin/images/xian.jpg" width="960" height="2" /></p>
  <div class="foot">

    <div class="banquan"> <?php echo $PHPSIN["copyright"];?></div>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $("#divStayTopleft").setScroll();
    });
   
    //跟随滚动条滚动
    $.fn.setScroll = function() {
        var obj = $(this);
        var cssTop = obj.offset().top;
        $(window).scroll(function() {
            var offsetTop = cssTop + $(window).scrollTop() + "px";
            obj.animate({ top: offsetTop }, { duration: 900, queue: false });
        });
    }
</script>

<style type="text/css">
* { margin:0px; padding:0px; border:0px; list-style:none; text-decoration:none;}
.backToTop{display: none;position:fixed;_position: absolute;bottom: 50px;cursor: pointer;z-index:8000}
#iconDivMain_bak{z-index:7999;width:90px;cursor:pointer;height:350px;overflow:hidden;position:fixed;_position:absolute;display:none;top:150px;_top:expression_r(eval_r(document.compatMode &amp;&amp; document.compatMode=='CSS1Compat') ? documentElement.scrollTop+150+"px": document.body.scrollTop + (document.body.clientHeight-350) - 1);}
.footer img,#iconDivMain img,.backToTop img{background:url("source/foot-qq_bg.png") no-repeat}

#iconDivMain{position:absolute; right:50px; top:50px;  z-index:65535; width:90px;cursor:pointer;height:425px;overflow:hidden;}
.qq_top { background:url(skin/images/top.gif) left top no-repeat; width:110px; height:55px;} 
.qq_top img { float:right; margin-right:10px; margin-top:5px; display:inline;}
.qq_main { border-top:0px; border-bottom:0px; background:url(skin/images/main_bg.gif) no-repeat;}
.qq_main ul { background:#FFF; margin:0 5px; font-size:12px; border:1px solid #ccc; border-top:0px; border-bottom:0px;}
.qq_main ul li { line-height:26px; height:26px; }
.qq_main ul li a { color:#000;}
.qq_main ul li img { float:left; margin-left:10px;}
.qq_bottom { background:url(skin/images/bottom.gif) left bottom no-repeat; width:110px; height:40px; }
.qq_bottom img { width:79px; margin-top:10px; margin-left:15px;}
</style>

<script language="JavaScript" type="text/javascript">
function picsize(obj,MaxWidth){
  img=new Image();
  img.src=obj.src;
  if (img.width>MaxWidth)
  {
    return MaxWidth;
  }
  else
  {
    return img.width;
  }
}
function CloseQQ()
{
divStayTopleft.style.display="none";
return true; 
}
var online= new Array();
</script>
   <div id="divStayTopleft" style=" POSITION: absolute;right:10px; top:50px;  z-index:65535; background:url(skin/images/bg_07.gif) left top repeat-x; width:110px; ">
      <div class="qq_top"><a onclick="CloseQQ()" href="javascript:;"><img src="skin/images/close.gif" width="12" height="12"/></a></div>
      <div class="qq_main">
         <ul>
<?php $qq=explode(',',$PHPSIN[qq]);?>
<?php $taobao=explode(',',$PHPSIN[taobao]);?>
<?php if(is_array($taobao)) foreach($taobao AS $key => $v) { ?>
            <li><a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&amp;uid=<?php echo $v;?>&amp;site=cntaobao&amp;s=1&amp;charset=utf-8" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&amp;uid=<?php echo $v;?>&amp;site=cntaobao&amp;s=1&amp;charset=utf-8" alt="点击这里给我发消息" /></a></li>
<?php } ?>
<?php if(is_array($qq)) foreach($qq AS $key => $val) { ?>
   <li><a target="blank" href="tencent://message/?uin=<?php echo $val;?>&amp;Site=在线客服&amp;Menu=yes"><img src="skin/images/top_25.gif" /></a></li>

<?php } ?>

</ul></div>
      <div class="qq_bottom"><a onclick="CloseQQ()" href="http://www.meiray.com" target="_blank"><img src="skin/images/kefu.gif" width="69" height="14" /></div>
     </div>