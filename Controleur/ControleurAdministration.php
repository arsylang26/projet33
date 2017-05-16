<?php
require_once 'ControleurSecurise.php';
require_once 'Modele/Episode.php';
require_once 'Modele/Commentaire.php';

//require_once 'Controleur/ControleurEpisode.php';

class ControleurAdministration extends ControleurSecurise
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
        $this->genererVue(array('administration'));
    }

    public function creerEpisode()
    {
        $titre = $this->requete->getParametre("titre", null);
        $contenu = $this->requete->getParametre("contenu", null);
        if ($titre && $contenu) {

            $this->episode->recEpisode($titre, $contenu);
            $this-> $msg->success("l'épisode a bien été créé");
            $this->$msg->display();
            $this->rediriger("accueil");

        }
        $this->genererVue(array());
    }

    public function affichAbusif()
    {
        $commentairesAbusifs = $this->commentaire->getCommentairesAbusifs();
        $this->genererVue(['commentairesAbusifs' => $commentairesAbusifs,"nbCommentairesAbusifs"=>count($commentairesAbusifs)]);
    }

    public function modifEpisode()
    {
        $id = $this->requete->getParametre("id");
        $titre = $this->requete->getParametre("titre", null);
        $contenu = $this->requete->getParametre("contenu", null);
        $episode = $this->episode->getEpisode($id);
        if ($id && $titre && $contenu) {
            $episode['titre'] = $titre;
            $episode['contenu'] = $contenu;
            $this->episode->modEpisode($episode);
            $msg->success("l'épisode a bien été modifié");
            $msg->display();
            $this->rediriger("accueil");
        }
        $this->genererVue(array('episode' => $episode));
    }

    public function supprEpisode()

    {
        $id = $this->requete->getParametre("id");
      $this->episode->delEpisode($id);
        $this->rediriger("accueil");
    }

    public function supprCommentaire()
    {
        $ids = $this->requete->getParametre("id_del");
        //$idsOK = $this->requete->getParametre("id_OK");
        $this->commentaire->delCommentaire($ids);
        $this->rediriger("administration/affichAbusif");
    }




}