<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> acteurs</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>SURNAME</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $actor) { ?>
            <tr>
                <td><?= $actor["idActor"] ?></td>
                <td><a href="index.php?action=detailActor&id=<?= $actor["idActor"] ?>"><?= $actor["nameActor"] ?></a></td>
                <td><a href="index.php?action=detailActor&id=<?= $actor["idActor"] ?>"><?= $actor["surnameActor"] ?></a></td>
                
            </tr>

           <?php } ?>
    </tbody>
</table>
<?php 
    $titre = "List of actors";
    $titre_secondaire = "List of actors";

    // On va donc "aspirer" tout ce qui se trouve entre 2 fonctions "ob_start()" et "ob_get_clean()" 
                // (temporisation de sortie) 
        // pour stocker le contenu dans une variable $contenu
    $contenu = ob_get_clean();

    // Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php

    require "view/template.php";
?>
