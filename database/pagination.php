<?php
// this is pagination function
trait pagination{
    function pagination($table, $join = null, $where = null, $limit = null ){
      if ($this->tableExits($table)):
        if ($limit != null):
          $sql = "SELECT COUNT(*) FROM $table";
          $sql .= ($join != null)? " JOIN $join" : false;
          $sql .= ($where != null)? " WHERE $where" : false;

          $query = $this->mysqli->query($sql);

          $total_record = $query->fetch_array();
          $total_record = $total_record[0];
          $total_page = ceil($total_record /$limit);

          $url = $_SERVER['REDIRECT_URL'];

          $page = (isset($_GET['page']))? $_GET['page'] : 1;
          $output = "<ul class='pagination'>";
          $output .= ($page > 1)? "<li><a href='$url?page=".($page-1)."'>Prev</a></li>" : false;

          if ($total_record > $limit):
            for($i = 1; $i <= $total_page; $i++):
              $cls = ($i == $page)? "class = 'active'" : null;
              $output .= "<li><a $cls href='$url?page=$i'>$i</a></li>";
            endfor;
            $output .= ($total_page > $page)? "<li><a href='$url?page=".($page+1)."'>Next</a></li>" : false;
          endif;

          $output .= "</ul>";
          echo $output;
        else: return false; endif;
      endif;
    }
}
// Rule : - db_query->pagination('user', null, null, "2");
?>
