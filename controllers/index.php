<?php

require("../models/index.php");
session_start();
$erreur = "";
if (isset($_POST['username']) || isset($_POST['password'])) {
    $nom = trim(htmlspecialchars($_POST['username']));
    $mdp = $_POST['password'];
    if (!empty($nom) || !empty($mdp)) {

        //calling the functions that will log the admin in system
        $status = login_admin($nom, $mdp);

        //if the connection is successfull here is the code that will be executed

        if ($status === 1) {
            //header("location:../views/admin/center.php");
            $erreur = $erreur = '<script>
                                    window.location.replace("../views/admin/index.php");
                                </script>';
        } else if ($status === 0) {
            $statut = login_users($nom, $mdp);
            if ($statut === 1) {
                $erreur = '<script>
                                window.location.replace("../views/users/index");
                           </script>';
            } else {
                $erreur = "<p>les informations incorectes réessayez svp</p>";
            }
        } else {
            $erreur = "<p>les informations incorectes réessayez svp</p>";
        }/*
                     if(!empty($_POST['remember'])){
                         setcookie("admin_login", $_POST["nom"], time()+(10*365*24*60*60));
                         setcookie("admin_prenom", $_POST["prenom"], time()+(10*365*24*60*60));
                         setcookie("admin_password", $_POST["mdp"], time()+(10*365*24*60*60));
                     }else{
                         if(isset($_COOKIE["admin_login"])){
                             setcookie("admin_login", "");
                         }
                         if(isset($_COOKIE["admin_prenom"])){
                             setcookie("admin_prenom", "");
                         }

                         if(isset($_COOKIE["admin_prenom"])){
                            setcookie("admin_password", "");
                        }
                     }*/
    }
}
echo $erreur;
