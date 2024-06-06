<?php ob_start(); 

$castings = $requeteCasting->fetchAll();

foreach($requeteFilm->fetchAll() as $film) { 
    $idFilm = $film["idFilm"];
    $titleFilm = $film["titleFilm"];
    $yearRelease = $film["yearRelease"];
    $durationMins = $film["durationMins"];
    $poster = $film["posterFilm"];
    $synopsisFilm = $film["synopsisFilm"];
    $rating = $film["ratingFilm"];
    
}
?>

<p class="uk-label uk-label-warning">Details de <?= $titleFilm ?></p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>RELEASE DATE</th>
            <th>DURATION</th>
            <th>POSTER</th>
            <th>SYNOPSIS</th>
            <th>RATING</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $film["idFilm"] ?></td>
            <td><?= $film["titleFilm"] ?></td>
            <td><?= $film["yearRelease"] ?></td>
            <td><?= $film["durationMins"] ?></td>
            <td><?= $film["posterFilm"] ?></td>
            <td><?= $film["synopsisFilm"] ?></td>
            <td><?= $film["ratingFilm"] ?></td>
        </tr>
    </tbody>
</table>

<h2>Casting of the film</h2>
<?php
    foreach($castings as $cast) {
        echo $cast["nameActor"]." ".$cast["surnameActor"]." as ".$cast["nameRole"]."<br>";
    }
?>

<?php 
    $titre = "Details of a film";
    $titre_secondaire = "Details of a film";

    // On va donc "aspirer" tout ce qui se trouve entre 2 fonctions "ob_start()" et "ob_get_clean()" 
                // (temporisation de sortie) 
        // pour stocker le contenu dans une variable $contenu
    $contenu = ob_get_clean();

    // Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php

    require "view/template.php";
?>