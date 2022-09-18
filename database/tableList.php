<?php
// checkout table exits
trait tableList{
    function tableList(){
      $sql = "SHOW TABLES IN $this->db_name";
      $query = $this->mysqli->query($sql);
      if ($query): $this->result = $query->fetch_all(MYSQLI_ASSOC); return true;
      else: array_push($this->result, $this->mysqli->error); return false;
      endif;
    }
}
?>
