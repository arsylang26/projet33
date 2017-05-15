<?php foreach ($episodes as $episode):?>
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

<aside class="aPropos">
    <h1>A propos de l'auteur</h1>
    <p id="photo_jf">
        <img src="Contenu/images/photo_jf.jpg" alt="photo de Jean Forteroche">
    </p>
    <p>
        Ma vocation d'écrivain est apparue tardivement après ma longue carrière cinématographique.
    </p>
    <p>
        Incenderat autem audaces usque ad insaniam homines ad haec, quae nefariis egere conatibus,
        Luscus quidam curator urbis subito visus: eosque ut heiulans baiolorum praecentor ad expediendum quod orsi sunt
        incitans vocibus crebris. qui haut longe postea ideo vivus exustus est.
    </p>
    <p>
        "Billet simple pour l'Alaska" sera mon ultime témoignage.
    </p>
</aside>
<aside class="lastComments">
    <h4>Trois derniers commentaires</h4>
<?php
for ($i=1;$i<=3;$i++){
    echo'<p>commentaire '.$i.'</p>';
}
?>
</aside>