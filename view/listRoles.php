<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> roles</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>PERSONNAGE</th>
            <th>FILM</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $role) { ?>
            <tr>
                <td><?= $role["idRole"] ?></td>
                
                <td><a href=""><?= $role["nameRole"] ?></a></td>
            
                <!-- <td><a href=""><?= $film["titleFilm"] ?></a></td> -->
            </tr>

           <?php } ?>
    </tbody>
</table>
<?php 
    $titre = "list of roles";
    $titre_secondaire = "List of roles";

    $contenu = ob_get_clean();

    require "view/template.php";
?>
