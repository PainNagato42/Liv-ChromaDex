<?php

class Pokemon extends AbstractEntity
{

    protected $table = "pokemon";
    protected $target = ["user_id" => "user", "pokedex_id" => "pokedex", "method_id" => "method", "pokeball_id" => "pokeball", "game_id" => "game"];
    protected $fields = ["id", "user_id", "pokedex_id", "nb_rencontre", "method_id", "pokeball_id", "game_id", "sexe", "charm", "date"];


    public function listePokemonUser($id_user)
    {
        // recuperer la liste des pokemon de l'utilisateur
        // parametre : $id_user : l'id de l'utilsateur

        global $bdd;
        $sql = "SELECT
        `pokemon` . `id` AS id,
        `pokemon` . `user_id` AS user_id,
        `pokemon` . `pokedex_id` AS pokedex_id,
        `pokemon` . `nb_rencontre` AS nb_rencontre,
        `pokemon` . `method_id` AS method_id,
        `pokemon` . `pokeball_id` AS pokeball_id,
        `pokemon` . `game_id` AS game_id,
        `pokemon` . `sexe` AS sexe,
        `pokemon` . `charm` AS charm,
        `pokemon` . `date` AS 'date',
        `pokedex` . `numero` AS numero,
        `pokedex` . `nom` AS nom,
        `pokedex` . `image` AS 'image'
       FROM pokemon
       LEFT JOIN pokedex ON pokemon.`pokedex_id`=pokedex.`id`
       WHERE `user_id`= :userId
       ORDER BY `pokedex`.`numero` ASC";
        $req = $bdd->prepare($sql);
        $results = [];
        if (!$req->execute([":userId" => $id_user])) {
            return false;
        } else {
            while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
                $class = get_class($this);
                $objet = new $class();
                if ($ligne != false) {
                    $objet->values = $ligne;
                    $results[] = $objet;
                }
            }
        }

        return $results;
    }

    public function listePokemonUserByGeneration($id_user, $generation)
    {
        // recuperer la liste des pokemon de l'utilisateur par generation
        // parametre : $id_user : l'id de l'utilsateur
                    // $generation : la generation choisi
                    
        global $bdd;
        $sql = "SELECT
        `pokemon` . `id` AS id,
        `pokemon` . `user_id` AS user_id,
        `pokemon` . `pokedex_id` AS pokedex_id,
        `pokemon` . `nb_rencontre` AS nb_rencontre,
        `pokemon` . `method_id` AS method_id,
        `pokemon` . `pokeball_id` AS pokeball_id,
        `pokemon` . `game_id` AS game_id,
        `pokemon` . `sexe` AS sexe,
        `pokemon` . `charm` AS charm,
        `pokemon` . `date` AS 'date',
        `pokedex` . `numero` AS numero,
        `pokedex` . `nom` AS nom,
        `pokedex` . `generation` AS generation,
        `pokedex` . `image` AS 'image'
       FROM `$this->table`
       LEFT JOIN pokedex ON pokemon.`pokedex_id`=pokedex.`id`
       WHERE `user_id`= :userId AND `generation` = :generation
       ORDER BY `pokedex`.`numero` ASC";
        $req = $bdd->prepare($sql);
        $results = [];
        if (!$req->execute([":userId" => $id_user , ":generation" => $generation])) {
            return false;
        } else {
            while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
                $class = get_class($this);
                $objet = new $class();
                if ($ligne != false) {
                    $objet->values = $ligne;
                    $results[] = $objet;
                }
            }
        }

        return $results;
    }

    public function loadPokUserByName($user_id, $namePok) {

        // charger le pokemon par son nom et l'id de lutilisateur
        global $bdd;
        $sql = "SELECT
        `pokedex` . `nom` AS nom
         FROM `$this->table` 
         LEFT JOIN pokedex ON pokemon.`pokedex_id`=pokedex.`id`
         WHERE `user_id`= :userId AND `nom` = :namePok";
        $req = $bdd->prepare($sql);
        if(!$req->execute([":userId" => $user_id, ":namePok" => $namePok])) {
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

    public function checkPokemon($user_id, $numPok, $numForme = NULL) {

        global $bdd;
        $sql = "SELECT
        `pokedex` . `numero` AS numero,
        `pokedex` . `forme` AS forme
       FROM `$this->table`
       LEFT JOIN pokedex ON pokemon.`pokedex_id`=pokedex.`id`
       WHERE `user_id`= :userId AND $numPok $numForme
       ORDER BY `pokedex`.`numero` ASC";
       $req = $bdd->prepare($sql);
       if(!$req->execute([":userId" => $user_id])) {
           return false;
        } else {
            while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
                $class = get_class($this);
                $objet = new $class();
                if ($ligne != false) {
                    $objet->values = $ligne;
                    $results[] = $objet;
                }
            }
        }
        if(!isset($results)) {
            $results = [];
        }
        return $results;
    }
    public function countCharmChroma($user_id) {

        global $bdd;
        $sql = "SELECT * FROM `$this->table`
       WHERE `user_id`= :userId AND `charm` = true";
       $req = $bdd->prepare($sql);
       if(!$req->execute([":userId" => $user_id])) {
           return false;
        } else {
            while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
                $class = get_class($this);
                $objet = new $class();
                if ($ligne != false) {
                    $objet->values = $ligne;
                    $results[] = $objet;
                }
            }
        }

        return count($results);
    }

    public function countSexe($user_id, $sexe) {

        global $bdd;
        $sql = "SELECT * FROM `$this->table`
       WHERE `user_id` = :userId AND `sexe` = '$sexe'";
       $req = $bdd->prepare($sql);
       if(!$req->execute([":userId" => $user_id])) {
           return false;
        } else {
            while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
                $class = get_class($this);
                $objet = new $class();
                if ($ligne != false) {
                    $objet->values = $ligne;
                    $results[] = $objet;
                }
            }
        }

        return count($results);
    }


    public function recherchePokemon($id_user,$recherche)
    {
        // recuperer la liste des pokemon de l'utilisateur rechercher
        // parametre : $id_user : l'id de l'utilsateur
                    // $recherche: les lettres saisies

        global $bdd;
        $sql = "SELECT
        `pokemon` . `id` AS id,
        `pokemon` . `user_id` AS user_id,
        `pokemon` . `pokedex_id` AS pokedex_id,
        `pokemon` . `nb_rencontre` AS nb_rencontre,
        `pokemon` . `method_id` AS method_id,
        `pokemon` . `pokeball_id` AS pokeball_id,
        `pokemon` . `game_id` AS game_id,
        `pokemon` . `sexe` AS sexe,
        `pokemon` . `charm` AS charm,
        `pokemon` . `date` AS 'date',
        `pokedex` . `numero` AS numero,
        `pokedex` . `nom` AS nom,
        `pokedex` . `image` AS 'image'
       FROM pokemon
       LEFT JOIN pokedex ON pokemon.`pokedex_id`=pokedex.`id`
       WHERE `user_id`= :userId AND `nom` LIKE :recherche
       ORDER BY `pokedex`.`numero` ASC";
        $req = $bdd->prepare($sql);
        $results = [];
        if (!$req->execute([":userId" => $id_user, ":recherche" => "$recherche"."%"])) {
            return false;
        } else {
            while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
                $class = get_class($this);
                $objet = new $class();
                if ($ligne != false) {
                    $objet->values = $ligne;
                    $results[] = $objet;
                }
            }
        }

        return $results;
    }

}


