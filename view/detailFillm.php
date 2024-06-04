<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> acteurs</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITLE</th>
            <th>RELEASE DATE</th>
            <th>DURATION</th>
            <th>SYNOPSIS</th>
            <th>RATING</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $film) { ?>
            <tr>
                <td><?= $film["titleFilm"] ?></td>
                <td><?= $film["yearRelease"] ?></td>
                <td><?= $film["durationMins"] ?></td>
                <td><?= $film["synopsisFilm"] ?></td>
                <td><?= $film["ratingFilm"] ?></td>
            </tr>

           <?php } ?>
    </tbody>
</table>
<?php 
    $titre = "Detail de film";
    $titre_secondaire = "Detail de film";

    // On va donc "aspirer" tout ce qui se trouve entre 2 fonctions "ob_start()" et "ob_get_clean()" 
                // (temporisation de sortie) 
        // pour stocker le contenu dans une variable $contenu
    $contenu = ob_get_clean();

    // Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php

    require "view/template.php";
?>
