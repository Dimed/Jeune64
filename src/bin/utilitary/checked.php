<?php



//Fonction qui verifie si une checkbox est sauvegardé, si oui retourne "checked"

function checked($value, $array) {
    if (in_array($value, $array)) {
        return "checked";
    }
    return "";
}

?>