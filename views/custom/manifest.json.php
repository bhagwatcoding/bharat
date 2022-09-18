<?php
global $pull;
include_once dir::models.'Meta_Model.php';
$meta = new Meta_Model;

Head::con('.json');
echo '{'."\n";
echo '"lang" : "hi",'."\n";
echo '"name" : "'.$meta->value(1).'",'."\n";
echo '"short_name" : "'.$meta->value(2).'",'."\n";
echo '"description" : "'.$meta->value(5).'",'."\n";
echo '"scope": "'.base_url.'",'."\n";
echo '"start_url" : "'.start_url.'",'."\n";
echo '"theme_color": "'.$meta->value(11).'",'."\n";
echo '"background_color": "'.$meta->value(10).'",'."\n";
echo '"orientation": "any",',"\n";
echo '"display": "'.$meta->value(12).'",'."\n";

$db->select('meta_info', '*', null, "meta_status = 1 AND meta_key LIKE '%icon%'");
$icons = $db->getResult();
$end = end($icons)['meta_id'];

echo '"icons": ['."\n";
// All icons exicute
foreach ($icons as list('meta_id' => $id, 'meta_value' => $src, 'meta_key' => $sizes)){
  $size = exp_end($sizes, ' ');
  $icon = base_url.'theme/'.$src;
  $sizer = ($size == 'favicon')? '16x16' : $size."x".$size;
  echo "{\n".'"src" : "'.$icon.'",'."\n". '"sizes" : "'.$sizer.'",'."\n". ' "type" : "image/png"'."\n";
  echo '}';
  echo ($id == $end)? false : ",";
}
echo ']'."\n";
echo '}';
?>
