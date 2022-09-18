<?php

// nav anchor tag creator
function linka($a, $b, $e){
  return "<a href='{$a}'><i class='fa fa-$b'></i><span>$e</span></a>";
}

// nav link creator
function navlink($a = 'pages/add', $b = 'plus', $e = "link"){
  echo "<div>".linka($a, $b, $e)."</div>\n";
}
?>
<?php
echo '<div class="nav">'."\n";
    navlink('', 'dashboard', 'dashboard');
    echo "<div>".linka('page', 'file', 'Pages');
      echo '<nav class="subnav">'."\n";
                navlink('page/add', 'plus', 'add');
      echo '</nav>
        </div>';
    echo '<div>'.linka('post', 'paper-plane-o', 'Posts');
      echo '<nav class="subnav">'."\n";
                navlink('post/add', 'plus', 'add');
      echo '</nav>
        </div>';
              navlink('rashifal', 'rebel', 'rashifal');
              navlink('email', 'inbox', 'Email');
              navlink('media_uploads', 'upload', 'Media Uploads');
              navlink('media/image', 'image', 'Image');
              navlink('file_manager', 'folder', 'File Mannager');
              navlink('database', 'database', 'Database');
              navlink('settings', 'cogs', 'Settings');

echo '</div>';
?>
