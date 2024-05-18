<?php

// Fonction qui gere la connexion

function loginAccount($mail,$password) {
    $mail = strtolower($mail);
    $dir = "../../../data/account/" . $mail;



    // Verifie si le compte existe et si le mot de passe est correcte

    if(file_exists($dir)){
        $contenuFichier = putInfo($dir. "/id.txt") ;
        if(password_verify($password,$contenuFichier[2])){
            echo "<span class='ans' >Connexion reussite</span>";

            // Connexion au compte

            $_SESSION['id'] = $mail;
        }
        else{
            echo "<span class='ans' >Mauvais mot de passe</span>";
        }
    }
    else{
        echo "<span class='ans' >Le Compte n'existe pas.</span>";
    }
}

?>