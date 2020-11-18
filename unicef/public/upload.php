<?php

$target_path = "images/";
$imgData = $_POST['imageData'];
$imgIndex = sprintf('%04d', $_POST['index']);
// image index 0001 do 0077
$lastImage = $_POST['lastIndex'];

//lastimage=75;
//$img = file_get_contents($_POST['imageData']);
$uniqueFileId = $_POST['fileId'];
//uniqueFileid correct
$output_file = $target_path . $uniqueFileId . 'image' . $imgIndex . '.jpeg';
//outputfilecorrect
$output_file = base64ToImage($imgData, $output_file);



//lastimage = 75

if ($_POST['index'] >= ($_POST['lastIndex']+2)) {
   
   echo $uniqueFileId;
  //  $cmd = "ffmpeg -r 25 -pattern_type glob -i /var/www/vhosts/cekaonica.com/dvgame.cekaonica.com/public/images/{$uniqueFileId}image{$imgIndex}.jpeg -c:v libx264 videos/{$uniqueFileId}.mp4";
   $cmd = "ffmpeg -r 25 -pattern_type glob -i /var/www/vhosts/cekaonica.com/dvgame.cekaonica.com/public/images/'{$uniqueFileId}*.jpeg'  -c:v libx264 -s 1200x600 videos/{$uniqueFileId}.mp4";
    $output = shell_exec($cmd);
    $imagesList = [];
	$imagesList = scandir("images/");
	
	/*
	foreach ($imagesList as $img) {
		
		unlink('images/'.$img);
	}
	print_r(scandir("images/"));
	*/
	

    return $uniqueFileId;
}


function base64ToImage($base64_string, $output_file)
{

    $file = fopen($output_file, "wb");

    $data = explode(',', $base64_string);

    fwrite($file, base64_decode($data[1]));
    fclose($file);

    return $output_file;
}
