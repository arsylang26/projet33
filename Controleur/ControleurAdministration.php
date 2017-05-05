<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Episode.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/Administration.php';

require_once 'Controleur/ControleurEpisode.php';

class ControleurAdministration extends Controleur
{
    private $episode;
    private $commentaire;
    private $admin;


    public function __construct()
    {
        $this->episode = new Episode();
        $this->commentaire = new Commentaire();
        $this->admin = new Administration();
    }

    public function index()
    {
        $this->genererVue(array('administration'));
    }

    public function creerEpisode()
    {
        $titre = $this->requete->getParametre("titre",null);
        $contenu = $this->requete->getParametre("contenu",null);
        if ($titre && $contenu) {

            $this->episode->recEpisode($titre, $contenu);
          $this->rediriger("accueil");

        }
        $this->genererVue(array());
    }

    public function affichAbusif()
    {
        $commentairesAbusifs = $this->commentaire->getCommentairesAbusifs();
        $this->genererVue(['commentairesAbusifs' => $commentairesAbusifs]);
    }

    public function modifEpisode()
    {
        $id = $this->requete->getParametre("id");
        $titre = $this->requete->getParametre("titre",null);
        $contenu = $this->requete->getParametre("contenu",null);
        $episode = $this->episode->getEpisode($id);
        if ($id && $titre && $contenu) {
            $episode['titre'] = $titre;
            $episode['contenu'] = $contenu;
            $this->episode->modEpisode($episode);
            $this->rediriger("accueil");
        }
        $this->genererVue(array('episode' => $episode));
    }

    public function supprEpisode()

    {
        $id = $this->requete->getParametre("id");
        $supprEpisode = $this->episode->delEpisode($id);
     $this->rediriger("accueil");
    }

    public function supprCommentaire()
    {
        $ids = $this->requete->getParametre("id_del");
        $commentaireAbusif = $this->commentaire->delCommentaire($ids);
        $this->rediriger("administration/affichAbusif");
    }

    public function connexion()
    {
        $admin = $this->requete->getParametre("admin");
        $pwd = $this->requete->getParametre("pwd");
        if (isset($admin) && isset($pwd)) {
            $pass = sha1($pwd); //cryptage du mot de passe avant de faire la requête sur la BdD
            $idAdmin = $this->admin->getIdAdmin($admin, $pass)->fetch();
            if ($idAdmin) {// si identifiant /pwd ok on ouvre la session admin
                $_SESSION['admin'] = $admin;

                $this->rediriger("accueil");
            } else {// sinon, retour à l'authentification
                $this->rediriger("administration");
            }
        }
    }

    public function deconnexion()
    {
        session_destroy();
        $this->rediriger("accueil");
    }


}