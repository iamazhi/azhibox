<?php
return array (
  'һ������' => 'tag(\'phpsin\', \'\', "SELECT * FROM sin_category ", 0, 101)',
  '�����б�' => 'tag(\'phpsin\', \'\', "SELECT a.contentid,a.catid,a.title,a.style,a.thumb,a.keywords,b.author,b.copyfrom,a.description,a.posids,a.url,a.updatetime,a.prefix FROM `sin_content` a, `sin_c_news` b WHERE a.contentid=b.contentid AND a.status=99  ".get_sql_catid($catid)." ORDER BY a.contentid DESC", $page, 10, $catid)',
  '������Ŀ' => 'tag(\'phpsin\', \'\', "SELECT a.contentid,a.catid,a.title,a.style,a.thumb,a.keywords,b.author,b.copyfrom,a.description,a.posids,a.url,a.updatetime,a.prefix FROM `sin_content` a, `sin_c_news` b WHERE a.contentid=b.contentid AND a.status=99  ".get_sql_catid($catid)." ORDER BY a.contentid DESC", $page, 10, $catid)',
  '��Ʒ�б�' => 'tag(\'phpsin\', \'\', "SELECT a.contentid,a.catid,a.title,a.style,a.thumb,a.keywords,a.description,b.pictureurls,a.posids,a.url,a.updatetime,a.prefix FROM `sin_content` a, `sin_c_product` b WHERE a.contentid=b.contentid AND a.status=99  ".get_sql_catid($catid)." ORDER BY a.catid ASC", $page, 10, $catid)',
  '��Ŀ�б�' => 'tag(\'phpsin\', \'\', "SELECT * FROM sin_category WHERE ".get_parentid($catid)."", 0, 101)',
  '��ҳ�Ƽ���Ʒ' => 'tag(\'phpsin\', \'\', "SELECT a.contentid,a.catid,a.title,a.thumb,a.description,a.posids,a.url FROM `sin_content` a, `sin_content_position` p WHERE a.contentid=p.contentid AND p.posid=2 AND a.status=99  ".get_sql_catid(5)." ORDER BY a.contentid DESC", 0, 5)',
  '�����б�' => 'tag(\'phpsin\', \'\', "SELECT a.contentid,a.catid,a.title,a.description,b.content,b.downurl,a.url,a.updatetime,a.posids,b.down1,b.down2 FROM `sin_content` a, `sin_c_down` b WHERE a.contentid=b.contentid AND a.status=99  ".get_sql_catid(7)." ORDER BY a.contentid DESC", $page, 10, 7)',
  '��Ʒ�Ƽ�' => 'tag(\'phpsin\', \'\', "SELECT a.contentid,a.catid,a.title,a.style,a.thumb,a.url FROM `sin_content` a, `sin_content_position` p WHERE a.contentid=p.contentid AND p.posid=2 AND a.status=99  ".get_sql_catid(5)." ORDER BY a.contentid DESC", $page, 6, 5)',
);
?>