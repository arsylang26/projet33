<?php
require_once 'Framework/Modele.php';

class Commentaire extends Modele
{
    // Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idEpisode,$rang=null)
    {
        $sql = 'SELECT id, DATE_FORMAT(date_commentaire,\'Le %d/%m/%Y à %Hh%i\') AS date, auteur,contenu,rang_commentaire AS rang, parent_commentaire AS parent FROM commentaires WHERE id_episode=?';
        $params=array($idEpisode);
        if (!is_null ($rang)) {
            $sql.=' AND rang_commentaire=?';
            $params[]=$rang;
        }
        $commentaires = $this->executerRequete($sql, $params);
        return $commentaires;
    }
    
 // renvoie le commentaire demandé
    public function getCommentaire($idCommentaire)
    {
        $sql = 'SELECT id, DATE_FORMAT(date_commentaire,\'Le %d/%m/%Y à %Hh%i\') AS date,auteur,contenu,rang_commentaire AS rang, parent_commentaire AS parent FROM commentaires WHERE id=?';
        $commentaire = $this->executerRequete($sql, array($idCommentaire));
        return $commentaire;
    }

    // Ajoute un commentaire dans la BdD
    public function ajouterCommentaire($auteur, $contenu, $idEpisode, $rangCommentaire, $parentCommentaire)
    {
        if ($rangCommentaire <= 3) {
            $sql = 'INSERT INTO commentaires(date_commentaire , auteur, contenu, id_episode, rang_commentaire ,parent_commentaire)'
                . ' VALUES(?, ?, ?, ?, ?, ?)';
            $date = date("Y-m-d H:i:s");  // Récupère la date courante
            $this->executerRequete($sql, array($date, $auteur, $contenu, $idEpisode, $rangCommentaire, $parentCommentaire));
        }
    }

    // Suppression du commentaire et de ses enfants
    public function delCommentaire($idCommentaire)
    {
        $ids = implode(",",array_map('intval',$idCommentaire));
        $sql = 'SELECT COUNT(*) FROM commentaires WHERE id IN(' . $ids . ')';

        $nbSuppr = $this->executerRequete($sql)->fetch();
        $sql = 'SELECT COUNT(*) FROM commentaires WHERE abusif=1';
        $nbTotalAbusif = $this->executerRequete($sql)->fetch();
        $sql = 'DELETE FROM commentaires WHERE id IN(?)';
        $this->executerRequete($sql, array($ids));
        $tab=array($nbSuppr,$nbTotalAbusif);
       return $tab;
    }

    // rend  légitime un commentaire signalé abusif
    public function validCommentaire($idCommentaire)
    {
        $ids= implode(",",array_map('intval',$idCommentaire));
        $sql='UPDATE commentaires SET abusif=0 WHERE id in(?)';
        $this->executerRequete($sql,array($ids));
    }

// Signale un commentaire comme abusif
    public function signCommentaireAbusif($idCommentaire)
    {
        $sql = 'UPDATE commentaires SET abusif=1 WHERE id=?';
        $this->executerRequete($sql, array($idCommentaire));
    }

// renvoie les commentaires signalés comme abusifs
    public function getCommentairesAbusifs()
    {
        $sql = 'SELECT id, date_commentaire AS date, auteur, contenu, rang_commentaire AS rang, parent_commentaire AS parent FROM commentaires WHERE abusif = 1';
        $commentairesAbusifs = $this->executerRequete($sql, array());
        return $commentairesAbusifs->fetchAll();
    }


// renvoie les enfants d'un commentaire  classés par niveau pour l'affichage (le parent du commentaire est le commentaire de rang immédiatement inférieur)
    public function getEnfantCommentaire($idParentCommentaire)
    {
        $sql = 'SELECT id, DATE_FORMAT(date_commentaire,\'Le %d/%m/%Y à %Hh%i\') AS date, auteur, contenu, rang_commentaire AS rang, parent_commentaire AS parent FROM commentaires WHERE parent_commentaire=? ORDER BY rang';
        $enfantCommentaire = $this->executerRequete($sql, array($idParentCommentaire));
        return $enfantCommentaire;
    }
//compte les commentaires
    public function getNbCommentaires()
    {
        $sql = 'SELECT COUNT(*) AS nbCommentaires FROM commentaires';
        $res = $this->executerRequete($sql);
        $ligne = $res->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbCommentaires'];
    }
    
//retourne les derniers $nb commentaires
    public function getDernCommentaires($nb)
    {

        $sql='SELECT contenu FROM commentaires ORDER BY id DESC LIMIT 3';
        $dernCommentaires=$this->executerRequete($sql,array());
        return $dernCommentaires->fetchAll();
    }
}