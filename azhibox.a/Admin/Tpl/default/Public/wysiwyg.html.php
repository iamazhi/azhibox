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
