<?php

// Initialisation : gestion du debug

ini_set("display_errors", true);
error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
session_start();

// Variables global
global $ROOT;
$ROOT = "http://localhost/ChromaDex";

global $PAGE;
$PAGE = "src/templates/pages";

global $FRAG;
$FRAG = "src/templates/fragments";

// Se connecter à la base de données et récupérer un "objet" pour manipuler les données
global $bdd;
$bdd= new PDO("mysql:host=localhost;dbname=shinydex;charset=UTF8", "root", "");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


// charger les fonctions
include_once "lib/fonctions.php";

// charger les classes
include_once "Core/Entity/AbstractEntity.php";
include_once "src/Entity/Auth.php";
include_once "src/Entity/Game.php";
include_once "src/Entity/Method.php";
include_once "src/Entity/Pokeball.php";
include_once "src/Entity/Pokedex.php";
include_once "src/Entity/Pokemon.php";
include_once "src/Entity/User.php";
include_once "src/Entity/Validator.php";



// charger les modules
include_once "modules/module_public.php";
include_once "modules/module_prive.php";