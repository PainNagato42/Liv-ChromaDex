<?php

class AbstractEntity {
    
    protected $table;
    protected $fields = [];
    protected $target = [];
    protected $values= [];
    protected $validation= [];

    public function __construct($id = null)
    {
        if(!empty($id)) {
           $this->loadById($id);
        }
    }


    public function set($field,$val){
        $this->values[$field] = $val;
        return $this;
    }

    public function get($field, $canBeHtml = false) {
        if(isset($this->values[$field])) {
            if($canBeHtml === false) {
                return htmlentities($this->values[$field]);
            } else {
                return $this->values[$field];
            }  
        } else {
          return "";  
        }
        
    }
    
    public function id() {
        // Rôle : récuperer l'id de l'objet courant
        // Pararmetre : néant
        // Retour : id

        return $this->get("id");
    }

    function getTarget($nom) {
        // Rôle : retourner l'objet pointé par un champs de type LINK
        // Retour : un objet (un objet d'une des classes héritées)
        // paramètres: 
        //      $nom: nom du champs à "suivre"
        // SI ce n'est pas un lien
        if (!isset($this->target[$nom]) or !$this->target[$nom]) {
            // On retourne un objet un objet neutre
            return new AbstractEntity();   // On pourrait aussi décider de retourner null
        }

        // C'est un lien, on va donc chercher l'objet pointé (chargé si il est valorisé)
        $classe = $this->target[$nom];
        return new $classe($this->get($nom));
    }

    public function findAll($order = null)
    {
        global $bdd;
        $sql = "SELECT * FROM $this->table $order";
        $req = $bdd->prepare($sql);
        $results=[];
        if(!$req->execute()){
           return false;
        }else{
            while($ligne =$req->fetch(PDO::FETCH_ASSOC)){
                    $class = get_class($this);
                    $objet = new $class();
                    if($ligne !=false){
                        $objet->values = $ligne;
                        $results[]= $objet;
                    }
            } 
        }
        return $results;
    }

    function loadById($id) {
        // Rôle: charger l'objet courant depuis la base de données (en connaisant la clé primaire
        // REtour : true si on a trouvé, false sinon
        // Paramètre :
        //      $id : valeur de l'id de l'utilisateur recherché
        // Construire la requête sql et ses paramètres
        global $bdd;
        $sql = "SELECT * FROM `$this->table` WHERE `id` = :id";

        $req = $bdd->prepare($sql);

        if(!$req->execute([":id" => $id])) {
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

    public function findById($id){
        global $bdd;
        $sql="SELECT * FROM $this->table WHERE id=:id";
        $req = $bdd->prepare($sql);
        if(!$req->execute([":id"=>$id])){
            return false;
        }else{
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
                $class = get_class($this);
                $objet = new $class();
                if($ligne !=false){
                    $objet->values = $ligne;
                
                return $objet;
            }else{
                
                return false;
            }
        }
    }

    public function findByOneField($field,$value){
        global $bdd;
        $sql="SELECT * FROM $this->table WHERE `$field`=:alias";
        $req = $bdd->prepare($sql);
        $results=[];
        if(!$req->execute([":alias"=>$value])){
            return false;
        }else{
            while($ligne = $req->fetch(PDO::FETCH_ASSOC)){
                    $class = get_class($this);
                    $objet = new $class();
                    if($ligne !=false){
                        $objet->values = $ligne;
                        $results[]= $objet;
                    }
            }
        }

        return $results;
    }

    public function add() {
        global $bdd;
        $sql ="INSERT INTO $this->table SET ";

        $sql_alias_tab=[];
        $sql_params= [];
        foreach($this->values as $key=>$value){
            if($key != "id"){
                $sql_alias_tab[] = "$key=:$key";
                $sql_params[":$key"]=$value;  
            }
            
        }
        $sql_alias_str = implode(", ",$sql_alias_tab);
        $sql .= $sql_alias_str;
        
        
        $req = $bdd->prepare($sql);
        if(!$req->execute($sql_params)){
            return false;
        }else{
            return true;
        }
    }

    public function update($id){
        global $bdd;
        $sql ="UPDATE $this->table SET ";

        $sql_alias_tab=[];
        $sql_params= [];
        foreach($this->values as $key=>$value){
            if($key != "id"){
                $sql_alias_tab[] = "$key=:$key";
                $sql_params[":$key"]=$value;
            }
        }
        $sql_params[":id"]=$id;
        $sql_alias_str = implode(", ",$sql_alias_tab);
        $sql .= $sql_alias_str." WHERE id=:id";
        
        
        $req = $bdd->prepare($sql);
        if(!$req->execute($sql_params)){
            return false;
        }else{
            return true;
        }
    }

    public function delete($id){
        global $bdd;
        $sql="DELETE FROM $this->table WHERE id=:id";
        $req= $bdd->prepare($sql);
        if(!$req->execute([":id"=>$id])){
            return false;
        }else{
            return true;
        }
    }
}