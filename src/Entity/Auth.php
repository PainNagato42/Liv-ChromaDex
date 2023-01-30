<?php

class Auth extends AbstractEntity
{

    public function login()
    {
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";

        $U = new User();
        global $PAGE;
        // verifier le mail
        if (!$U->loadUserByEmail($email)) {
            // message d'erreur
            $error_email = "Votre email est incorrect";
            include "$PAGE/form-connexion.php";
            exit;
        }

        // verifier le mdp si j'ai trouver l'utilisateur
        if (!password_verify($mdp, $U->get("mdp"))) {
            // message d'erreur
            $error_mdp = "Votre mot de passe est incorrect";
            include "$PAGE/form-connexion.php";
            exit;
        }
        $this->session($U);
    }

    public function session($User)
    {

        // dire à la session que l'utilisateur est connecté
        $_SESSION["connected"] = true;
        // mettre l'id de l'utilisateur
        $_SESSION["id"] = $User->id();
        // mettre le pseudo de l'utilisateur
        $_SESSION["pseudo"] = $User->get("pseudo");
    }

    public function connected()
    {
        if (isset($_SESSION["connected"]) and $_SESSION["connected"] === true) {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        // vide la session et la detruire
        $_SESSION = [];
        session_destroy();
        global $ROOT;
        header("Location: $ROOT/");
    }

    public function register()
    {
        $U = new User();
        $V = new Validator($U);

        $V->analyse();

        if (!empty($V->getErrors())) {
            // reaffiche le formulaire
            global $PAGE;
            include "$PAGE/formulaire-creation-compte.php";
            exit;
        }

        // Si pas d'erreur
        // verifier si le mail n'existe pas
        if (!$U->findByOneField("email", $_POST["email"])) {

            // donner les informations saisie

            // hasher le mot de passe
            $mdp = password_hash(isset($_POST["mdp"]) ? $_POST["mdp"] : "", PASSWORD_DEFAULT);

            $U->set("pseudo", $_POST["pseudo"]);
            $U->set("email", $_POST["email"]);
            $U->set("mdp", $mdp);

            $U->add();
        }
        userMessage("success", "Votre compte a bien été crée, vous pouvez dès maintenant vous connecter");
    }
}
