<?php


//get the file


$file = $_GET['title'];

$filepath = "../users/upload/work/$file";

// header content type
header('Content-type:application/pdf');
header('Content-length:'.filesize($filepath));


//send the file to the browser
readfile($filepath);