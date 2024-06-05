<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> roles</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <TH>PERSONNAGE</TH>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $role) { ?>
            <tr>
                <td><?= $role["idRole"] ?></td>
                <td><?= $role["nameRole"] ?></td>
            </tr>

           <?php } ?>
    </tbody>
</table>
<?php 
    $titre = "liste de role";
    $titre_secondaire = "Liste des roles";

    // On va donc "aspirer" tout ce qui se trouve entre 2 fonctions "ob_start()" et "ob_get_clean()" 
                // (temporisation de sortie) 
        // pour stocker le contenu dans une variable $contenu
    $contenu = ob_get_clean();

    // Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php

    require "view/template.php";
?>
