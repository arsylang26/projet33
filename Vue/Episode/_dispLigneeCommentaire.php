<?php
foreach ($commentaires as $lignee) { ?>
<div class="commentaire_affich">
    <!-- afichage de la date,auteur, contenu commentaire et bouton commenter-->
    <p><?= $this->nettoyer($lignee['date']) ?> , <strong><?= $this->nettoyer($lignee['auteur']) ?></strong> a dit : </p>
    <p class="commentaire_contenu"><?=$this->nettoyer($lignee['contenu']) ?></p>
    <?php
    if ($lignee['rang'] < 3) {
        echo '<button id="bouton_commenter" type = "button" class="btn-xs btn-primary" data-toggle = "collapse" data-target = "#commentaire_form_' . $lignee['id'] . '">commenter</button >';
    }
    ?>
    <!-- bouton de signalement des abusifs qui lève, au clic, un modal de confirmation -->
    <form method="post" action="episode/signalerAbusif" id="bouton_abusif">
        <input type="hidden" name="id_episode" value="<?= $episode['id'] ?>"/>
        <input type="hidden" name="id" value="<?= $lignee['id'] ?>"/>
        <button id="bouton_abusif" type="submit" data-confirm="Êtes-vous sûr ?"
                class="btn-xs btn-danger">
            abusif
        </button>
    </form>

    <!--affichage de la zone de saisie des commentaires de commentaire-->
    <div class="commentaire_form collapse" id="commentaire_form_<?= $lignee['id'] ?>">
        <form method="post" action="episode/commenterCommentaire">
            <div class="form-group">
                <legend>votre commentaire:</legend>
            </div>
            <div class="form-group">
                <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" minlength="3" maxlength="10" autofocus required/>
            </div>
            <div class="form-group">
                <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire" minlength="10" maxlength="140" required></textarea>
            </div>
            <input type="hidden" name="id_episode" value="<?= $episode['id'] ?>"/>
            <input type="hidden" name="parent" value="<?= $lignee['id'] ?> "/>
            <button class="btn-xs btn-success" type="submit">Envoyer</button>
            <button class="btn-xs btn-warning" type="reset">Annuler</button>
        </form>
    </div>
    <!-- fonction récursive pour obtenir les enfants de commentaires-->
    <div class="commentaire_enfant">
        <?php
        $commentaires=$modeleCommentaire->getEnfantCommentaire($lignee['id']);
        include '_dispLigneeCommentaire.php';
        ?>
    </div>
</div>
<?php } ?>