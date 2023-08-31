<?php

include("../../models/connexion.php");

function getTableInRealesed()
{

  $pdo = getConnexion();
  $query = $pdo->prepare("SELECT c.`id` as cId, `title`, `sumUp`, `fileName`, `statusFile`, `downloadNumber`, `userReleasedId`, `CategoriesId`,`picture`,`libelle` 
                          FROM `coursreleased` as c INNER JOIN users as u ON c.userReleasedId = u.id INNER JOIN categories as ca ON c.CategoriesId = ca.id WHERE statusFile='0' ORDER BY title DESC");

  $query->execute();

  $output = "";

  while ($row = $query->fetch()) {
      $output .= "
      <tr>
        <th scope='row'><a href='#'><img src='../../views/users/upload/" . $row['picture'] . "' alt=''></a></th>
        <td><a href='../../views/users/viewingTheFIle.php?title=" . $row['fileName'] . "' class='text-primary fw-bold link-file-pdf' data-toggle='tooltip' title='lire le fichier avant de decider'>" . $row['title'] . "</a></td>
        <td class=''>" . $row['libelle'] . "</td>
        <td class='fw-bold'><button class='badge badge-warning btn btn-warning'>En attente</button></td>
        <td class='fw-bold'><button class='badge badge-success btn btn-success btn-approving' id=" . $row['cId'] . ">Approuver</button></td>
      </tr>
    ";
  }

  return $output;
}
