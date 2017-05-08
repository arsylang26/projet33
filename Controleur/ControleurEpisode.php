<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/Episode.php';


class ControleurEpisode extends Controleur
{
    private $episode;
    private $commentaire;

    public function __construct()
    {
        $this->episode = new Episode();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un épisode
    public function index()
    {
        $idEpisode = $this->requete->getParametre("id");
        $episode = $this->episode->getEpisode($idEpisode);
        $commentaires = $this->commentaire->getCommentaires($idEpisode, 0);

        $this->genererVue(array('episode' => $episode, 'commentaires' => $commentaires, 'modeleCommentaire' => $this->commentaire));

    }
    
    // Commenter un épisode ou un commentaire
    public function commenter()
    {
        $auteur = $this->requete->getParametre("auteur");
        $idEpisode = $this->requete->getParametre("id");
        $contenu = $this->requete->getParametre("contenu");
        $parentCommentaire = $this->requete->getParametre("parent",null);
        try {
            if (!$parentCommentaire) { //s'il était null alors
                $rangCommentaire = 0; // c'est le commentaire de l'épisode
            } else {                  // sinon c'est un commentaire de commentaire
                $parent = $this->commentaire->getCommentaire($parentCommentaire)->fetch(); //on va chercher le parent
                if ($parent && $parent['rang'] < 3) {     // s'il existe, on définit le rang du commentaire comme futur parent
                    $rangCommentaire = $parent['rang'] + 1;
                } else {
                    throw new exception ("erreur dans le rang du commentaire");
                }
            }
        } catch
        (Exception $e) {
            $this->erreur($e->getMessage());
        }
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idEpisode, $rangCommentaire, $parentCommentaire);
        $this->rediriger("episode" . $idEpisode);
    }
    
    // marquer comme abusif un commentaire
    public function signalerAbusif()
    {
        $idEpisode = $this->requete->getParametre("id_episode");
        $idCommentaire = $this->requete->getParametre("id");
        $this->commentaire->signCommentaireAbusif($idCommentaire);
        $this->rediriger("episode" . $idEpisode);
    }

    // gére les messages d'erreur
    public function erreur()
    {
        $msgErreur = $this->requete->getParametre(); // à voir
        $this->genererVue(array('msgErreur' => $msgErreur));
    }

    
  
}
    