<?php
class Media_Model extends Database{
    function upload($name = 'uploadfile', $dir = dir::images, $url = url::images){
        $filename = $_FILES[$name]["name"];
        $tempname = $_FILES[$name]["tmp_name"];
        $newfilename = Base::eximplode($filename, ' ', '-');
        $folder = $dir.$newfilename;
        // Now let's move the uploaded image into the folder: image
        if(file_exists($dir.$newfilename)):
          $img = $url.'error.png';
          return [ 'file' => $newfilename, 'name' => $img, "status" => "success", "error" => false, "message" => "File already existed" ];
        else:
          $img = move_uploaded_file($tempname, $dir.$newfilename)? $url.$newfilename : $url.'error.png';
          return ['file' => $newfilename, 'name' => $img, "status" => "success", "error" => false, "message" => "File uploaded successfully" ];
        endif;
    }
}
?>
