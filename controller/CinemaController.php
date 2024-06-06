<?php

namespace Controller;
// contiendra l'ensemble des requêtes 
    // dans les fonctions en relation avec les vues -->

    // l'utilisation du "use" pour accéder à la classe Connect 
        // située dans le namespace "Model"
    use Model\Connect;   

    class CinemaController {

        public function listFilms(){

            
            $pdo = Connect::seConnecter();      // On se connecte
            // On exécute la requête de notre choix
            $requete = $pdo->query("                
                SELECT idFilm, titleFilm, yearRelease 
                FROM film
                ");

            require "view/listFilms.php";   // On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        }

        public function listActors(){

            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
                SELECT idActor, nameActor, surnameActor
                FROM actor
            ");
            require "view/listActors.php";
        }

        public function detailFilm($id) {

            //On stocke dans une variable $pdo la connection à la base de données
            $pdo = Connect::seConnecter();
            /* L'élément id en paramètres est un élément variable, il faut donc prepare() pour s'assurer que ce qui est entré en paramètres correspond bien à ce qu'on nous demande */
            $requeteFilm = $pdo->prepare("
            SELECT * 
            FROM film
            WHERE idFilm = :id
            ");

            $requeteCasting = $pdo->prepare(
                "SELECT nameActor, surnameActor, nameRole
                FROM casting
                INNER JOIN role ON casting.idRole = role.idRole
                INNER JOIN actor ON casting.idActor = actor.idActor
                WHERE casting.idFilm = :id"
            );

            $requeteFilm->execute(["id" => $id]);
            $requeteCasting->execute(["id" => $id]);
            
            require "view/detailFilm.php";

    }
    public function listDirectors() {
        $pdo = Connect::seConnecter();

        $requete = $pdo->query("
                SELECT nameDirector, surnameDirector
                FROM director
            ");
            require "view/listDirectors.php";
    }

    public function listGenres() {
        $pdo = Connect::seConnecter();

        $requete = $pdo->query("
            SELECT idGenre, nameGenre
            FROM genre
            ");
        
            require "view/listGenres.php";
    }
    public function listRoles() {
        $pdo = Connect::seConnecter();

        $requete = $pdo->query("
            SELECT idRole, nameRole
            FROM role
            ");
        
            require "view/listRoles.php";
    }
    public function detailACTOR($id) {

        $pdo = Connect::seConnecter();
        $requeteActor = $pdo->prepare("
        SELECT * 
        FROM actor
        WHERE idActor = :id
        ");

        $requeteFilmographie = $pdo->prepare("
        SELECT nameActor, surnameActor, nameRole, titleFilm
        FROM casting 
        INNER JOIN actor ON casting.idActor = actor.idActor
        INNER JOIN role ON casting.idRole = role.idRole
        INNER JOIN film ON casting.idFilm = film.idFilm
        WHERE casting.idActor = :id
        ");

        $requeteActor->execute(["id" => $id]);
        $requeteFilmographie->execute(["id" => $id]);
        
        require "view/detailActor.php";

}
}