<?php
return array (
  '一级导航' => 'tag(\'phpsin\', \'\', "SELECT * FROM sin_category ", 0, 101)',
  '文章列表' => 'tag(\'phpsin\', \'\', "SELECT a.contentid,a.catid,a.title,a.style,a.thumb,a.keywords,b.author,b.copyfrom,a.description,a.posids,a.url,a.updatetime,a.prefix FROM `sin_content` a, `sin_c_news` b WHERE a.contentid=b.contentid AND a.status=99  ".get_sql_catid($catid)." ORDER BY a.contentid DESC", $page, 10, $catid)',
  '帮助类目' => 'tag(\'phpsin\', \'\', "SELECT a.contentid,a.catid,a.title,a.style,a.thumb,a.keywords,b.author,b.copyfrom,a.description,a.posids,a.url,a.updatetime,a.prefix FROM `sin_content` a, `sin_c_news` b WHERE a.contentid=b.contentid AND a.status=99  ".get_sql_catid($catid)." ORDER BY a.contentid DESC", $page, 10, $catid)',
  '商品列表' => 'tag(\'phpsin\', \'\', "SELECT a.contentid,a.catid,a.title,a.style,a.thumb,a.keywords,a.description,b.pictureurls,a.posids,a.url,a.updatetime,a.prefix FROM `sin_content` a, `sin_c_product` b WHERE a.contentid=b.contentid AND a.status=99  ".get_sql_catid($catid)." ORDER BY a.catid ASC", $page, 10, $catid)',
  '栏目列表' => 'tag(\'phpsin\', \'\', "SELECT * FROM sin_category WHERE ".get_parentid($catid)."", 0, 101)',
  '首页推荐产品' => 'tag(\'phpsin\', \'\', "SELECT a.contentid,a.catid,a.title,a.thumb,a.description,a.posids,a.url FROM `sin_content` a, `sin_content_position` p WHERE a.contentid=p.contentid AND p.posid=2 AND a.status=99  ".get_sql_catid(5)." ORDER BY a.contentid DESC", 0, 5)',
  '下载列表' => 'tag(\'phpsin\', \'\', "SELECT a.contentid,a.catid,a.title,a.description,b.content,b.downurl,a.url,a.updatetime,a.posids,b.down1,b.down2 FROM `sin_content` a, `sin_c_down` b WHERE a.contentid=b.contentid AND a.status=99  ".get_sql_catid(7)." ORDER BY a.contentid DESC", $page, 10, 7)',
  '新品推荐' => 'tag(\'phpsin\', \'\', "SELECT a.contentid,a.catid,a.title,a.style,a.thumb,a.url FROM `sin_content` a, `sin_content_position` p WHERE a.contentid=p.contentid AND p.posid=2 AND a.status=99  ".get_sql_catid(5)." ORDER BY a.contentid DESC", $page, 6, 5)',
);
?>