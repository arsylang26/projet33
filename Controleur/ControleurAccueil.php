<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Episode.php';
require_once 'Modele/Commentaire.php';


class ControleurAccueil extends Controleur
{
    private $episode;
    private $commentaire;
    public function __construct()
    {
        $this->episode = new Episode();
        $this->commentaire = new Commentaire();
    }

// Affiche la liste de tous les épisodes du blog
    public function index()
    {
        $episodes = $this->episode->getEpisodes();
        $dernCommentaires = $this->commentaire->getDernCommentaires(3);
        $this->genererVue(array('episodes' => $episodes, 'dernCommentaires' => $dernCommentaires));
    }
}
