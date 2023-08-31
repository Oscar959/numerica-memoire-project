<?php
require("../../models/connexion.php");

function insert_new_work($uuid,$title, $resume, $Categories_domaine, $filename, $userId)
{
    $date = date("Y-m-d H:i:s");
    $pdo = getConnexion();
    $smt = $pdo->prepare("INSERT INTO `coursreleased`(`id`, `title`, `sumUp`, `fileName`, `timeRegister`, `userReleasedId`, `CategoriesId`) 
    VALUES (:id,:title,:sumUp,:filename,:timeRegister,:userReleasedId,:CategoriesId)");

    $smt->execute(array(
        "id" => $uuid,
        "title" => $title,
        "sumUp" => $resume,
        "filename" => $filename,
        "timeRegister" => $date,
        "userReleasedId" => $userId,
        "CategoriesId" => $Categories_domaine
    ));

    return 1;
}
