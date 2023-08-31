<?php


require("../../models/connexion.php");

function changingStatus($id, $statusFile){
    $pdo = getConnexion();
    $smt = $pdo->prepare("UPDATE  `coursreleased` SET `statusFile`=:statusFile WHERE id= :id");

    $smt->execute(array(
        "statusFile" =>$statusFile,
        "id" =>$id
    ));

    return 1;
}