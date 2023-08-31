<?php


require("../../models/admin/changingStatus.php");

if(isset($_POST['data'])){
    $id = $_POST['data'];
    $statusFile = 1;
    $output = changingStatus($id, $statusFile);

    if($output === 1){
        return 1;
    }
}