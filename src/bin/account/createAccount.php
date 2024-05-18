<?php



// Fonction qui gere la creation de compte

function createAccount($nom,$prenom,$password,$birth,$mail) {

    $mail = strtolower($mail);
    $dir = "../../../data/account/" . $mail;



    // Verifie si le compte existe deja et si le mot de passe est suffisament fort

    if(!file_exists($dir)){
        if((strlen($password) >= 6 && preg_match('/[a-z]/', $password) && preg_match('/[A-Z]/', $password) && preg_match('/[0-9]/', $password) && preg_match('/[^a-zA-Z0-9]/', $password)) ){


            // Creation du compte

            if(mkdir($dir)){
                mkdir($dir. "/refW");
                mkdir($dir. "/refV");
                echo "<span class='ans' >Compte créé avec succès.</span>";
                $myfile = fopen($dir . "/id.txt", "w");
                fwrite($myfile, $nom . "\n");
                fwrite($myfile, $prenom . "\n");
                fwrite($myfile, password_hash($password,PASSWORD_DEFAULT) . "\n");
                fwrite($myfile, $birth . "\n");
                fwrite($myfile, $mail . "\n");
                fclose($myfile);
            }
            else{
                echo "<span class='ans' >ERREUR : Le Compte n'a pas pu être créé.</span>";
            }
        }
        else{
            echo "<span class='ans' >Mot de passe trop faible, il faut au minimum : <br>
            <ul><li>6 caracteres</li><li>1 Majuscule</li><li>1 Minuscule</li><li>1 Chiffre</li><li>1 Caractere Special</li></ul></span>";
        }
    }
    else{
        echo "<span class='ans' >Le Compte existe déjà.</span>";
    }
}

?>