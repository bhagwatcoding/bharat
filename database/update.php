<?php
// this is update function
trait update{
    function update($table, $params = array(), $where = null){
      if ($this->tableExits($table)):
        $args = array();
        foreach ($params as $key => $value): $args[] = "$key =  '$value'"; endforeach;

        $sql = "UPDATE $table SET ". implode(', ', $args);
        if ($where != null): $sql .= " WHERE $where"; endif;
        if ($this->mysqli->query($sql)): array_push($this->result, $this->mysqli->affected_rows); return true;
        else: array_push($this->result, $this->mysqli->error); return false; endif;
      else: return false; endif;
    }
}
// Rule : -  db_query->update('user', ['lname'=> "sharma"], 'lname = "kumar"');
?>
