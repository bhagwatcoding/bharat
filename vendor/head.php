<?php
class Head {
  // file type
  static function type($file){
    $ext = Base::pathinfo($file);
    switch($ext) :
        case "css":  $t="text/css"; break;
        case "csv":  $t="text/csv"; break;
        case "txt":  $t="text/plain"; break;
        case "gif":  $t="image/gif"; break;
        case "png":  $t="image/png"; break;
        case "jpeg": $t="image/jpeg"; break;
        case "jpg":  $t="image/jpeg"; break;
        case "tiff": $t="image/tiff"; break;
        case "webp": $t="image/webp"; break;
        case "svg":  $t="image/svg+xml"; break;
        case "js":   $t="application/javascript"; break;
        case "json": $t="application/json"; break;
        case "xml":  $t="application/xml"; break;
        case "zip":  $t="application/zip"; break;
        case "pdf":  $t="application/pdf"; break;
        case "mp3":  $t="audio/mp3"; break;
        case "mp4":  $t="video/mp4"; break;
        case "webm": $t="video/webm"; break;
        default:     $t="text/html; charset=UTF-8"; break;
    endswitch;
    return $t;
  }
  // Location
  static function loc($arg = null, $base = base_url){
    return header('Location: ' . $base.$arg);
  }
  // content type
  static function con($fileName) {
    return header('Content-type: ' . self::type($fileName));
  }
}
?>
