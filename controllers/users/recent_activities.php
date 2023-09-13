<?php

require("../../models/users/recent_activities.php");

if(isset($_POST['users'])){
    $users = $_POST['users'];
    
    $status = recent_activity_per_minutes($users);

    echo $status;
}