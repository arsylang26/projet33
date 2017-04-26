<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Commentaire.php';
require_once 'modele/Episode.php';


class ControleurEpisode extends Controleur
    {
    private $episode;
    private $commentaire;

    public function __construct()
    {
        $this->episode= new Episode();
        $this->commentaire = new Commentaire();
    }
    // Affiche les détails sur un épisode
    public function index() 
    {
        $idEpisode=$this->requete->getParametre("id");
        $episode = $this->episode->getEpisode($idEpisode);
        $commentaires = $this->commentaire->getCommentaires($idEpisode,0);
       
       $this->genererVue(array('episode' => $episode, 'commentaires' => $commentaires, 'modeleCommentaire'=>$this->commentaire));

    }

    public function commenter()
    {
        $auteur=$this->requete->getParametre("auteur");
        $idEpisode=$this->requete->getParametre("id_Episode");
        $contenu=$this->requete->getParametre("contenu");
        $parentCommentaire=$this->requete->getParametre("parent")=null;
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
       header("location:/Episode/index/".$idEpisode);
    }
}
