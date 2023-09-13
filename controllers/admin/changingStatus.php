<?php


require("../../models/admin/changingStatus.php");

if (isset($_POST['data'])) {
    $id = $_POST['data'];
    $admin_id = $_POST['admin_id'];
    $statusFile = 1;
    $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
    $output = changingStatus($id, $statusFile);

    if($output === 1){
        $updateInfoId = updateInfoId($id, $uuid, $admin_id);
        if($updateInfoId=== 1){
            echo "success";
        }  
    }
}
