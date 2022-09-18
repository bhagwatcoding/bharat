<?php
// this is delete function
trait delete{
    function delete($table, $where = null){
      if ($this->tableExits($table)):
        $sql = "DELETE FROM $table";
        $sql .= ($where != null)? " WHERE $where" : false;
        if ($this->mysqli->query($sql)): array_push($this->result, $this->mysqli->affected_rows); return true;
        else: array_push($this->result, $this->mysqli->error); return false;
        endif;
      else: return false; endif;
    }
}
// Rule : - db_query->delete('user', 'id = "1"');
?>
