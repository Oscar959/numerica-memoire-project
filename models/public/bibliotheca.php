<?php

//calling the function that will allow to connect to the db

require("../../models/connexion.php");

function onLoadSelect()
{
  $pdo = getConnexion();

  $query = $pdo->prepare("SELECT * FROM categories");

  $query->execute();

  $output = "";

  while ($row = $query->fetch()) {
    $output .= "
        <option value=" . $row['id'] . ">" . $row['libelle'] . "</option>";
  }

  return $output;
}

function loadTableDataCategories($select)
{
  $pdo = getConnexion();
  $query = $pdo->prepare("SELECT title, sumUp,fileName, statusFile, downloadNumber, CategoriesId, `name`, `firstname`, `picture` FROM coursreleased as c INNER JOIN users as u ON c.userReleasedId = u.id WHERE statusFile='1' AND CategoriesId=:CategoriesId");
  //$query->bindValue(":CategoriesId", $select, PDO::PARAM_STR);
  $query->execute(array(
    "CategoriesId" => $select
  ));


  $output = "";

  while ($row = $query->fetch()) {
    $output .= "
    <div class='card'>
    <div class='card-body'>
      <h5 class='card-title text-black' style='font-family:verdana'>" . $row['title'] . "</h5>

      <!-- Default Accordion -->
      <div class='accordion' id='accordionExample'>
        <div class='accordion-item'>
          <h2 class='accordion-header' id='headingOne'>
            <button class='accordion-button' style='font-family:verdana' type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
              <strong>Information du travail</strong>
            </button>
          </h2>
          <div id='collapseOne' class='accordion-collapse collapse show' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>
            <div class='accordion-body'>
            " . $row['sumUp'] . " <br>

            <button class='btn btn-primary mt-2 link-doc-class' id='".$row['fileName']."' style='font-family:verdana' type='button'>
              <strong>Lire le livre</strong>
            </button>
            </div>
          </div>
        </div>
        <div class='accordion-item'>
          <h2 class='accordion-header' id='headingTwo'>
            <button class='accordion-button collapsed' style='font-family:verdana' type='button' data-bs-toggle='collapse' data-bs-target='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>
              <strong>Auteur du travail</strong>
            </button>
          </h2>
          <div id='collapseTwo' class='accordion-collapse collapse' aria-labelledby='headingTwo' data-bs-parent='#accordionExample'>
            <div class='accordion-body'>
              <div class='row'>
                <div class='col-lg-6'>
                  Nom : <strong>" . $row['name'] . "</strong></br>
                  Prenom : <strong>" . $row['firstname'] . "</strong></br>
                </div>

                <div class='col-lg-6'>
                  <img src='../../views/users/upload/" . $row['picture'] . "' class='rounded-circle w-50 h-60'>
                </div>
              </div>
              
              
            </div>
          </div>
        </div>
        <div class='accordion-item'>
          <h2 class='accordion-header' id='headingThree'>
            <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseThree' aria-expanded='false' aria-controls='collapseThree'>
            <strong>Autres informations</strong>
            </button>
          </h2>
          <div id='collapseThree' class='accordion-collapse collapse' aria-labelledby='headingThree' data-bs-parent='#accordionExample'>
            <div class='accordion-body'>
              <button type='button' class='btn btn-secondary'>
                Nombre des vues:<span class='badge badge-black'>".$row['downloadNumber']."</span>
              </button>
            </div>
          </div>
        </div>
      </div><!-- End Default Accordion Example -->

    </div>
  </div>
    ";
  }
  return  $output;
}
function loadTableDataCategoriesTout()
{
  $pdo = getConnexion();
  $query = $pdo->prepare("SELECT title, sumUp,fileName, statusFile, downloadNumber, CategoriesId, `name`, `firstname`, `picture` FROM coursreleased as c INNER JOIN users as u ON c.userReleasedId = u.id WHERE statusFile='1'");
  //$query->bindValue(":CategoriesId", $select, PDO::PARAM_STR);
  $query->execute();
  $output = "";

  while ($row = $query->fetch()) {
    $output .= "
        <div class='card'>
        <div class='card-body'>
          <h5 class='card-title text-black' style='font-family:verdana'>" . $row['title'] . "</h5>

          <!-- Default Accordion -->
          <div class='accordion' id='accordionExample'>
            <div class='accordion-item'>
              <h2 class='accordion-header' id='headingOne'>
                <button class='accordion-button' style='font-family:verdana' type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                  <strong>Information du travail</strong>
                </button>
              </h2>
              <div id='collapseOne' class='accordion-collapse collapse show' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>
                <div class='accordion-body'>
                " . $row['sumUp'] . " <br>

                <button class='btn btn-primary mt-2 link-doc-class' id='".$row['fileName']."' style='font-family:verdana' type='button'>
                  <strong>Lire le livre</strong>
                </button>
                </div>
              </div>
            </div>
            <div class='accordion-item'>
              <h2 class='accordion-header' id='headingTwo'>
                <button class='accordion-button collapsed' style='font-family:verdana' type='button' data-bs-toggle='collapse' data-bs-target='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>
                  <strong>Auteur du travail</strong>
                </button>
              </h2>
              <div id='collapseTwo' class='accordion-collapse collapse' aria-labelledby='headingTwo' data-bs-parent='#accordionExample'>
                <div class='accordion-body'>
                  <div class='row'>
                    <div class='col-lg-6'>
                      Nom : <strong>" . $row['name'] . "</strong></br>
                      Prenom : <strong>" . $row['firstname'] . "</strong></br>
                    </div>

                    <div class='col-lg-6'>
                      <img src='../../views/users/upload/" . $row['picture'] . "' class='rounded-circle w-50 h-60'>
                    </div>
                  </div>
                  
                  
                </div>
              </div>
            </div>
            <div class='accordion-item'>
              <h2 class='accordion-header' id='headingThree'>
                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseThree' aria-expanded='false' aria-controls='collapseThree'>
                <strong>Autres informations</strong>
                </button>
              </h2>
              <div id='collapseThree' class='accordion-collapse collapse' aria-labelledby='headingThree' data-bs-parent='#accordionExample'>
                <div class='accordion-body'>
                  <button type='button' class='btn btn-secondary'>
                    Nombre des vues:<span class='badge badge-black'>".$row['downloadNumber']."</span>
                  </button>
                </div>
              </div>
            </div>
          </div><!-- End Default Accordion Example -->

        </div>
      </div>
    ";
  }
  return  $output;
}

function updatingCountNumber($title)
{
  $pdo = getConnexion();

  $query = $pdo->prepare("UPDATE `coursreleased` SET `downloadNumber`= `downloadNumber`+1 WHERE `fileName` = :fileName");

  $query->execute(array(
    'fileName' => $title
  ));

  if ($query) {
    return 1;
  }
}
