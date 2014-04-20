<?php
require CLASS_PATH.'content.class.php';
if($contentid)
{
    $c = new content();
    $r = $c->get_count($contentid);
    if(!$r) exit;
    if ($PHPSIN['category_count'])
    {
        require 'include/count.class.php';
        $count = new count();
        $count->add($contentid);
    }
    extract($r);
    if($model != 'down')
    {
        $c->hits($contentid);
    }
    else
    {
        echo "\$('#todaydowns').html('$hits_day');";
        echo "\$('#weekdowns').html('$hits_week');";
        echo "\$('#monthdowns').html('$hits_month');";
    }
}/**
elseif($specialid)
{
    require_once 'comment/api/comment_api.class.php';
    $count = new comment_api();
    $comments = $count->get_count($specialid);
    $hits = 0;
}**/
?>
$('#hits').html('<?=$hits?>');
$('#comments').html('<?=$comments?>');
$('#comments_top').html('<?=$comments?>');