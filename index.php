<!--  l'index.php va servir à accueillir l'action transmise par l'URL (en GET) -->

<?php

session_start();

use Controller\CinemaController;    //On "use" le controller Cinema

spl_autoload_register(function ($class_name) {  // On autocharge les classes du projet
    include $class_name.'.php';
});

$ctrlCinema = new CinemaController();      // On instancie le controller Cinema

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

// En fonction de l'action détectée dans l'URL via la propriété "action" 
//      on interagit avec la bonne méthode du controller

if(isset($_GET["action"])) {

    switch($_GET["action"]) {

        case "listFilms": $ctrlCinema->listFilms(); break;
        
        case "listActors": $ctrlCinema->listActors(); break;

        case "detailFilm": $ctrlCinema->detailFilm($id); break;

        case "listDirectors": $ctrlCinema->listDirectors(); break;

        case "listGenres": $ctrlCinema->listGenres(); break;

        case "listRoles": $ctrlCinema->listRoles(); break;

        case "detailActor": $ctrlCinema->detailActor($id); break;

        case "detailDirector": $ctrlCinema->detailDirector($id); break;

    }
}

?>
