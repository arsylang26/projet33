<?php $this->titre = "Alaska: gestion des commentaires abusifs" ?>

<?php
if ($nbCommentairesAbusifs>0){ ?>
<section class="col-sm-8 table-responsive">
    <form method="post" action="administration/supprCommentaire">
        <table class="table table-bordered table-striped table-condensed">
            <caption>
                <?= $nbCommentairesAbusifs?> commentaires signalés comme abusifs par les lecteurs
            </caption>
            <tr>
                <th>Date</th>
                <th>Auteur</th>
                <th>Commentaire</th>
                <th>A supprimer  <input type="checkbox" name="idDel" id="tousAbusifs" /></th>
                <th>non-abusif   <input type="checkbox" name="idOk" id="tousValides" /></th>
            </tr>
            <!-- parcourir la liste des commentaires abusifs , les lister sous forme de tableau avec une case à cocher pour chaque commentaire
            en fin de tableau bouton supprimer avec confirmation pour supprimer la liste cochée -->

            <?php foreach ($commentairesAbusifs as $abusif):

                echo '<tr> 
          <td>' . $this->nettoyer($abusif['date']) . '</td>
          <td>' . $this->nettoyer($abusif['auteur']) . '</td>
          <td>' . $this->nettoyer($abusif['contenu']) . '</td>
          <td><input type="checkbox" name="id_del[]" value="' . $abusif['id'] . '" /></td>
          <td><input type="checkbox" name="id_ok[]" value="' . $abusif['id'] . '" /></td>
          </tr>';
            endforeach;?>

            <tr>
                <td colspan="5">
                    <!--data-confirm est une fontion jquery pour la confirmation d'une action-->
                    <button data-confirm="Êtes-vous sur de supprimer ces commentaires ?"
                            class="btn-xs btn-danger" type="submit">Supprimer les commentaires sélectionnés
                    </button>
                    <button class="btn-xs btn-warning pull-right" type="button" id="tousAbusifs1">Tout selectionner</button>
                </td>
            </tr>

        </table>
    </form>

</section>
<?php } else {
    echo '<p>Aucun commentaire signalé comme abusif</p>';

}?>