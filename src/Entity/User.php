<?php

class User extends AbstractEntity
{

    protected $table = "user";
    protected $fields = ["id", "pseudo", "email", "mdp"];
    public $validation = ["pseudo" => ["required" => true, "type" => "pseudo", "maxlength" => 30], "email" => ["required" => true, "type" => "email"], "mdp" => ["required" => true, "type" => "password"]];

    public function loadUserByEmail($email)
    {
        // charger l'utilisateur par son mail 
        global $bdd;

        $sql = "SELECT * FROM `$this->table` WHERE `email` = :email";

        $req = $bdd->prepare($sql);

        if(!$req->execute([":email" => $email])) {
            return false;
        } else {
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            if(empty($ligne)) {
                return false;
            }
            $this->values = $ligne;
            return true;
        }
    }

    public function loadUserByPseudo($pseudo)
    {
        // charger l'utilisateur par son mail
        global $bdd;

        $sql = "SELECT * FROM `$this->table` WHERE `pseudo` = :pseudo";

        $req = $bdd->prepare($sql);

        if(!$req->execute([":pseudo" => $pseudo])) {
            return false;
        } else {
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            if(empty($ligne)) {
                return false;
            }
            $this->values = $ligne;
            return true;
        }
    }
}
