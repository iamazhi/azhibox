<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
  <title>Public:header<?php echo ($title); ?></title>
  <meta name="keywords" content="<?php echo ($keywords); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="/Public/theme/default/bootstrap.min.css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<div class="container">

  <div class="page-header">
    <h1>Add website</h1>
  </div>

  <form class="form-horizontal" role="form" method="post" target='__blank'>
    <div class="form-group">
      <label class="col-sm-2 control-label">Name</label>
      <div class="col-sm-10">
        <input class="form-control" name="name" placeholder="The name of website">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Url</label>
      <div class="col-sm-10">
        <input class="form-control" name='url' placeholder="The url of website">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>

</div>
    <script type='text/javascript' src='/Public/js/jquery.js'></script>
    <script type='text/javascript' src='/Public/js/bootstrap/bootstrap.min.js'></script>
  </body>
</html>