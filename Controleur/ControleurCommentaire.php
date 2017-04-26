<?php
require_once 'Framework/Controleur';
require_once 'Modele/Commentaire.php';
require_once 'Modele/Episode.php';


class ControleurCommentaire extends Controleur
{
    private $commentaire;

    public function __construct()
    {
        $this->commentaire = new Commentaire();
    }

    public function index()
    {
        return;
    }


    public function signalerAbusif()
    {
        $idEpisode = $this->requete->getParametre("id_Episode");
        $idCommentaire = $this->requete->getParametre("id");
        $this->commentaire->signCommentaireAbusif($idCommentaire);
        $this->executerAction("index");
    }


    public function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}