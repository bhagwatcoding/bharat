<?php
// breaking news
$post->breaking();

// breaking cards
echo '<div class="container_post grid gap">';
$post->big();
$post->card('1,3');
echo '</div>';

require_once 'module/category.php';

widgets::news_top_bar('राशिफल', 'astrology');
include_once 'astrology.php';
?>
