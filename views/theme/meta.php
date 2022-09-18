<?php
if (count($uarr) == 2):
  $url = $start;

  $post_id = isset($this->url)? exp_end($this->url) : false;

  // result fetch and store result variable
  $result = $post->query(null, "id = '{$post_id}'");

  if ($result):
      $result = $result[0];
      $description = $result['details'];
      $title = $result['title'];
      $thumb = $result['thumbail'];

      $title = empty($title)? $description : $title;
      $thumbail = Base::thumbail($thumb, $meta->value(9), false);
      // views calculater
      $db->update('posts', ['post_views' => $result['post_views'] + 1], "id = '$post_id'");
  endif;
else:
  $url = end($uarr);
  $db->select('page', '*', null, "ename = '{$url}'");
  $result = $db->getResult();

  if ($result):
      $res = $result[0];
      $title = empty($res['ename'])? null : ucwords($res['ename']). " : ";
      $title .= $meta->value(4);
      $kwd    = $meta->value(6);
      $description   = $meta->value(5);

      // views calculat
      $db->update('page', ['page_views' => $res['page_views'] + 1], "ename = '$url'");
  endif;
endif;
// catch data then work it
$title    = isset($title) ? maxword($title) : "Not Found";
$kwd      = isset($keywords) ? $keywords : false;
$thumbail = isset($thumbail) ? url.$thumbail : url.$meta->value(9);
$desc     = isset($description) ? $description : false;

// for html endtities removed in this str
$desc = base::html_str($desc);
$desc = eximplode($desc, '&#39', '');
$desc = eximplode($desc, '&nbsp;', '');
$desc = eximplode($desc, ':', '');
$desc = eximplode($desc, '"', '');
$desc = eximplode($desc, "'", '');
$desc = maxword($desc, 20);
?>
