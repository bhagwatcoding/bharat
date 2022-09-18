<?php
// this is insert function
trait insert{
    function insert($table,$params = array()){
      if ($this->tableExits($table)):

        $table_columns = implode(', ', array_keys($params));
        $table_value = implode("', '", $params);

        $sql = "INSERT INTO $table ($table_columns) VALUES ('$table_value')";

        if ($this->mysqli->query($sql)): array_push($this->result, $this->mysqli->insert_id); return true;
        else: array_push($this->result, $this->mysqli->error); return false; endif;
      else: return false; endif;
    }
}
// Rule : - db_query->insert('table', ['fname'=> "ram"]);
?>
