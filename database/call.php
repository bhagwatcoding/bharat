<?php
trait call{
    function __call($method, $a){
      echo  "<h1>Does not exist function : ".$method."</h1>";
    }
}
?>
