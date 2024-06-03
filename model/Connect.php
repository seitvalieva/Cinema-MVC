 <!-- le fichier "Connect.php" permettant de se connecter à la BDD (grâce à PDO) -->
 <?php

 namespace Model;       // le namespace de la classe Connect --> "Model",
 
//  La classe est abstraite car on n'instanciera jamais la classe Connect puisqu'on aura 
//          seulement besoin d'accéder à la méthode "seConnecter"
 abstract class Connect {

    const HOST = "localhost";
    const DB = "cinema";
    const USER = "root";
    const PASS = "";

    //  la présence d'un "\" devant PDO indiquant au framework que PDO est une classe native et non une classe du projet

    public static function seConnecter() {
        try {
            return new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", self::USER, self::PASS);
        } catch(\PDOException $ex) {
            return $ex->getMessage();
        }
    }
 }