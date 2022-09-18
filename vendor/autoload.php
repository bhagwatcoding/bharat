<?php
// vendor folder all file exicute auto include this file
require_once 'base.php';
$arr = ['vendor', 'libs', 'traits', 'widgets'];
foreach ($arr as $value) { Base::loader($value); }
?>
