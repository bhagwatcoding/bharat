<?php
// this is select function
trait select{
    function select($table, $rows = "*",$join = null, $where = null, $order = null, $limit = null ){
      if ($this->tableExits($table)):
        $sql = "SELECT $rows FROM $table";
        $sql .= ($join != null)? " $join" : false;
        $sql .= ($where != null)? " WHERE $where" : false;
        $sql .= ($order != null)? " ORDER BY $order" : false;
        $sql .= ($limit != null)? " LIMIT $limit" : false;

        $query = $this->mysqli->query($sql);
        if ($query): $this->result = $query->fetch_all(MYSQLI_ASSOC); return true;
        else: array_push($this->result, $this->mysqli->error); return false; endif;
      else: return false; endif;
    }
}
// Rule : - db_query->select('user', '*', null, null, null, null);
?>
