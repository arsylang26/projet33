<?php
require_once 'Framework/Modele.php';
class Episode extends Modele
{
// Renvoie la liste de l'ensemble des épisodes
    public function getEpisodes()
    {
        $sql = 'SELECT id, DATE_FORMAT(date_episode,\'le %d/%m/%Y à %Hh%i\') AS date, titre, contenu FROM episodes ORDER BY id DESC';
        $episodes = $this->executerRequete($sql);
        return $episodes;
    }
    
// CRUD
    
// Renvoie les informations sur un épisode
    public function getEpisode($idEpisode)
    {
        $sql = 'SELECT id, DATE_FORMAT(date_episode,\'le %d/%m/%Y à %Hh%i\') AS date, titre, contenu FROM episodes  WHERE id=?';
        $episode = $this->executerRequete($sql, array($idEpisode));
        if ($episode->rowCount() == 1)
        {
            
            return $episode->fetch(); // Accès à la première ligne de résultat
        }

        else 
            throw new Exception("Aucun épisode ne correspond à l'identifiant '$idEpisode'");
    }
    
// Enregistre un épisode
    public function recEpisode($titre, $contenu)
   {
        $sql = 'INSERT INTO episodes(date_episode,titre, contenu) VALUES(?, ?, ?)';
        $date =  date("Y-m-d H:i:s");  // Récupère la date courante
        $this->executerRequete($sql, array($date, $titre, $contenu));
    }
// Efface un épisode
    public function delEpisode($idEpisode)
    {
        $sql= 'DELETE FROM episodes WHERE id=?';
        $this->executerRequete($sql,array($idEpisode));
    }
// Mettre à jour un épisode
    public function modEpisode($episode)
    {
        $sql = 'UPDATE episodes SET titre=? , contenu=? WHERE id=?';
        $this->executerRequete($sql, array($episode['titre'], $episode['contenu'], $episode['id']));
    }
    //retourne le nombre total d'épisodes enregistrés
    public function getNbEpisodes()
    {
        $sql = 'SELECT count(*) AS nbEpisodes FROM episode';
        $res = $this->executerRequete($sql);
        $ligne = $res->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbEpisodes'];
    }


}