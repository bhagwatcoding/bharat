<?php
// this is constructer function
trait construct{
    function __construct(){
      if(!$this->conn):
        $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        $this->conn = true;
        if($this->mysqli->connect_error): array_push($this->result, $this->mysqli->connect_error); return false; endif;
      else: return true; endif;
    }
}
?>
