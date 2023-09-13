function recent_activity_per_minutes($today)
{
    $pdo = getConnexion();
    $smt = $pdo->prepare("");
    $smt->execute(array(
        'date_exam' => $today
    ));

    $output = "";

    if ($smt->rowCount() > 0) {
        while ($row = $smt->fetch()) {
            $output .= "
                    <div class='activity-item d-flex'>
                        <div class='activite-label'>" . timeAgo($row['debut_examen_hours']) . "</div>
                            <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                            <div class='activity-content'>
                            " . $row['name'] . " est le surveillant dans le local <a href='#' class='fw-bold text-dark'>" . $row['LOCAL'] . "
                            </a> où il surveillent l'examen de " . $row['cours'] . " de la promotion " . $row['promo'] . " 
                            </div>
                    </div>
                ";
        }

        return $output;
    }else{
        return "no exam started yet";
    }
};