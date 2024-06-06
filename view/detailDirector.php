<?php ob_start(); 

$films = $requeteFilmographie->fetchAll();

foreach($requeteDirector->fetchAll() as $director){
    $idDirector = $director["idDirector"];
    $nameDirector = $director["nameDirector"];
    $surnameDirector = $director["surnameDirector"];

}

?>

<p class="uk-label uk-label-warning">Details of the director </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>SURNAME</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $director["idDirector"] ?></td>
            <td><?= $director["nameDirector"] ?></td>
            <td><?= $director["surnameDirector"] ?></td>
            
        </tr>
    </tbody>
</table>

<h2>Filmographie of the director</h2>
<?php
    foreach($films as $film) {
        echo $film["nameDirector"]." ".$film["surnameDirector"]." .".$film["titleFilm"]."<br>";
    }
?>

<?php 
    $titre = "Details of a director";
    $titre_secondaire = "Details of a director";

 
    $contenu = ob_get_clean();

    require "view/template.php";
?>