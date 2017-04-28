<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <base href="<?= $racineWeb ?>">
    <link rel="stylesheet" href="Contenu/style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Jim+Nightshade" rel="stylesheet">
    <link href="Contenu/bootstrap/css/bootstrap.css" rel="stylesheet">


    <title><?= $titre ?></title>
</head>
<body>
<div id="global">
    <header>
        <?php if (!isset($_SESSION['admin'])) : ?>
            <a class="connect_admin" href="index.php/Controleur/administration">administration du site</a>
        <?php else : ?>
            <p class="connect_admin">connecté en tant que <?= $_SESSION['admin'] ?></p>
            '<a class="deconnect_admin" href="index.php/Controleur/deconnexion">déconnexion</a>
        <?php endif; ?>
        <div class="bienvenue">
            <a href="index.php"><h1>Billet simple pour l'Alaska</h1></a>
            <p>Bienvenue sur le livre en ligne de Jean Forteroche.</p>
        </div>
        <?php if (isset($_SESSION['admin'])) : ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-3">
                        <a href="index.php/Controleur/creerEpisode" class="btn-sm btn-primary"> écrire un nouvel
                            épisode </a>
                    </div>
                    <div class="col-sm-3 col-sm-offset-2">
                        <a href="index.php/Controleur/affichAbusif" class="btn-sm btn-primary"> voir les commentaires
                            abusifs </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </header>

    <div id="contenu">
        <?= $contenu ?>
    </div>
</div> <!--global-->
<script src="Contenu/jquery.js"></script>
<script src="Contenu/bootstrap/js/bootstrap.js"></script>
<script src="Contenu/TinyMCE/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector: 'textarea.tiny', language: 'fr_FR'});</script>
<script src="Contenu/script.js"></script>

</html>