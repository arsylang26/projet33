<?php $this->titre="Alaska: Modification"; ?>
<!--id=get, titre,contenu=post-->
    <form class="col-lg-offset-1 col-lg-10" method="POST" action="administration/modifEpisode/<?=$this->nettoyer($episode['id'])?>">
        <!--affichage du formulaire de saisie prérempli-->
        <div class ="form-group">
            <label for="titre">Titre de l'épisode :</label>
            <input class="form-control" type="text" name="titre" id="titre" value="<?=$this->nettoyer($episode['titre']); ?>" required />
        </div>
        <div class ="form-group">
            <label for="episode">Votre texte :</label>
            <textarea  class="form-control tiny" name="contenu" rows = "20"><?=$this->nettoyer($episode['contenu']);?></textarea>
        </div>
        <button  type="submit" class="btn btn-success center-block">valider</button>
    </form>
