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
                SELECT title, yearRelease FROM film
                ");

                require "view/listFilms.php";   // On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        }
        public function detailActeur($id) {

            //On stocke dans une variable $pdo la connection à la base de données
            $pdo = Connect::seConnecter();
            /* L'élément id en paramètres est un élément variable, il faut donc prepare() pour s'assurer que ce qui est entré en paramètres correspond bien à ce qu'on nous demande */
            $requeteActeur = $pdo->prepare("
            SELECT * 
            FROM Actor
            WHERE idActor = :id");
            requete->execute(["id" => $id]);
            require "view/actor/detailActor.php";
    }