<?php
// Printer function
function printer($a = []){
    echo '<pre>';
    print_r($a);
    echo '</pre>';
}

// vardump function
function vardump($a = []){
    echo '<pre>';
    var_dump($a);
    echo '</pre>';
}

// maximum word fetch
function maxword($text, $limit = 12, $exp = false) {
    $word_arr = explode(" ", $text);
    if (count($word_arr) > $limit):
        $words = implode(" ", array_slice($word_arr , 0, $limit) ) . $exp;
        return $words;
    endif;
    return $text;
}

// maximum sentences breaker function
function max_sentence_br($text, $limit = 4) {
    $word_arr = explode("।", $text);
    $count = count($word_arr);
    foreach ($word_arr as $key => $value):
      for ($i= $limit; $i <=$count; $i+=$limit):
          if ($key == $i): echo nl2br("\n\n"); endif;
      endfor;
        echo $value."।";
    endforeach;
}

// dual foreach
function dual_foreach(array $array = [], $a = 'div', $b = null){
  foreach ($array as $i => $value):
      foreach ($value as $k => $values):
        if ($b == null): echo "<$a>".$values."</$a>";
        else: echo $a.$values.$b; endif;
      endforeach;
  endforeach;
}

// explode and implode function
function eximplode($str = 'Hello World', $exp = ' ', $imp = '_'){
    $explode = explode($exp, $str);
    $implode = implode($imp, $explode);
    return $implode;
}

// array last value collector function
function exp_end($url, $exp = '-'){
  $arr = explode($exp, $url);
  return end($arr);
}

?>
