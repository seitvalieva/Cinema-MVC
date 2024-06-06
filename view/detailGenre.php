<?php ob_start(); 

$filmsGenre = $requeteFilmsGenre->fetchAll();

foreach($requeteGenre->fetchAll() as $genre){
    $idGenre = $genre["idGenre"];
    $nameGenre = $genre["nameGenre"];
    
}

?>
<p class="uk-label uk-label-warning">Films of the <?= $nameGenre ?> </p>

<?php
    foreach($filmsGenre as $filmGenre) {

        echo $filmGenre["titleFilm"]."<br>";
    }
?>

<?php 
    $titre = "Films of a genre";
    $titre_secondaire = "Films of a genre";

 
    $contenu = ob_get_clean();

    require "view/template.php";
?>
