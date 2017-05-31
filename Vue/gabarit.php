<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8"/>
    <base href="<?= $racineWeb ?>">
    <link rel="stylesheet" href="Contenu/style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Raleway|Courgette|Merienda" rel="stylesheet">
    <link href="Contenu/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title><?= $titre ?></title>
</head>
<body>
<div id="global">
    <header>
        <?php if (!isset($_SESSION['admin'])) : ?>
            <a class="connect_admin" href="connexion">administration du site</a>
        <?php else : ?>
            <div class="connect_admin">
                <form action="connexion/deconnecter" method="POST">
                    connecté en tant que
                    <mark><?= $_SESSION['admin'] ?></mark>
                    <button class="deconnect btn btn-warning" name="#" data-confirm="Vous déconnecter ?" type="submit">
                        déconnexion
                    </button>
                </form>
            </div>
        <?php endif; ?>
        <div class="bienvenue">
            <a href="index.php"><h1>Billet simple pour l'Alaska</h1></a>
            <p>Bienvenue sur le livre en ligne de Jean Forteroche.</p>
        </div>
        <?php if (isset($_SESSION['admin'])) : ?>
            <div class="row">
                <div class="col-sm-2 col-sm-offset-3">
                    <a href="administration/creerEpisode" class="btn btn-sm btn-primary"> écrire un nouvel
                        épisode </a>
                </div>
                <div class="col-sm-2 col-sm-offset-2">
                    <a href="administration/affichAbusif" class="btn btn-sm btn-primary"> voir les commentaires
                        abusifs </a>
                </div>
            </div>
        <?php endif; ?>
    </header>
    <br/>
    <div class="flash">
        <?php $flash->display(); ?>
    </div>
    <br/>
    <p class="indication">vous êtes ici: <strong><?= $titre ?></strong> du blog Alaska</p>
    <div id="contenu">
        <?= $contenu ?>
    </div>
</div> <!--global-->
<script src="Contenu/jquery.js"></script>
<script src="Contenu/bootstrap/js/bootstrap.js"></script>
<script src="Contenu/TinyMCE/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector: 'textarea.tiny', language: 'fr_FR',entity_encoding : "raw",
        encoding: "UTF-8"});</script>
<script src="Contenu/script.js"></script>
</body>
</html>