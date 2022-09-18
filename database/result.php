<?php
// get restult
trait result{
    function getResult(){
      $val = $this->result;
      $this->result = array();
      return $val;
    }
}
// Rule:- db_query->getResult()
?>
