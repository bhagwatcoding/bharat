<?php
/**
 * static class all types function include this class
 */
class Base{
  // all file load
  static function loader($dir, $ext= 'php'){
    foreach (glob("$dir/*.$ext") as $file){ require_once $file; };
  }
  // all file load
  static function read($dir, $ext= 'css'){
    foreach (glob("$dir/*.$ext") as $file){ readfile($file); };
  }

  // file counter function
  static function file_count($dir, $ext = false){
    $ext = $ext? ".$ext" : false;
    $all = glob($dir.'*'.$ext);
    return count($all);
  }

  // explode and implode function
  static function eximplode($str = 'Hello World', $exp = ' ', $imp = '_'){
      $explode = explode($exp, $str);
      return implode($imp, $explode);
  }

  //Comman function only use of file read
  static function reader($folder, $name = false, $exicute = false){
    $root = dir::public.$folder."/";
    $file = $root.$name;
    if(is_dir($file)):
      if ($exicute):
          head::con("$file.$folder");
          self::loader($root, $folder);
      endif;
    else:
      if (file_exists($file)) :
          Head::con($file);
          require_once $file;
      endif;
    endif;
  }

  // Extention function
  static function pathinfo($file, $e = 'e'){
    switch ($e):
      case 'd': $info = PATHINFO_DIRNAME; break;
      case 'b': $info = PATHINFO_BASENAME; break;
      case 'e': $info = PATHINFO_EXTENSION; break;
      case 'f': $info = PATHINFO_FILENAME; break;
      default: $info = PATHINFO_EXTENSION; break;
    endswitch;
    return strtolower(pathinfo($file, $info));
  }

  // post url maker
  static function post_url($id, $po_url, $cat_url, $burl = base_url){
    $url = $burl.$cat_url.'/'.self::eximplode($po_url, ' ', '-').'-'.$id;
    $url = self::eximplode($url, "'", '');
    return $url;
  }

  // thumbail checker function
  static function thumbail($thumbail, $deft = small_thumbail, $url = base_url){
      $img_url = dir::images.$thumbail;
      $thum = is_file($img_url)? file_exists($img_url)? 'images/'.$thumbail : $deft : $deft;
      return $url.$thum ;
  }

  // Generator random String
  static function genRandStr($length = 5, $str = false, $strcase = true){
      $char = "abcdefghijklmnopqrstuvwxyz";
      $char .= "ABCDEFGHIJKLMNOPQRSTUVWZYZ";
      $char .= '0123456789';

      $real_string_length = strlen($char) ;
      $string = $str;

      for ($p = 0; $p < $length; $p++) {
          $string .= $char[mt_rand(0, $real_string_length-1)];
      }
      return $strcase? strtolower($string) : $string;
   }

  static function str_html($str){
     return htmlspecialchars_decode($str);
  }
  static function html_str($html, $pattern = "/<.+?>/", $cod = ''){
     $str = htmlspecialchars_decode($html);
     return preg_replace($pattern, $cod, $str);
  }
}

?>
