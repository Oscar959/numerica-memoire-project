<?php

//calling the models for the functions

require("../../models/users/insert-the-released-work.php");
require("../../controllers/function.php");

if (isset($_POST['title'])) {
    $title = apostrophe($_POST['title']);
    $resume = apostrophe($_POST['resume']);
    $Categories_domaine = $_POST['Categories-domaine'];
    $userId = $_POST['userId'];
    $filename = apostrophe($_FILES["file"]["name"]);
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "../../views/users/upload/work/" . $filename;
    $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
    $output = insert_new_work($uuid,$title, $resume, $Categories_domaine, $filename, $userId);

    if ($output === 1) {
        // Now let's move the uploaded image into the folder: image
        move_uploaded_file($tempname, $folder);
        echo "success";
    }

}
