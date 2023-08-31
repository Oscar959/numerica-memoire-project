<?php

require("../../models/admin/getTableInRealed.php");


if(isset($_POST['table_to_be_released'])){
    $output = getTableInRealesed();

    echo $output;
}