<?php
require_once 'ControleurSecurise.php';
require_once 'Modele/Episode.php';
require_once 'Modele/Commentaire.php';


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
            if (strlen($contenu)>15){
                $this->episode->recEpisode($titre, $contenu);
                $this->getFlash()->success('l\'épisode a bien été créé');
            }else{
                $this->getFlash()->warning('15 caractères minimum !');
            }
            $this->rediriger("accueil");
        }
        $this->genererVue(array());
    }

    public function affichAbusif()
    {
        $commentairesAbusifs = $this->commentaire->getCommentairesAbusifs();
        $this->genererVue(['commentairesAbusifs' => $commentairesAbusifs, "nbCommentairesAbusifs" => count($commentairesAbusifs)]);
    }

    public function modifEpisode()
    {
        $id = $this->requete->getParametre("id");
        $titre = $this->requete->getParametre("titre", null);
        $contenu = $this->requete->getParametre("contenu", null);
        $episode = $this->episode->getEpisode($id);
        if ($id && $titre && $contenu && strlen($contenu)>15) {
            $episode['titre'] = $titre;
            $episode['contenu'] = $contenu;
            $this->episode->modEpisode($episode);
            $this->getFlash()->success('l \'épisode a bien été modifié');
            $this->rediriger("accueil");
        }
        $this->genererVue(array('episode' => $episode));
    }

    public function supprEpisode()

    {
        $id = $this->requete->getParametre("id");
        $this->episode->delEpisode($id);
        $this->getFlash()->info('épisode supprimé');
        $this->rediriger("accueil");
    }

    public function supprCommentaire()
    {

        $ids = $this->requete->getParametre("id_del",array());
        $idsOk = $this->requete->getParametre("id_ok",array());

        if (!empty($ids)) {
            $this->commentaire->delCommentaire($ids);
        }

        if (!empty($idsOk)) {
            $this->commentaire->validCommentaire($idsOk);
        }

        $this->getFlash()->success('opération réussie',null,true);
        $this->rediriger("administration/affichAbusif");
    }
}