<?php 
           
           
            //define the width and height of our images
            define("WIDTH", 1700);
            define("HEIGHT", 1700);

            $max_res= $_POST['height'];

            $dest_image = imagecreatetruecolor(WIDTH, HEIGHT);

            //make sure the transparency information is saved
            imagesavealpha($dest_image, true);

            //create a fully transparent background (127 means fully transparent)
            $trans_background = imagecolorallocatealpha($dest_image, 0, 0, 0, 127);

            //fill the image with a transparent background
            imagefill($dest_image, 0, 0, $trans_background);

            //take create image resources out of the 3 pngs we want to merge into destination image
            $a = imagecreatefrompng('./source/logo/newimage1.png');
            $b = imagecreatefrompng('./source/logo/newimage2.png');
            $c = imagecreatefrompng('./source/logo/newimage3.png');
             

       

            $new_height_a=0;
            $new_height_b=0;
            $new_height_c=0;

            $new_width_a=0;
            $new_width_b=0;
            $new_width_c=0;
            

            

            if(file_exists('./source/logo/newimage1.png')){
                    echo 'test';
                $origin_width_a=imagesx($a);
                $origin_height_a= imagesy($a);

                $ratio_a= $max_res/$origin_height_a;
                $new_height_a=$max_res;
                $new_width_a = $origin_width_a * $ratio_a;
            }

            

            if(file_exists('./source/logo/newimage2.png')){
                echo 'test2';
                $origin_width_b=imagesx($b);
                $origin_height_b= imagesy($b);

                $ratio_b= $max_res/$origin_height_b;
                $new_height_b=$max_res;
                $new_width_b = $origin_width_b * $ratio_b;
            }

            if(file_exists('./source/logo/newimage3.png')){
                echo 'test3';
                $origin_width_c=imagesx($c);
                $origin_height_c= imagesy($c);

                $ratio_c= $max_res/$origin_height_c;
                $new_height_c=$max_res;
                $new_width_c = $origin_width_c * $ratio_c;
           }


           $ha= round($new_height_a);
           $hb= round($new_height_b);
           $hc= round($new_height_c);

           $wa=round($new_width_a);
           $wb=round($new_width_b);
           $wc=round($new_width_c);

         //  echo $ha;
          // echo $hb;
         //  echo $hc;

          // echo $wa;
           echo $max_res;
         //  echo $wc;

         $aResized = imagescale($a, $new_width_a, $new_height_a);
         $bResized = imagescale($b, $new_width_b, $new_height_b);
         $cResized = imagescale($c, $new_width_c, $new_height_c);


           
            //copy each png file on top of the destination (result) png
            imagecopy($dest_image, $aResized,1700-$wa, 1700-$ha, 0, 0, $wa, $ha);
            imagecopy($dest_image, $bResized, 1700-$wa-$wb-50, 1700-$hb, 0, 0, $wb, $hb);
            imagecopy($dest_image, $cResized,1700- $wa-$wb-$wc-100, 1700-$hc, 0, 0, $wc, $hc);

            //send the appropriate headers and output the image in the browser
            header('Content-Type: image/png');
            imagepng($dest_image, './source/logo/merged.png');

            //destroy all the image resources to free up memory
            imagedestroy($a);
            imagedestroy($b);
            imagedestroy($c);
            imagedestroy($dest_image);
    ?>