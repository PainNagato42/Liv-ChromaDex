<?php


function public_inscription() {
    // faire l'inscription
    global $PAGE;
    global $FRAG;
    $U = new User();
    $V = new Validator($U);
    include "$PAGE/formulaire-creation-compte.php";
}

function public_creation() {
    // faire la creation du compte
    $Auth = new Auth();
    $Auth->register();
    global $ROOT;
    header("location: $ROOT/");
}

function public_login() {
    // faire la connexion
    $Auth = new Auth;
    $Auth->login();
    global $ROOT;
    $pseudo = $_SESSION["pseudo"];
    header("location: $ROOT/monDex/");
}

function public_logout() {
    // faire la deconnexion
    $Auth = new Auth();
    $Auth->logout();
    global $ROOT;
    header("location: $ROOT/");
}

function public_myDex() {
    // afficher la page du dex de l'utilisateur

    // faire le compte du pokedex
    $Pdex = new Pokedex();
    $liste = $Pdex->findAll();
    $countPdex = count($liste);

    // charger l'utilisateur
    $U = new User();
    if(!$U->loadUserByPseudo($_SESSION["pseudo"])) {
        // page d'erreur
    }

    // faire la liste des pokemon de l'utilsateur
    $Pok = new Pokemon();
    $listePok = $Pok->listePokemonUser($U->id());
    $countPokUser = count($listePok);
    global $PAGE;
    global $FRAG;
    include "$PAGE/my_dex.php";

}

function public_pageGeneration() {
    // afficher la page des generations de pokemon de l'utilisateur

    // charger l'utilisateur
    $U = new User($_SESSION["id"]);

    // nombre de generations actuelle
    $nbGeneration = 9;

    // faire la liste des pokemon de l'utilisateur par generation
    $Pok = new Pokemon();
    for ($i=1; $i <= $nbGeneration; $i++) { 
        ${"listePokG".$i} = $Pok->listePokemonUserByGeneration($U->id(), $i);
    }

    // faire le compte par generation

    for ($i=1; $i <= $nbGeneration; $i++) { 
        ${"countPokUserG".$i} = count(${"listePokG".$i});
    }

    // faire le compte du pokedex par generation
    $dex = new Pokedex();
    for ($i=1; $i <= $nbGeneration ; $i++) { 
        ${"countPdexG".$i} = $dex->countPokemonByGeneration($i);
    }

    global $PAGE;
    global $FRAG;
    include "$PAGE/generations.php";
}

function public_pageBadges() {
    // afficher la page des badges
    $Pok = new Pokemon();

    // verif des generations completé
    $tabConditionG = ["1 AND 150","152 AND 250","252 AND 384", "387 AND 488", "495 AND 646", "650 AND 718", "722 AND 800 OR`numero` BETWEEN 803 AND 806", "810 AND 905", "906 AND 1008"];
    $tabConditionF = ["0","0","0","0","0", "0","'Alola'","'Galar' AND 'Hisui'","'Paldea'"];

    for ($i=0; $i < count($tabConditionG); $i++) { 
        ${"countG".$i+1} = count($Pok->checkPokemon($_SESSION["id"], "`numero` BETWEEN"." ".$tabConditionG[$i], "OR `forme` = ".$tabConditionF[$i]));
    }

    // verif des légendaires obtenu
    // nombre de badges légendaires actuel
    $tabConditionLeg = ["144 AND 146","243 AND 245","249 AND 250","377 AND 379","380 AND 381","382 AND 384","480 AND 482","483 AND 484 OR `numero` = 487","638 AND 640","641 AND 642 OR `numero` = 645","643 AND 644 OR `numero` = 646","716 AND 718","793 AND 799 OR `numero` BETWEEN 803 AND 806","785 AND 788","791 AND 792 OR `numero` = 800","894 AND 895"];

    for ($i=0; $i < count($tabConditionLeg) ; $i++) { 
        ${"countLeg".$i+1} = count($Pok->checkPokemon($_SESSION["id"], "`numero` BETWEEN"." ".$tabConditionLeg[$i]));
    }

    // verif des starters obtenu
    $tabConditionsStarter = ["1 AND 9","152 AND 160","252 AND 260","387 AND 395","495 AND 503","650 AND 658","722 AND 730","810 AND 818","906 AND 914"];

    for ($i=0; $i < count($tabConditionsStarter) ; $i++) { 
        ${"countStarter".$i+1} = count($Pok->checkPokemon($_SESSION["id"], "`numero` BETWEEN"." ".$tabConditionsStarter[$i]));
    }

    // verif des formes obtenu
    // nombre de formes actuelles
    $tabFormes = ["'Alola'","'Galar'","'Hisui'","'Paldea'"];

    for ($i=0; $i < count($tabFormes) ; $i++) { 
        ${"countForme".$i+1} = count($Pok->checkPokemon($_SESSION["id"], "`forme` =".$tabFormes[$i]));
    }

    // verif des pokemons fabuleux
    // nombre de fabuleux actuel
    $tabFabuleux = ["'Mew'","'Celebi'","'Jirachi'","'Deoxys'","'Phione'","'Manaphy'","'Darkrai'","'Shaymin'","'Arceus'","'Victini'","'Keldeo'","'Meloetta'","'Genesect'","'Diancie'","'Hoopa'","'Volcanion'","'Magearna'","'Marshadow'","'Zoraora'","'Meltan'","'Melmetal'"];

    for ($i=0; $i < count($tabFabuleux) ; $i++) { 
        ${"checkFabuleux".$i+1} = $Pok->loadPokUserByName($_SESSION["id"],$tabFabuleux[$i]);
    }

    global $PAGE;
    global $FRAG;
    include "$PAGE/badges.php";
}

function public_pageStats() {
    // afficher la page des stats

    // faire le compte de pokemon avec le charme chroma de l'utilisateur
    $Pok = new Pokemon();
    $countChroma = $Pok->countCharmChroma($_SESSION["id"]);

    // faire le pourcentage
    // prendre le nombre total de pokemon de l'utilisateur
    $countPok = count($Pok->listePokemonUser($_SESSION["id"]));
    
    $pourcentTrue = round((100 * $countChroma) / $countPok, 0);
    $pourcentFalse = 100 - $pourcentTrue;

    // faire le compte de pokemon male et female de l'utilisateur
    $countMale = $Pok->countSexe($_SESSION["id"], "Male");
    $countFemale = $Pok->countSexe($_SESSION["id"], "Female") ;

    //faire le pourcentage
   $pourcentMale = round((100 * $countMale) / ($countMale + $countFemale), 0);
   $pourcentFemale= round((100 * $countFemale) / ($countMale + $countFemale), 0);
   

    global $PAGE;
    global $FRAG;
    include "$PAGE/statistique.php";

}

function public_test() {
    $dex = new Pokedex();
    $listePok = $dex->findAll();
    global $PAGE;
    global $FRAG;
    include "$PAGE/test.php";
    }

function public_test2() {
    $dex = new Pokedex();
    $listePok = $dex->findAll();
    global $PAGE;
    global $FRAG;
    include "$PAGE/test.php";
    }