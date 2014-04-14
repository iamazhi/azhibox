<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
  <title><?php echo ($title); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="/Public/theme/default/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="/Public/theme/default/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="/Public/theme/default/style.css"/>
  <link rel="stylesheet" type="text/css" href="/Admin/Tpl/default/Public/css/admin.css"/>

  <script type='text/javascript' src='/Public/js/jquery.js'></script>
  <script type='text/javascript' src='/Public/js/bootstrap/bootstrap.min.js'></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


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
  </body>
</html>