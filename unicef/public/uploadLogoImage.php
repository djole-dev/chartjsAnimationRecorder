<?php

$target_path = "source/logo/";
$imgData = $_POST['imageData'];
$imgIndex = $_POST['counter'];

//$img = file_get_contents($_POST['imageData']);

$output_file = $target_path . 'newimage' . $imgIndex . '.png';


$output_file = base64ToImage($imgData, $output_file);


function base64ToImage($base64_string, $output_file)
{
    if(file_exists($output_file)){
        unlink($output_file);
    }

    $file = fopen($output_file, "wb");

    $data = explode(',', $base64_string);

    fwrite($file, base64_decode($data[1]));
    fclose($file);

    

    return $output_file;
}


  

?>
