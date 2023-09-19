<?php 

require("../../models/connexion.php");
require("../../controllers/function.php");


function recent_activity_per_minutes($users)
{
    $pdo = getConnexion();
    $smt = $pdo->prepare("SELECT a.name, workID, timeApproving, c.id, statusFile, u.id, c.title
                        FROM work_admin_status AS w 
                        INNER JOIN coursreleased AS c ON w.workID = c.id INNER JOIN admin AS a ON w.admin_id = a.id 
                        INNER JOIN users AS u ON c.userReleasedId = u.id WHERE statusFile = 1 AND u.id=:id;");
    $smt->execute(array(
        'id' => $users
    ));

    $output = "";

    if ($smt->rowCount() > 0) {
        while ($row = $smt->fetch()) {
            $output .= "
                    <div class='activity-item d-flex' style='font-family:poppins'>
                        <div class='activite-label'>" . timeAgo($row['timeApproving']) . "</div>
                            <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                            <div class='activity-content'>
                            " . $row['name'] . " l'admnistrateur a approuvé votre travail,dont le titre est <strong class='text-secondary'>".$row['title']."</strong> donc visible au public maintenant
                            </div>
                    </div>
                ";
        }

        return $output;
    }else{
        return "en attente d'approuval";
    }
};