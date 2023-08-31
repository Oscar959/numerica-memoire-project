<?php

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
"://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));

require("connexion.php");

function login_admin($nom,$mdp){
    $pdo = getConnexion();
    $req = "SELECT id FROM admin where name= :name AND mdp = :mdp ";
    $smt = $pdo->prepare($req);
    $smt->execute(array(
        'name' => $nom,
        'mdp' => $mdp,
    ));
    
    if($smt->rowCount()>0){
        $_SESSION['name'] = $nom;
        $_SESSION['mdp'] = $mdp;
        return 1;
    }else{
        return 0;
    }

}

// connecting a users to a system

function login_users($nom, $mdp){
    $pdo = getConnexion();
    $req = "SELECT id FROM users where name= :name AND mdp = :mdp ";
    $smt = $pdo->prepare($req);
    $smt->execute(array(
        'name' => $nom,
        'mdp' => $mdp,
    ));

    if ($smt->rowCount() > 0) {
        $_SESSION['name'] = $nom;
        $_SESSION['mdp'] = $mdp;
        return 1;
    } else {
        return 0;
    }
}