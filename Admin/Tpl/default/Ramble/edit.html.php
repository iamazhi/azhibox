<include file="Public:header" />
<include file="Public:kindeditor" />
<div class="container">
  <div class='panel panel-info'>
    <div class="panel-heading"><i class='icon-plus'></i> 漫谈</div>
    <div class="panel-body">
      <form class="form-horizontal" method="post">
        <div class="form-group">
          <label class="col-sm-1 control-label">标题</label>
          <div class="col-sm-5"><input type="text" class="form-control" name="title" value="{$ramble.title}"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-1 control-label">内容</label>
          <div class="col-sm-10"><textarea name='content' rows='15' class='form-control webEditor'>{$ramble.content}</textarea></div>
        </div>
        <div class="form-group">
          <label class="col-sm-1 control-label">标签</label>
          <div class="col-sm-5"><input type='text' name='tag' value='{$ramble.tag}' class='form-control' /></div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-1 col-sm-10"><button type="submit" class="btn btn-primary">保存</button></div>
        </div>
      </form>
    </div>
  </div>
</div>
<include file="Public:footer" />
