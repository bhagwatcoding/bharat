<?php
class View {
  public $post;
  public $media;
  public $meta;

  // Cunstruct auto run
  function __construct() {
      // Post card class
      $this->post = new Post;

      // public model class
      Base::loader('models');
      $this->meta = new Meta_Model;
      $this->media = new Media_Model;
  }

  // local file fetch function
  function path($a){ return dir::views."$a.php"; }

  // file render function
  function render($name, $show = true){
    global $uarr, $start, $first, $second, $third, $db, $pull;
    $meta = $this->meta;
    $post = $this->post;

    $file = $this->path($name);
    $file_content = file_exists($file)? $file : $this->path('error/file_error');
    include_once $show? $this->path('theme/layout') : $file;
  }

  // Admin render function
  function admin($name, $show = true){
    global $uarr, $start, $first, $second, $third, $db, $pull;
    $meta = $this->meta;
    $file = $this->path('admin/'.$name);
    $file_content = file_exists($file)? $file : $this->path('error/file_error');
    include_once $show? $this->path('admin/theme/layout') : $file;
  }

  // Local error function
  function error($msg = "404", $allow = false){
    $this->msg = $msg;
    $this->render('error/404', $allow);
  }
  // Local error function
  function terror($msg = "404", $allow = true){
    $this->msg = $msg;
    $this->render('error/404', $allow);
  }
  // Local error function
  function forbidden(){
    $this->render('error/forbidden', false);
  }
}
?>
