<?php

require_once 'Framework/Modele.php';
/**
 * Modélise un utilisateur du blog

 */
class Utilisateur extends Modele {
    /**
     * Vérifie qu'un utilisateur existe dans la BD
     *
     * @param string $admin Le login
     * @param string $pwd Le mot de passe
     * @return boolean Vrai si l'utilisateur existe, faux sinon
     */
    public function connecter($admin, $pwd)
    {
        $sql = "SELECT id FROM administration WHERE identifiant=? AND pwd=?";
        $utilisateur = $this->executerRequete($sql, array($admin, $pwd));
        return ($utilisateur->rowCount() == 1);
    }
    /**
     * Renvoie un utilisateur existant dans la BD
     *
     * @param string $admin Le login
     * @param string $mpwd Le mot de passe
     * @return mixed L'utilisateur
     * @throws Exception Si aucun utilisateur ne correspond aux paramètres
     */
    public function getUtilisateur($admin, $pwd)
    {
        $sql = "SELECT id AS idAdmin, identifiant , pwd  FROM administration WHERE identifiant=? and pwd=?";
        $utilisateur = $this->executerRequete($sql, array($admin, $pwd));
        if ($utilisateur->rowCount() == 1)
            return $utilisateur->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
    }
}