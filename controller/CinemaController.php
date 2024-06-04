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
                SELECT titleFilm, yearRelease 
                FROM film
                ");

            require "view/listFilms.php";   // On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        }

        public function listActors(){

            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
                SELECT nameActor, surnameActor, genderActor, bdayAtor
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

            $requeteFilm->execute(["id" => $id]);
            require "view/detailFilm.php";

    }
}