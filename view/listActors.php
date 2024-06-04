<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> acteurs</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NAME</th>
            <th>SURNAME</th>
            <th>GENDER</th>
            <th>BIRTHDAY</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $actor) { ?>
            <tr>
                <td><?= $actor["nameActor"] ?></td>
                <td><?= $actor["surnameActor"] ?></td>
                <td><?= $actor["genderActor"] ?></td>
                <td><?= $actor["bdayAtor"] ?></td>
            </tr>

           <?php } ?>
    </tbody>
</table>
<?php 
    $titre = "liste de acteurs";
    $titre_secondaire = "Liste des acteurs";

    // On va donc "aspirer" tout ce qui se trouve entre 2 fonctions "ob_start()" et "ob_get_clean()" 
                // (temporisation de sortie) 
        // pour stocker le contenu dans une variable $contenu
    $contenu = ob_get_clean();

    // Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php

    require "view/template.php";
?>
