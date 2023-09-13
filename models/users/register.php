<?php

use function PHPSTORM_META\map;

require("../../models/connexion.php");

function registerNewUser($uuid,$nom, $mdp, $prenom, $filename){
    $pdo= getConnexion();

    $query = $pdo->prepare("INSERT INTO `users`(`id`, `name`, `firstname`, `mdp`, `picture`) VALUES (:id,:name,:firstname,:mdp,:picture)");

    $query->execute(array(
        'id' => $uuid,
        'name' => $nom,
        'firstname' => $prenom,
        'mdp' => $mdp,
        'picture' => $filename    
    ));
        
    return 1;
}


