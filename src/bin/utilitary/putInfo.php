<?php



//Fonction qui prend un fichier et retourne ses information dans un tableau qui contient en chaque element une de ces lignes

function putInfo($file){
    return file($file, FILE_IGNORE_NEW_LINES);
}

?>