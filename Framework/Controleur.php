<?php
require_once 'FlashMessages.php';
require_once 'Requete.php';
require_once 'Vue.php';


/**
 * Classe abstraite Controleur
 * Fournit des services communs aux classes Controleur dérivées
 *
 * @version 1.0
 * @author Baptiste Pesquet
 */
abstract class Controleur
{
    /** Requête entrante
     * var Requete
     */
    protected $requete;
    private $flash; // le message flash
    /** Action à réaliser */
    private $action;
    /**
     * Définit la requête entrante
     *
     * @param Requete $requete Requete entrante
     */
    public function setRequete(Requete $requete)
    {
        $this->requete = $requete;
    }

    /**
     * Exécute l'action à réaliser.
     * Appelle la méthode portant le même nom que l'action sur l'objet Controleur courant
     *
     * @throws Exception Si l'action n'existe pas dans la classe Controleur courante
     */
    public function executerAction($action)
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        } else {
            $classeControleur = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $classeControleur");
        }
    }

    /**
     * Méthode abstraite correspondant à l'action par défaut
     * Oblige les classes dérivées à implémenter cette action par défaut
     */
    public abstract function index();

    /**
     * Génère la vue associée au contrôleur courant
     *
     * @param array $donneesVue Données nécessaires pour la génération de la vue
     */
    protected function genererVue($donneesVue = array(), $action = null)
    {
        // Utilisation de l'action actuelle par défaut
        $actionVue = $this->action;
        if ($action != null) {
            // Utilisation de l'action passée en paramètre
            $actionVue = $action;
        }
        // Utilisation du nom du contrôleur actuel
        $classeControleur = get_class($this);
        $controleurVue = str_replace("Controleur", "", $classeControleur);

        // Instanciation et génération de la vue
        $vue = new Vue($actionVue, $controleurVue);
        $vue->generer($donneesVue, $this->getFlash());
    }
 //  si pas de flash en cours
    public function getFlash()
    {
        if (!$this->flash) {
            $this->flash = new \FlashMessages\FlashMessages();
        }
        return ($this->flash);
    }

    /**
     * Effectue une redirection vers un contrôleur et une action spécifiques
     *
     * @param string $controleur Contrôleur
     * @param type $action Action Action
     */
    protected function rediriger($controleur, $action = null)
    {
        $racineWeb = Configuration::get("racineWeb", "/");
        // Redirection vers l'URL /racine_site/controleur/action
        header("Location:" . $racineWeb . $controleur . "/" . $action);
    }

}
