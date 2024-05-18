<?php



// Fonction qui envoie un mail au jeune
function valMail($mail,$mail2){

    $object='Validation de reference';
    $body="Felicitation, une de vos reference a ete validé par " . $mail2 ." .\n Cliquer sur ce lien pour aller voir votre compte : ";
    $link= "http://localhost:8000/public/visiteur/register/register.php \n";

    sendMail($mail,$object,$body . $link);
    }

?>

