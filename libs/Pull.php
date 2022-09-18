<?php
class Pull extends Database{
  // allfetch by database
   function meta_info($id = null){
      $id = $id == null? false : "meta_id = '{$id}'";
      parent::select('meta_info', '*', null, $id);
      return parent::getResult();
   }
   function meta_key($qs = 'name', $name = 'key'){
      $query = $qs? "meta_key LIKE '%$qs%'" : false;
      parent::select('meta_info', '*', null, $query);
      $result = parent::getResult();
      return $result? Base::str_html($result[0]["meta_$name"]) : null;
   }
   function meta_value($id = 1){
      $query = $id? "meta_status = 1 AND meta_id = '{$id}'" : false;
      parent::select('meta_info', '*', null, $query);
      $result = parent::getResult();
      return $result? $result[0]['meta_value'] : null;
   }
}
?>
