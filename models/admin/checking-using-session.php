<?php

include("../../models/connexion.php");


function getting_data_sessions($name, $mdp){
    $pdo = getConnexion();
    $req = "SELECT * FROM admin WHERE name=:name and mdp =:mdp";
    $smt = $pdo->prepare($req);
    $smt -> execute(array(
        'name' => $name,
        'mdp' => $mdp
    ));

    $users_sessions = [];

    while($row = $smt->fetch()){
        $user_session =[
            'id' => $row['id'],
            'name' => $row['name'],
            'firstname' => $row['firstname'],
            'picture' => $row['picture']
        ];

        $users_sessions[] = $user_session;
    }

    return $users_sessions;
}