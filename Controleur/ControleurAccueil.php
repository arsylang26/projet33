<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Episode.php';

class ControleurAccueil extends Controleur
{
    private $episode;

    public function __construct()
    {
        $this->episode = new Episode();
    }

// Affiche la liste de tous les épisodes du blog
    public function index()
    {
        $episodes = $this->episode->getEpisodes();
       
      $this->genererVue(array('episodes' => $episodes));
    }

}
