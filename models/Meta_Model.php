<?php
class Meta_Model extends Pull{
  // meta value from Database
  function value($id = 1){
     return Base::str_html($this->meta_value($id));
  }

  function apple_touch($a, $b, $c = 'apple-touch'){
    if ($this->value($b)) {
       echo "    <link rel='$c' sizes='$a".'x'."$a' href='".url::theme.$this->value($b)."' type='image/png'>\n";
    }
  }

  function name($a= 'google-site-verification', $b = 1 ){
    if (is_int($b)):
      echo $this->value($b)? "    <meta name='$a' content='{$this->value($b)}' />\n" : null;
    else:
      echo ($b)?"    <meta name='$a' content='$b' />\n" : false;
    endif;
   }

  function property($a = 'og:title', $b = 1 ){
    if (is_int($b)):
      echo $this->value($b)? "    <meta property='$a' content='{$this->value($b)}' />\n" : null;
    elseif(!is_int($b)):
      echo ($b)?"    <meta property='$a' content='$b' />\n" : false;
    endif;
  }

  function link($rel = null, $href = null, $atter = false, $base= base_url){
    $atter = $atter? $atter : false;
    echo "    <link rel='$rel' $atter href='$base$href'>\n";
  }

  function script($src = null, $base= base_url, $type = 'type="text/javascript"'){
    $type = $type? $type : false;
    echo "    <script src='$base$src' $type></script>\n";
  }
}
?>
