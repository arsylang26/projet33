<?php $this->titre = "Mon Blog"; ?>
<?php foreach ($episodes as $episode):
    ?>
    <article>
        <header>
            <a href="<?= "episode/index/" . $this->nettoyer($episode['id']) ?>">
                <h1 class="titreEpisode"><?= $this->nettoyer($episode['titre']) ?></h1>
            </a>
            <time><?= $this->nettoyer($episode['date']) ?></time>
        </header>
        <div class="episode_contenu">
            <?php
            $contenu = strip_tags($episode['contenu']); //supprime les balises html créés par TinyMCE

            if (strlen($contenu) > 250) {
                $contenu = $contenu . "  ...";
            }
            echo $contenu;
            ?>
        </div>
        <?php if (isset($_SESSION['admin'])) { ?>
            <a type="button" class="confirm btn btn-warning btn-sm"
               href="<?= "administration/supprEpisode/" . $this->nettoyer($episode['id']) ?>">supprimer l'épisode </a>
            <a class="btn btn-primary btn-sm" href="<?= "administration/modifEpisode/".$this->nettoyer($episode['id']) ?>">
                modifier l'épisode</a>
        <?php }
        ?>


    </article>
    <hr/>
<?php endforeach; ?>