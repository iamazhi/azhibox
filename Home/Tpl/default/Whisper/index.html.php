<include file="Public:header" />
<style>
#whisperBox {height: 100%; width:100%;}
.whisper {float: left; width: 300px; min-height: 250px; border-right: 1px solid white;}
.whisper .content {padding: 10px;}
</style>
<div id="whisperBox">
     <foreach name="whispers" item="whisper">
     <div class="whisper">
       <div class="content">{$whisper.content}</div>
     </div>
     </foreach>
</div>
<include file="Public:footer" />
