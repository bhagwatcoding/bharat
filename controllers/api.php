<?php
class Api extends Controller{
  use auto_construct;

  // auto run then wrong query
  function index(){
    echo "<center><h1>Give Me API Tokan</h1></center><hr>";
  }

  function location($url = false){
    head::con('.json');
    $this->view->render('api/location/index', false);
  }

  // auto call function arg query
  function __call($method, $args){
    $this->view->forbidden($method);
  }
}
?>
