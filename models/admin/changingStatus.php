<?php


require("../../models/connexion.php");

function changingStatus($id, $statusFile)
{
    $pdo = getConnexion();
    $smt = $pdo->prepare("UPDATE `coursreleased` SET `statusFile`=:statusFile WHERE id= :id");

    $smt->execute(array(
        "statusFile" => $statusFile,
        "id" => $id
    ));

    return 1;

  /* 
    if ($query) {
        $date = date("Y:m:d:h:m:s");
        $statement = $pdo->prepare("INSERT INTO `work_admin_status`(`id`, `admin_id`, `workID`, `timeApproving`) 
        VALUES (:id,:admin_id,:workID,:timeApproving)");

        $statement->execute(array(
            'id' => $uuid,
            'admin_id' => $admin,
            'workID' =>$userReleasedId,
            'timeApproving' => $date
        ));
    }*/
}

function updateInfoId($id, $uuid, $admin_id){
    $date = date("Y:m:d:h:m:s");
    $pdo = getConnexion();
    $query = $pdo->prepare("INSERT INTO `work_admin_status`(`id`, `admin_id`, `workID`, `timeApproving`)
                             VALUES (:id,:admin_id,:workId,:timeApproving)");
    $query->execute(array(
        "id" => $uuid,
        "admin_id" => $admin_id,
        "workId" => $id,
        "timeApproving" => $date
    ));

    return 1;

}
