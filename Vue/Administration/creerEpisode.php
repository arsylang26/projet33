<?php $this->titre="rédaction"; ?>
<form class="col-lg-offset-1 col-lg-10" method="POST" action="administration/creerEpisode">
    <div class ="form-group">
        <label for="titre">Titre de l'épisode :</label>
        <input class="form-control" type="text" name="titre" id="titre" required />
    </div>

    <div class ="form-group">
        <label for="episode">Votre texte :</label>
        <textarea  class="form-control tiny" name="contenu" rows = "20"></textarea>
    </div>
    <button  type="submit" class="btn btn-success center-block">valider</button>

</form>
