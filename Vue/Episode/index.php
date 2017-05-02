<?php $this->titre = "Alaska - " .$this->nettoyer($episode['titre']); ?>
<article>
    <header>
        <h1 class="episode_titre"><?= $this->nettoyer($episode['titre']) ?></h1>
        <p class="episode_titre">Rédigé <?= $this->nettoyer($episode['date']) ?></p>
    </header>
    <div class="episode_contenu"><?= htmlspecialchars_decode($episode['contenu']) ?></div>
    <button type="button" class="btn-xs btn-info" data-toggle="collapse" data-target="#commentaire_form_episode">
        commenter
    </button>
    <div class="commentaire_form collapse" id="commentaire_form_episode">
        <form method="post" action="episode/commenterEpisode">
            <div class="form-group">
                <p>votre commentaire:</p>
            </div>
            <div class="form-group">
                <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" maxlength="10"
                       autofocus required/>
            </div>
            <div class="form-group">
                        <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire"
                                  maxlength="140" required></textarea>
            </div>
            <input type="hidden" name="id" value="<?= $this->nettoyer($episode['id']) ?>"/>
            <button class="btn-xs btn-success" type="submit">Envoyer</button>
            <button class="btn-xs btn-warning" type="reset">Annuler</button>
        </form>
    </div>
</article>
<hr/>
<header>
    <?php
    if ($commentaires->fetch()) {
        echo '<h1 id="titreReponses">Réponses à : ' . $this->nettoyer($episode['titre']) . '</h1>';
    }else {echo'Cet épisode n\'a encore aucun commentaire';}
    ?>
</header>
<article>
    <div class="container">
        <!-- affichage en décalé des commentaires suivant leur rang -->
        <?php function dispLigneeCommentaire($episode, $commentaires, $modele)
        {
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
                                <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" maxlength="10"
                                       autofocus required/>
                            </div>
                            <div class="form-group">
                                <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire"
                                          maxlength="140" required></textarea>
                            </div>
                            <input type="hidden" name="id_episode" value="<?= $episode['id'] ?>"/>
                            <input type="hidden" name="parent" value="<?= $lignee['id'] ?> "/>
                            <button class="btn-xs btn-success" type="submit">Envoyer</button>
                            <button class="btn-xs btn-warning" type="reset">Annuler</button>
                        </form>
                    </div>
                    <!-- fonction récursive pour obtenir les enfants de commentaires-->
                    <div class="commentaire_enfant">
                        <?php dispLigneeCommentaire($episode, $modele->getEnfantCommentaire($lignee['id']), $modele); ?>
                    </div>
                </div>
            <?php }
        }
        ?>
        <!-- affichage en décalé des niveaux de commentaires avec possibilité de commenter le commentaire ou de le signaler comme abusif-->
        <?php dispLigneeCommentaire($episode, $commentaires, $modeleCommentaire); ?>
    </div>
</article>