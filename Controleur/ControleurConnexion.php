<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Utilisateur.php';

//  Contrôleur gérant la connexion au site

class ControleurConnexion extends Controleur
{
    private $utilisateur;

    public function __construct()
    {
        $this->utilisateur = new Utilisateur();
    }

    public function index()
    {
        $this->genererVue();//index.php de la vue Connexion
    }
    public function connecter()
    {
        if ($this->requete->existeParametre("admin") && $this->requete->existeParametre("pwd"))
        {
            $admin = $this->requete->getParametre("admin");
            $pwd = sha1($this->requete->getParametre("pwd")); //cryptage du mot de passe avant de faire la requête sur la BdD
            if ($this->utilisateur->connecter($admin, $pwd))
            {
                $utilisateur = $this->utilisateur->getUtilisateur($admin, $pwd);
                $this->requete->getSession()->setAttribut("idAdmin", $utilisateur['idAdmin']);
                $this->requete->getSession()->setAttribut("identifiant", $utilisateur['identifiant']);
                $this->rediriger("accueil");
            } 
            else $this->genererVue(array('msgErreur' => 'Identifiant ou mot de passe incorrects', "index"));
            
        }
        else throw new Exception ("Identifiant ou mot de passe incorrects");
    }


    public function deconnecter()
    {
        $this->requete->getSession()->detruire();
        $this->rediriger("accueil");
    }
}