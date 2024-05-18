<?php



// Fonction qui envoie un mail au consultant pour accéder a sa page

function sendCons($mail,$id){

    consMail($mail,implode(";",$id));
}


?>