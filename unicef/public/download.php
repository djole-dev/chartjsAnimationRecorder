<?php

// $file = UPLOAD_DIR . $file->filename;
ini_set('memory_limit','-1');

$file = "videos/{$_POST['filename']}";


header('Content-Description: File Transfer');
header('Content-Type: video/mp4');
header('Content-Disposition: attachment; filename=' . basename($file));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
ob_implicit_flush();
ob_clean();
flush();

readfile($file);



die();
