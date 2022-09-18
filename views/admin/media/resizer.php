<?php
$img_url = $this->arg;
$img = start_url.'images/'.$img_url;
function resizeImage($file){

         define ('MAX_WIDTH', 1500);//max image width
         define ('MAX_HEIGHT', 1500);//max image height
         define ('MAX_FILE_SIZE', 10485760);

         //iamge save path
         $path = 'storeResize/';

        //size of the resize image
         $new_width = 128;
         $new_height = 128;

        //name of the new image
        $nameOfFile = 'resize_'.$new_width.'x'.$new_height.'_'.basename($file['name']);

        $image_type = $file['type'];
        $image_size = $file['size'];
        $image_error = $file['error'];
        $image_file = $file['tmp_name'];
        $image_name = $file['name'];

        $image_info = getimagesize($image_file);

        //check image type
        if ($image_info['mime'] == 'image/jpeg' or $image_info['mime'] == 'image/jpg'):
        elseif ($image_info['mime'] == 'image/png'):
        elseif ($image_info['mime'] == 'image/gif'):
        else:
            //set error invalid file type
        endif;

        if ($image_error){
            //set error image upload error
        }

        if ( $image_size > MAX_FILE_SIZE ){
            //set error image size invalid
        }

        switch ($image_info['mime']):
            case 'image/jpg': //This isn't a valid mime type so we should probably remove it
            case 'image/jpeg': $image = imagecreatefromjpeg ($image_file); break;
            case 'image/png': $image = imagecreatefrompng ($image_file); break;
            case 'image/gif': $image = imagecreatefromgif ($image_file); break;
        endswitch;

        if ($new_width == 0 && $new_height == 0):
            $new_width = 100;
            $new_height = 100;
        endif;

        // ensure size limits can not be abused
        $new_width = min ($new_width, MAX_WIDTH);
        $new_height = min ($new_height, MAX_HEIGHT);

        //get original image h/w
        $width = imagesx ($image);
        $height = imagesy ($image);

        //$align = 'b';
        $zoom_crop = 1;
        $origin_x = 0;
        $origin_y = 0;
        // TODO setting Memory

        // generate new w/h if not provided
        if ($new_width && !$new_height):
            $new_height = floor ($height * ($new_width / $width));
        elseif ($new_height && !$new_width):
            $new_width = floor ($width * ($new_height / $height));
        endif;

        // scale down and add borders
    if ($zoom_crop == 3) {
         $final_height = $height * ($new_width / $width);
         if ($final_height > $new_height):
            $new_width = $width * ($new_height / $height);
         else:
            $new_height = $final_height;
         endif;

    }

      // create a new true color image
      $canvas = imagecreatetruecolor ($new_width, $new_height);
      imagealphablending ($canvas, false);


      if (strlen ($canvas_color) < 6): $canvas_color = 'ffffff'; endif;

      $canvas_color_R = hexdec (substr ($canvas_color, 0, 2));
      $canvas_color_G = hexdec (substr ($canvas_color, 2, 2));
      $canvas_color_B = hexdec (substr ($canvas_color, 2, 2));

      // Create a new transparent color for image
      $color = imagecolorallocatealpha ($canvas, $canvas_color_R, $canvas_color_G, $canvas_color_B, 127);

      // Completely fill the background of the new image with allocated color.
      imagefill ($canvas, 0, 0, $color);

        // scale down and add borders
    if ($zoom_crop == 2):

            $final_height = $height * ($new_width / $width);

        if ($final_height > $new_height):
            $origin_x = $new_width / 2;
            $new_width = $width * ($new_height / $height);
            $origin_x = round ($origin_x - ($new_width / 2));
        else:
            $origin_y = $new_height / 2;
            $new_height = $final_height;
            $origin_y = round ($origin_y - ($new_height / 2));
        endif;
    endif;

        // Restore transparency blending
        imagesavealpha ($canvas, true);

        if ($zoom_crop > 0) {

            $src_x = $src_y = 0;
            $src_w = $width;
            $src_h = $height;

            $cmp_x = $width / $new_width;
            $cmp_y = $height / $new_height;

            // calculate x or y coordinate and width or height of source
            if ($cmp_x > $cmp_y) {
        $src_w = round ($width / $cmp_x * $cmp_y);
        $src_x = round (($width - ($width / $cmp_x * $cmp_y)) / 2);
            } else if ($cmp_y > $cmp_x) {
        $src_h = round ($height / $cmp_y * $cmp_x);
        $src_y = round (($height - ($height / $cmp_y * $cmp_x)) / 2);
            }

            // positional cropping!
        if ($align) {
            if (strpos ($align, 't') !== false): $src_y = 0; endif;
                if (strpos ($align, 'b') !== false): $src_y = $height - $src_h; endif;
                if (strpos ($align, 'l') !== false): $src_x = 0; endif;
            if (strpos ($align, 'r') !== false): $src_x = $width - $src_w; endif;
        }

            // positional cropping!
            imagecopyresampled ($canvas, $image, $origin_x, $origin_y, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);

         } else {
        imagecopyresampled ($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    }
        //Straight from Wordpress core code. Reduces filesize by up to 70% for PNG's
        if ( (IMAGETYPE_PNG == $image_info[2] || IMAGETYPE_GIF == $image_info[2]) && function_exists('imageistruecolor') && !imageistruecolor( $image ) && imagecolortransparent( $image ) > 0 ){
            imagetruecolortopalette( $canvas, false, imagecolorstotal( $image ) );
    }
        $quality = 100;
        $nameOfFile = 'resize_'.$new_width.'x'.$new_height.'_'.basename($file['name']);

    if (preg_match('/^image\/(?:jpg|jpeg)$/i', $image_info['mime'])):
        imagejpeg($canvas, $path.$nameOfFile, $quality);

    elseif (preg_match('/^image\/png$/i', $image_info['mime'])):
        imagepng($canvas, $path.$nameOfFile, floor($quality * 0.09));

    elseif (preg_match('/^image\/gif$/i', $image_info['mime'])):
        imagegif($canvas, $path.$nameOfFile);
    endif;
}

Base::header_content_type($img);
resizeImage($img);
?>
