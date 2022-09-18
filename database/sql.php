<?php
// direct query function
trait sql{
    function sql($sql){
      $query = $this->mysqli->query($sql);
      if ($query): $this->result = $query->fetch_all(MYSQLI_ASSOC); return true;
      else: array_push($this->result, $this->mysqli->error); return false;
      endif;
    }
}
//Rule : - db_query->sql('SELECT * FROM user');
?>
