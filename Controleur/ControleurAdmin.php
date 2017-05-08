<?php
/*// ControleurAdmin n'est pas nécessaire
require_once 'ControleurSecurise.php';
require_once 'Modele/Episode.php';
require_once 'Modele/Commentaire.php';

//Contrôleur des actions d'administration

class ControleurAdmin extends ControleurSecurise
{
    private $episode;
    private $commentaire;


    public function __construct()
    {
        $this->episode = new Episode();
        $this->commentaire = new Commentaire();
    }

    public function index()
    {
        $nbEpisodes = $this->episode->getNbEpisodes();
        $nbCommentaires = $this->commentaire->getNbCommentaires();
        $admin = $this->requete->getSession()->getAttribut("identifiant");
        $this->genererVue(array('nbEpisode' => $nbEpisodes, 'nbCommentaires' => $nbCommentaires, 'identifiant' => $admin));
    }
}
