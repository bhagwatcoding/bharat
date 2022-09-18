<?php
$dir = isset($_POST['f'])? dir::public.$_POST['f'] : dir::public;
// icon set by file or folder
function icon($icon = false, $name = false, $path = false, $url = false){
  echo '<div '."data-path='$path'".' ondblclick="'."manager('$path')".'"><'.$icon."></$icon><span>$name</span></div>";
};
// // image view
function img($name= false, $url= false, $path= false){
  echo '<div '."data-path='$path'".' class="flex jcc aic scroller" ondblclick="'."manager('$path')".'"><img src="'.$url.$path.'"'."><span>$name</span></div>";
};

function txt_fetch($dir){
  $text= file_get_contents($dir);
  echo "<textarea class='text-editor' rows='35' cols='80'>$text</textarea>";
}
//     // only img type file open
function img_fetch($file_dir){ echo "<div class='image-viewer scroller'><img class='scroller' src='".$file_dir."' ></div>"; };

// file mannager navigator start
if (isset($_POST['f'])):
    $fileName = Base::pathinfo($dir, 'f');
    $filebase = Base::pathinfo($dir, 'b');
    $path = (Base::pathinfo($dir, 'e'))? trim($_POST['f'], $filebase): trim($_POST['f'], $fileName.'/');

    $fileName = Base::eximplode($fileName, '_', ' ');
    echo '<nav class="file-navigator">';
    echo '<button onclick="'."manager('$path')".'"'.'><i class="fa fa-angle-double-left"></i></button>';
    echo '<b>'. strtoupper($fileName).'</b>';
    echo '<button onclick="history.forward()"><i class="fa fa-angle-double-right"></i></button>';
    echo '</nav>';
endif;

// for file extaintion opening
$file_ext = Base::pathinfo($dir, 'e');
$ext_img = ['a' => 'png', 'b' => 'jpg', 'c' => 'jpeg','d'=> 'svg', 'e' => 'webp', 'f' => 'ico'];
$ext_txt = ['a' => 'txt', 'b' => 'xml', 'c' => 'php', 'd'=> 'json', 'e' => 'js', 'f' => 'html', 'g' =>'css'];

// is file type cheack
if (isset($_POST['f'])):
  $url = base_url.$_POST['f'];
  if (array_search($file_ext, $ext_img)):
    img_fetch($url);
    return false;
  elseif(array_search($file_ext, $ext_txt)):
    txt_fetch($dir);
    return false;
  elseif($file_ext == 'mp3'):
    echo "<audio controls src='{$url}'></audio>";
    return false;
  elseif ($file_ext == 'mp4'):
    echo "<video width='320' height='240' controls>
              <source src'{$url}' type='video/mp4'>
              <source src='{$url}' type='video/ogg'>
              Your browser does not support the video tag.
          </video>";
    return false;
  endif;
endif;

echo '<div class="file-mannager">';
foreach (glob($dir.'*') as $file):
  // echo $file.'<br>';
  $ext = Base::pathinfo($file, 'e');
  $name = Base::pathinfo($file, 'f');
  $full_name = Base::pathinfo($file, 'b');

  $url = base_url;
  $path = exp_end($file, dir::public);

  // cheack is dir or is file
  if ($ext):
    switch ($ext){
      case 'xml':  icon('xml', $name, $path); break;
      case 'txt':  icon('text', $name, $path); break;
      case 'php':  icon('php', $name, $path); break;
      case 'html': icon('htmli', $name, $path); break;
      case 'css':  icon('css', $name, $path); break;
      case 'js':   icon('js', $name, $path ); break;
      case 'json': icon('json', $name, $path ); break;
      case 'pdf':  icon('pdf', $name, $path); break;
      case 'mp3':  icon('mp3', $name, $path); break;
      case 'mp4':  icon('mp4', $name, $path); break;
      case 'png':  img($name, $url, $path); break;
      case 'jpeg': img($name, $url, $path); break;
      case 'jpg':  img($name, $url, $path); break;
      case 'svg':  img($name, $url, $path); break;
      case 'webp': img($name, $url, $path); break;
      case 'ico':  img($name, $url, $path); break;
      default:     icon('txt', $name, $path ); break;
    };
  else: icon('folder', $name, $path.'/', $url); endif;
endforeach;
echo "</div>";
?>

<script type="text/javascript">

</script>
