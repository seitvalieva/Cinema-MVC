<?php ob_start(); 

foreach($requeteActor->fetchAll() as $actor) { 
    $idActor = $actor["idActor"];
    $nameActor = $actor["nameActor"];
    $surnameActor = $actor["surnameActor"];
    $gender = $actor["genderActor"];
    $bdayActor = $actor["bdayActor"];
    
}
?>

<p class="uk-label uk-label-warning">Details de <?= $nameActor ?></p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>SURNAME</th>
            <th>GENDER</th>
            <th>BIRTHDAY</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $actor["idActor"] ?></td>
            <td><?= $actor["nameActor"] ?></td>
            <td><?= $actor["surnameActor"] ?></td>
            <td><?= $actor["genderActor"] ?></td>
            <td><?= $actor["bdayActor"] ?></td>
            
        </tr>
    </tbody>
</table>

<?php 
    $titre = "Detail d'acteur";
    $titre_secondaire = "Detail d'acteur";

    // On va donc "aspirer" tout ce qui se trouve entre 2 fonctions "ob_start()" et "ob_get_clean()" 
                // (temporisation de sortie) 
        // pour stocker le contenu dans une variable $contenu
    $contenu = ob_get_clean();

    // Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php

    require "view/template.php";
?>