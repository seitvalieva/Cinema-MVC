<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> genres de film</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <TH>NAME</TH>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $genre) { ?>
            <tr>
                <td><?= $genre["idGenre"] ?></td>
                <td><?= $genre["nameGenre"] ?></td>
            </tr>

           <?php } ?>
    </tbody>
</table>
<?php 
    $titre = "list of genres";
    $titre_secondaire = "List of genres";

    // On va donc "aspirer" tout ce qui se trouve entre 2 fonctions "ob_start()" et "ob_get_clean()" 
                // (temporisation de sortie) 
        // pour stocker le contenu dans une variable $contenu
    $contenu = ob_get_clean();

    // Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php

    require "view/template.php";
?>
