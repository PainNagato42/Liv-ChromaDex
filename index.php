<?php
include "lib/init.php";
global $ROOT;
global $PAGE;
global $FRAG;
if (isset($_GET["action"])) {
    if ($_GET["action"] === "inscription") {
        // afficher la page du formulaire de creation du compte
        public_inscription();
    }
    if ($_GET["action"] === "creation") {
        public_creation();
    }
    if ($_GET["action"] === "connexion") {
        // afficher la page du formulaire de connexion
        include "$PAGE/form-connexion.php";
    }
    if ($_GET["action"] === "connecte") {
        public_login();
    }
    if ($_GET["action"] === "deconnexion") {
        public_logout();
    }
    if ($_GET["action"] === "monDex") {
        // afficher la page du formulaire de connexion
        public_myDex();
    }
    if ($_GET["action"] === "generation") {
        // afficher la page des generations
        public_pageGeneration();
    }
    if ($_GET["action"] === "badges") {
        // afficher la page des badges
        public_pageBadges();
    }
    if ($_GET["action"] === "stats") {
        // afficher la page des stats
        public_pageStats();
    }
    if ($_GET["action"] === "ajout") {
        if (isset($_SESSION["connected"]) or $_SESSION["connected"] === true) {
            prive_pageAjout();
        } else {
            header("location: $ROOT/connexion/");
        }
    }
    if ($_GET["action"] === "traitement_ajout") {
        prive_ajout();
    }
    if ($_GET["action"] === "modif") {
        if (isset($_SESSION["connected"]) or $_SESSION["connected"] === true) {
            if (!empty($_SERVER["HTTP_REFERER"]) && $_SERVER["HTTP_REFERER"] == 'http://localhost/ChromaDex/ajout/') {
                prive_pageModif($_GET["id"]);
            } else {
                userMessage("danger", "L'ACCES AUX MODIFCATION PAR L'URL N'EST PAS AUTORISER");
                header("location: $ROOT/ajout/");
            }
        } else {
            header("location: $ROOT/connexion/");
        }
    }
    if ($_GET["action"] === "traitement_modif") {
        if (isset($_SESSION["connected"]) or $_SESSION["connected"] === true) {
            prive_modif($_GET["id"]);
        } else {
            header("location: $ROOT/connexion/");
        }
    }
    if ($_GET["action"] === "traitement_suppr") {
        if (isset($_SESSION["connected"]) or $_SESSION["connected"] === true) {
            prive_suppr($_GET["id"]);
        } else {
            header("location: $ROOT/connexion/");
        }
    }
    if ($_GET["action"] === "ajax_namePok") {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $Pdex = new Pokedex();
            $liste = $Pdex->findBylibelle($_POST["pokemon"]);
            include "$FRAG/pokemon.php";
        }
    }
    if ($_GET["action"] === "ajax_checkBox") {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            include "$FRAG/checkBox.php";
        }
    }
    if ($_GET["action"] === "ajax_recherche") {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $Pok = new Pokemon();
            $listePok = $Pok->recherchePokemon($_SESSION["id"],$_POST["recherche"]);
            include "$FRAG/recherche_modif.php";
        }
    }
} else {
    /// exemple afficher la page d'accueil
    include "$PAGE/home.php";
}
