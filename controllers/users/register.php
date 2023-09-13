<?php

require("../../models/users/register.php");
require("../../controllers/function.php");

if (isset($_POST['nom'])) {
    $nom = $_POST['nom'];
    $mdp = $_POST['password'];
    $prenom = $_POST['username'];

    $filename = apostrophe($_FILES["file"]["name"]);
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "../../views/users/upload/" . $filename;
    $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));


    $status = registerNewUser($uuid,$nom, $mdp, $prenom, $filename);

    if($status == 1){
        // Now let's move the uploaded image into the folder: image
        move_uploaded_file($tempname, $folder);
        echo "status : ok";
    }
}
