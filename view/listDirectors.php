<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> realisateurs </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NAME</th>
            <TH>SURNAME</TH>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $director) { ?>
            <tr>
                <td><?= $director["nameDirector"] ?></td>
                <td><?= $director["surnameDirector"] ?></td>
            </tr>

           <?php } ?>
    </tbody>
</table>
<?php 
    $titre = "List of directors";
    $titre_secondaire = "List of directors";

    // On va donc "aspirer" tout ce qui se trouve entre 2 fonctions "ob_start()" et "ob_get_clean()" 
                // (temporisation de sortie) 
        // pour stocker le contenu dans une variable $contenu
    $contenu = ob_get_clean();

    // Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php

    require "view/template.php";
?>
