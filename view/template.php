<!-- le fichier "template.php" qui servira de base / squelette à l'ensemble des vues -->

<!-- pour  déclarer le doctype, les links css / js etc qu'une seule fois dans ce fichier.

On exploitera ce qu'on appelle "la temporisation de sortie" en PHP  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./public/css/<?=$lienCss?>.css"> -->
    <link rel="stylesheet" href="public/css/styles.css">
    <title><?= $titre ?></title>
</head>
<body>
    <header></header>
    
    <main>
        <div id="container">
            <h1>PDO Cinema</h1>
            <h2><?= $titre_secondaire ?></h2>
            <?= $contenu ?>
        </div>
    </main>


    
    <script src ="./public/js/main.js"></script>      
</body>
</html>
