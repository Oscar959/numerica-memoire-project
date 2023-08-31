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
    $query = $pdo->prepare("SELECT title, sumUp,fileName, statusFile,	downloadNumber, CategoriesId FROM coursreleased WHERE CategoriesId= :CategoriesId AND statusFile='1'");
    //$query->bindValue(":CategoriesId", $select, PDO::PARAM_STR);
    $query->execute(array(
        "CategoriesId" => $select
    ));


    $output = "";

    while ($row = $query->fetch()) {
        $output .= "
        <div class='card'>
        <div class='card-body'>
          <h5 class='card-title'>Default Tabs Justified</h5>

          <!-- Default Tabs -->
          <ul class='nav nav-tabs d-flex' id='myTabjustified' role='tablist'>
            <li class='nav-item flex-fill' role='presentation'>
              <button class='nav-link w-100 active' id='home-tab' data-bs-toggle='tab' data-bs-target='#home-justified' type='button' role='tab' aria-controls='home' aria-selected='true'>Home</button>
            </li>
            <li class='nav-item flex-fill' role='presentation'>
              <button class='nav-link w-100' id='profile-tab' data-bs-toggle='tab' data-bs-target='#profile-justified' type='button' role='tab' aria-controls='profile' aria-selected='false'>Profile</button>
            </li>
            <li class='nav-item flex-fill' role='presentation'>
              <button class='nav-link w-100' id='contact-tab' data-bs-toggle='tab' data-bs-target='#contact-justified' type='button' role='tab' aria-controls='contact' aria-selected='false'>Contact</button>
            </li>
          </ul>
          <div class='tab-content pt-2' id='myTabjustifiedContent'>
            <div class='tab-pane fade show active' id='home-justified' role='tabpanel' aria-labelledby='home-tab'>
              Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.
            </div>
            <div class='tab-pane fade' id='profile-justified' role='tabpanel' aria-labelledby='profile-tab'>
              Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
            </div>
            <div class='tab-pane fade' id='contact-justified' role='tabpanel' aria-labelledby='contact-tab'>
              Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
            </div>
          </div><!-- End Default Tabs -->

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
          <h5 class='card-title'>".$row['title']."</h5>

          <!-- Default Tabs -->
          <ul class='nav nav-tabs d-flex' id='myTabjustified' role='tablist'>
            <li class='nav-item flex-fill' role='presentation'>
              <button class='nav-link w-100 active' id='home-tab' data-bs-toggle='tab' data-bs-target='#home-justified' type='button' role='tab' aria-controls='home' aria-selected='true'>Info</button>
            </li>
            <li class='nav-item flex-fill' role='presentation'>
              <button class='nav-link w-100' id='profile-tab' data-bs-toggle='tab' data-bs-target='#profile-justified' type='button' role='tab' aria-controls='profile' aria-selected='false'>Auteur</button>
            </li>
            <li class='nav-item flex-fill' role='presentation'>
              <button class='nav-link w-100' id='contact-tab' data-bs-toggle='tab' data-bs-target='#contact-justified' type='button' role='tab' aria-controls='contact' aria-selected='false'>Autres</button>
            </li>
          </ul>
          <div class='tab-content pt-2' id='myTabjustifiedContent'>
            <div class='tab-pane fade show active' id='home-justified' role='tabpanel' aria-labelledby='home-tab'>
             ".$row['sumUp']."
            </div>
            <div class='tab-pane fade' id='profile-justified' role='tabpanel' aria-labelledby='profile-tab'>
              <div class='row'>
                <div class='col-lg-4'>
                    <img src='../../views/users/upload/".$row['picture']."' class='rounded-circle w-50 card-img-overlay img-thumbnail'>
                </div>

              </div>
            </div>
            <div class='tab-pane fade' id='contact-justified' role='tabpanel' aria-labelledby='contact-tab'>
              Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
            </div>
          </div><!-- End Default Tabs -->

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

