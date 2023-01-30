<?php

class Validator{
    public $champsAValider;

    public function __construct($objet){
        // je recupere le tabelau des champs à valider
         $this->champsAValider = $objet->validation;
    }

    protected $errors = [];
    /**
    * Get the value of errors
    */ 
    public function getErrors()
    {
       return $this->errors;
    }

    public function analyse() {
        // Rôle : Vérifier le POST envoyer
        foreach($_POST as $index=>$value) {
            if(isset($this->champsAValider[$index])){
                // Vérifier si le champ est requis
                if(isset($this->champsAValider[$index]["required"]) AND $this->champsAValider[$index]["required"]===true){
                     $this->testRequired($index);
                }
 
                // Vérifier si j'ai une longueur maximum
                if(isset($this->champsAValider[$index]["maxlength"])){
                    $this->testMaxLength($index);
                }
                // Je teste les types de données : 
                // methode : test_type
                $nomdeMethode = "test_".$this->champsAValider[$index]["type"];
 
                if(method_exists($this,$nomdeMethode)){
                    $this->$nomdeMethode($index);
                }
            }
        }
 
    }
 
 
    public function testRequired($key){
        if(empty($_POST[$key])){
           $this->errors[$key][]="Le champs est obligatoire"; 
        }
    }
 
    public function testMaxLength($key){
        if(strlen($_POST[$key]) > $this->champsAValider[$key]['maxlength']){
            $this->errors[$key][] = "Le pseuso est trop long";
        }
    }

    public function test_pseudo($key){
        // verification du pseudo
        $reg = "/<script>/";
        if(preg_match($reg,$_POST[$key])==true){
                $this->errors[$key][] = "Le format du pseudo est incorrect";
        }
    }
 
    public function test_email($key){
         // teste si la donnée a un format d'email
         if(!filter_var($_POST[$key],FILTER_VALIDATE_EMAIL)){
             $this->errors[$key][] = "Le format de l'adresse mail est incorrect";
         }
    }

    public function test_password($key){
        // verification du mot de passe
        $reg = "/<script>/";
        if(preg_match($reg,$_POST[$key])==true){
                $this->errors[$key][] = "Le format du mot de passe est incorrect";
        }
    }
    
}