<?php
class Bootstrap {
  function __construct(){
    global $uarr, $start, $first, $second, $third, $db, $view;

    // check url if url is null then index controller call
    if (empty($start)): $view->render('home'); exit; endif;

    // check database in available page name then run
    $db->select('page','pid, ename', null, "page_status = 1 AND ename = '{$start}'");
    $res = $db->getResult();
    if ($res):
        // page controller file require and exicute
        include_once dir::control."page.php";
        $p = new Page();

        // url condition check and run
        switch (count($uarr)):
          case 1:  $p->index(); exit; break;
          case 2:  $p->{$first}(); exit; break;
          case 3:  $p->article($second); exit; break;
          default: $view->terror(); exit; break;
        endswitch;
    endif;
    // end database page

    // Controller file with working
    $file = dir::control.$start.".php";
    if (file_exists($file)):
        include_once $file;
        $ctrl = new $start;
        $first? $ctrl->{$first}($second, $third) : $ctrl->index();
        exit;
    endif;

    // custom folder in fetch file
    $custom = dir::custom.$start.".php";
    $post = new Post();
    if (file_exists($custom)): include_once $custom; exit; endif;

    // Hash by url follow then Redirect
    $res = $post->query(1, "binary hash_url = '{$start}'");
    if ($res):
       $r = $res[0];
       $url = Base::post_url($r['id'], $r['po_url'], $r['ename'], false);
       Head::loc($url);
       exit;
    endif;

    $public = dir::public.get_url;
    if (is_file($public) && file_exists($public)):
        $ext = Base::pathinfo($public, 'e');
        Head::con(".$ext");
        echo file_get_contents($public);
        exit;
    endif;
    // if not page find then error function exicite
    $view->terror(); exit;
  }
}
?>
