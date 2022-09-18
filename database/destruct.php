<?php
// this is distructer function
trait destruct {
    function __destruct(){
      if ($this->conn):
        if ($this->mysqli->close()): $this->conn = false; return true; endif;
      else: return false; endif;
    }
}
?>
