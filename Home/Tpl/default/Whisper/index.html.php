<include file="Public:header" />
<link rel="stylesheet" type="text/css" href="/Public/theme/default/impress.css"/>
<div id="impress">
     <?php $dataX = 0; $dataY = 0?>
     <foreach name="whispers" item="whisper">
     <?php
        $rand = rand(-1, 1);
        while(!$rand) $rand = rand(-1, 1);
        $dataX += $rand * rand(500, 1000); 
        $dataY -= $rand * rand(1000, 2000); 
     ?>
          <div class="step" data-x=<?php echo $dataX ?> data-y=<?php echo $dataY ?> data-rotate=<?php echo rand(0, 180)?> data-scale=<?php echo rand(1, 3)?> data-z=<?php echo rand(-100, 100)?> data-rotate-x=<?php echo rand(-40, 40)?> data-rotate-y=<?php echo rand(-20, 20)?> data-rotate-z=<?php echo rand(-30, 30)?>>
       <p>{$whisper.content}</p>
     </div>
     </foreach>
     <div id="overview" class="step" data-x="3000" data-y="1500" data-scale="8">
    <div class="hint"> <p>Use a spacebar or arrow keys to navigate</p> </div>
</div>

<script>
if ("ontouchstart" in document.documentElement) { 
    document.querySelector(".hint").innerHTML = "<p>Tap on the left or right to navigate</p>";
}
</script>
<script src="/Public/js/impress/impress.js"></script>
<script>impress().init();</script>

<include file="Public:footer" />
