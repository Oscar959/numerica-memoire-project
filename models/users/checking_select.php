<?php

include("../../models/connexion.php");

function gettingSelect(){
    $pdo = getConnexion();
    $req = "SELECT * FROM categories";
    $smt = $pdo->prepare($req);
    $smt->execute();

    $output = "";

    if ($smt->rowCount() > 0) {
        while ($row = $smt->fetch()) {
            $output .= "<option value=" . $row['id'] . ">" . $row['libelle'] . "</option>";

        }

        return $output;
    }
    
}