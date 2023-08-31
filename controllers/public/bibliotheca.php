<?php

// calling the function on bibliotheca models functions for loading categrories

require("../../models/public/bibliotheca.php");

if (isset($_POST['change_select'])) {
    $out = onLoadSelect();
    echo $out;
} else if (isset($_POST['changeSelect'])) {
    $select = $_POST['changeSelect'];
    $output = loadTableDataCategories($select);

    echo $output;

} else if (isset($_POST['changeSelectTout'])) {
    $output = loadTableDataCategoriesTout();

    echo $output;
}else if (isset($_POST['all'])) {
    $output =loadTableDataCategoriesTout();
    echo $output;
}else if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $output = updatingCountNumber($title);

    if($output === 1){
        echo $output;
    }else{
        echo "no";
    }
    
}