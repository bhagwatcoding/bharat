<?php
/**
 * Auto Call trait function
**/

// for all index page
trait auto_construct{
  public function __construct() {
    parent::__construct();
  }
}

// for all page auto call function
trait auto_call{
  function __call($method = false, $arg = false){
    $this->view->error(null, true, false);
  }
}

// auto call function arg query
trait file_query{
  function __call($method = false, $arg = false){
    $url = dir::public.get_url;
    if(is_file($url) && file_exists($url)):
      Head::con(get_url);
      readfile($url);
    else:
      $this->view->render('error/forbidden', false);
    endif;
  }
}

// index file
trait index_file{
  function index(){
    $this->view->render(strtolower(get_class($this)));
  }
}

// index file redaer false
trait index_reader_false{
  function index(){
    $this->view->render(strtolower(get_class($this)), false);
  }
}


// index error page
trait index_error{
  function index(){
    $this->view->error(null, true);
  }
}

// auto run all css file run
trait index_base_reader{
  function index(){
    Base::reader(strtolower(get_class($this)), false, true);
  }
}

// auto run all css file run
trait index_file_render{
  function index(){
    $this->view->render($this->file);
  }
}

// Article caller
trait article{
  function __call($url, $arg = false){
      $this->view->url = $url;
      $this->view->page = url_arr[0];
      $this->view->id = exp_end($url);
      $this->view->arg = isset($arg[0])? $arg[0] : false;
      $this->view->render('article');
  }
}


?>
