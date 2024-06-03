<!-- contiendra l'ensemble des requêtes 
    dans les fonctions en relation avec les vues -->

    <?php

    // l'utilisation du "use" pour accéder à la classe Connect 
        // située dans le namespace "Model"

    namespace Controller;
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
    }