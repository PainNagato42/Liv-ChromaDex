<?php

class Pokedex extends AbstractEntity {

    protected $table = "pokedex";
    protected $fields =["id", "numero", "nom", "image"];

    function findBylibelle($name) {
        // Rôle: rechercher les pokemon par nom
        // parametre: $libelle contenu saisie
        global $bdd;
        $sql = "SELECT * FROM $this->table WHERE `nom` LIKE :nom LIMIT 5";
        $req = $bdd->prepare($sql);
        $results=[];
        if(!$req->execute([":nom"=>$name."%"])){
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

      public function loadPokemonByName($name)
    {
        // charger le pokemon par son nom
        global $bdd;
        $sql = "SELECT * FROM `$this->table` WHERE `nom` = :nom";
        $req = $bdd->prepare($sql);
        if(!$req->execute([":nom" => $name])) {
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

    public function countPokemonByGeneration($generation) {
        global $bdd;
        $sql = "SELECT * FROM $this->table WHERE `generation` = $generation";
        $req = $bdd->prepare($sql);
        $results=[];
        if(!$req->execute()){
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

        return count($results);
    }
}

// $data = file_get_contents("pokedex.json");
// $obj = json_decode($data);
// foreach($obj as $index => $pok){
//    $Pdex = new Pokedex();
//    $Pdex->set("numero", $pok->id);
//    $Pdex->set("nom", $pok->name->french);
//    $Pdex->set("image", $pok->id . "_" . $pok->name->french . ".gif");
//    $Pdex->add();

// }