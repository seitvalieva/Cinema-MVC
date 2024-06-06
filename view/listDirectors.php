<?php ob_start(); 


?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> realisateurs </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NAME</th>
            <th>SURNAME</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $director) { ?>
            <tr>
                <td><a href=""><?= $director["nameDirector"] ?></a></td>
                <td><a href=""><?= $director["surnameDirector"] ?></a></td>
            </tr>

           <?php } ?>
    </tbody>
</table>
<?php 
    $titre = "List of directors";
    $titre_secondaire = "List of directors";

    $contenu = ob_get_clean();

    require "view/template.php";
?>
