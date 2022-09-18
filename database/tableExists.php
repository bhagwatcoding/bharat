<?php
// checkout table exits
trait tableExits{
    function tableExits($table){
      $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
      $tableInDb = $this->mysqli->query($sql);
      if($tableInDb):
        if ($tableInDb->num_rows == 1): return true;
        else: array_push($this->result, $table, " Does not exist in this database."); return false; endif;
      endif;
    }
}
?>
