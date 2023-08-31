<?php

require("../../models/users/checking_select.php");

if(isset($_POST['onClickSelect'])){
    $output = gettingSelect();

    if ($output != "") {
        echo $output;
    } 
}

