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
        if ($this->requete->existeParametre("admin") && $this->requete->existeParametre("pwd")) {
            $admin = $this->requete->getParametre("admin");
            $pwd = sha1($this->requete->getParametre("pwd")); //cryptage du mot de passe avant de faire la requête sur la BdD
            if ($this->utilisateur->connecter($admin, $pwd)) {
                $utilisateur = $this->utilisateur->getUtilisateur($admin, $pwd);
                $this->requete->getSession()->setAttribut("idAdmin", $utilisateur['idAdmin']);
                $this->requete->getSession()->setAttribut("admin", $utilisateur['identifiant']);
                $this->rediriger("accueil");
            } else {
                $this->getFlash()->error('identifiant ou mot de passe incorrects',null,true);
                $this->rediriger("connexion");
            }

        } else {
            $this->getFlash()->error('il manque soit l\'identifiant soit le mot de passe',null,true);
            $this->rediriger("connexion");
        }
    }

    public function deconnecter()
    {
        $this->getFlash()->success('vous avez bien été déconnecté');
        $this->requete->getSession()->detruire();

        $this->rediriger("accueil");
    }
}