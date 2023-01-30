<?php

function userMessage($type,$texte){
    $_SESSION["message"][]=["type"=>$type, "content"=>$texte];
}