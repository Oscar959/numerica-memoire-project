<?php


require("../../models/admin/checking-using-session.php");
if (isset($_SESSION['name']) and ($_SESSION['mdp'])) {
} else {
    header('location:../../../../');
}

    // storing sessions variables into varaibles in order to make a clear query to the the db by selecting all the informations
    $name = $_SESSION['name'];  
    $mdp = $_SESSION['mdp'];

    $sessions=getting_data_sessions($name,$mdp);

    



