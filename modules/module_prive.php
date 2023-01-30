<?php

function prive_pageAjout()
{
    global $PAGE;

    // faire la liste des select du formulaire
    $M = new Method();
    $listeM = $M->findAll("ORDER BY `label` ASC");
    $Pball = new Pokeball();
    $listePball = $Pball->findAll("ORDER BY `label` ASC");
    $G = new Game();
    $listeG = $G->findAll("ORDER BY `label` ASC");


    // charger l'utilisateur
    $U = new User($_SESSION["id"]);
    // faire la liste des pokemon de l'utilsateur
    $Pok = new Pokemon();
    $listePok = $Pok->listePokemonUser($U->id());
    include "$PAGE/ajout-modif.php";
}

function prive_ajout()
{
    // faire l'ajout du pokemon
    global $ROOT;
    global $PAGE;
    $Pok = new Pokemon();
    $Pdex = new pokedex();
    $U = new User($_SESSION["id"]);
    $Pok->set("user_id", $_SESSION["id"]);

    // faire la liste des select du formulaire
    $M = new Method();
    $listeM = $M->findAll("ORDER BY `label` ASC");
    $Pball = new Pokeball();
    $listePball = $Pball->findAll("ORDER BY `label` ASC");
    $G = new Game();
    $listeG = $G->findAll("ORDER BY `label` ASC");

    if ($Pdex->loadPokemonByName($_POST["nom"])) {
        $Pok->set("pokedex_id", $Pdex->id());
    } else {
        userMessage("danger", "Nom de pokémon invalide");
        $listePok = $Pok->listePokemonUser($U->id());
        include "$PAGE/ajout-modif.php";
        exit;
    }
    if ($Pok->loadPokUserByName($_SESSION["id"], $_POST["nom"])) {
        userMessage("danger", "Le pokémon existe déjà");
        $listePok = $Pok->listePokemonUser($U->id());
        include "$PAGE/ajout-modif.php";
        exit;
    }
    if (!isset($_POST["nb_rencontre"]) or $_POST["nb_rencontre"] === "" or $_POST["nb_rencontre"] < 0) {
        $Pok->set("nb_rencontre", "Inconnu");
    } else {
        $Pok->set("nb_rencontre", $_POST["nb_rencontre"]);
    }
    $Pok->set("method_id", $_POST["method"]);
    $Pok->set("pokeball_id", $_POST["pokeball"]);
    $Pok->set("game_id", $_POST["game"]);
    $Pok->set("sexe", $_POST["sexe"]);
    if ($_POST["charm"] == 1) {
        $Pok->set("charm", 1);
    } else {
        $Pok->set("charm", 0);
    }
    $Pok->set("date", isset($_POST["date"]) ? $_POST["date"] : NULL);
    $Pok->add();
    userMessage("success", "Le pokemon a bien été ajouté");
    header("location: $ROOT/ajout/");
}

function prive_pageModif($id_pok)
{
    // afficher la page du formulaire de modification du pokemon

    // charger le pokemon avec son id
    $Pokemn = new Pokemon($id_pok);

    // faire la liste des select du formulaire
    $M = new Method();
    $listeM = $M->findAll("ORDER BY `label` ASC");
    $Pball = new Pokeball();
    $listePball = $Pball->findAll("ORDER BY `label` ASC");
    $G = new Game();
    $listeG = $G->findAll("ORDER BY `label` ASC");

    global $PAGE;
    global $FRAG;
    include "$PAGE/formulaire-modif-pok.php";
}

function prive_modif($id_pok)
{
    // faire la modificaction du pokemon

    // charger le pokemon
    $Pok = new Pokemon($id_pok);

    if (!isset($_POST["nb_rencontre"]) or $_POST["nb_rencontre"] === "") {
        $Pok->set("nb_rencontre", "Inconnu");
    } else {
        $Pok->set("nb_rencontre", $_POST["nb_rencontre"]);
    }
    $Pok->set("method_id", $_POST["method"]);
    $Pok->set("pokeball_id", $_POST["pokeball"]);
    $Pok->set("game_id", $_POST["game"]);
    $Pok->set("sexe", $_POST["sexe"]);
    if ($_POST["charm"] == 1) {
        $Pok->set("charm", 1);
    } else {
        $Pok->set("charm", 0);
    }
    if (isset($_POST["date"])) {
        $Pok->set("date", $_POST["date"]);
    }
    $Pok->update($Pok->id());
    userMessage("success", "Le pokemon a bien été modifié");
    global $ROOT;
    header("location: $ROOT/ajout/");
}

function prive_suppr($id_pok)
{
    // faire la suppression du pokemon

    // charger le pokemon
    $Pok = new Pokemon($id_pok);

    $Pok->delete($id_pok);
    global $ROOT;
    userMessage("success", "Le pokemon a bien été supprimé");
    header("location: $ROOT/ajout/");
}
