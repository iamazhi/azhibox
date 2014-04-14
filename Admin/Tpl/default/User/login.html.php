<include file="Public:headerlite" />
<div class="container">
  <div class='row'>
    <div class='col-sm-3'></div>
    <div class='col-sm-6'>
      <div class="panel panel-primary">
        <div class="panel-heading">后台登陆</div>
        <div class="panel-body">
        <form class="form-horizontal" role="form" method="post">
          <div class="form-group">
            <label class="col-sm-3 control-label">你是谁：</label>
            <div class="col-sm-9"> <input class="form-control" name="whoareyou" placeholder="何方妖孽？"> </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">暗号：</label>
            <div class="col-sm-9"> <input class="form-control" name="token" placeholder="天王盖地虎"> </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-primary">我来也</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
    <div class='col-sm-3'></div>
  </div> 
</div>
<include file="Public:footer" />
