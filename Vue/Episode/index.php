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
        <form method="post" action="episode/commenter">
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
     <?php include '_dispLigneeCommentaire.php'?>
    </div>
</article>