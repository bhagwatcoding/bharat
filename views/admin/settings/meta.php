<?php
if (isset($_POST['update'])) {
  for ($i=1; $i < 31 ; $i++) {
    $data = htmlentities($_POST["value_$i"]);
    $update_date = date('Y-m-d H:i:s');
    $status = isset($_POST["meta_status_$i"])? 1 : 0;
    $db->update('meta_info', ['meta_value' => $data, 'meta_update_date' => $update_date, 'meta_status' => $status], "meta_id = $i");
  }
}
?>
<form method="POST">
<div class='grid gap meta-info'>
  <?php
    $result = $pull->meta_info();
    foreach ($result as $list):
      $checked = ($list['meta_status'] == 1)? 'checked' : false;
      $id = $list['meta_id'];
      $value = htmlspecialchars_decode($list['meta_value']);
      $type = (($id == 10) || ($id == 11))? 'color' :'text';

      $key = $list['meta_key'];
      $key = ucwords($key);
      echo "<div class='tal'>{$key}</div>";
      echo strlen($list['meta_value']) > 120? "<textarea name='value_{$id}'>$value</textarea>" : "<input name='value_{$id}' type='$type' value='$value'>";
      echo "<div><input name='meta_status_$id' type='checkbox' $checked></div>";
    endforeach;
    echo "</div>";
          ?>
        </br>
  <div class="flex jcsb">
    <span>updated : <?php echo  $list['meta_update_date'];?></span>
    <input type="submit" class="btn bg-dark" name="update" value="Update">
  </div>
</form>

<style type="text/css">
.meta-info{
  grid-template: 1fr/ 0.8fr 3fr 0fr;
  padding: 0.4rem;
}
.meta-info div{
  padding: 0.4rem;
}

.meta-info textarea{
  font-size: 1rem;
  height: 120px;
  line-height: 1.5;
  font-family:monospace;
}
.meta-info input[type=color]{
  padding: 0;
}
.meta-info textarea,
.meta-info input{
  font-size: 1rem;
  padding: 0.6rem;
  border: 1px solid var(--light-dark);
}
.meta-info textarea:hover,
.meta-info textarea:focus,
.meta-info input:hover,
.meta-info input:focus{
    outline: 2px solid skyblue;
}
</style>
