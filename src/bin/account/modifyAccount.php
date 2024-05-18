<?php



// Fonction qui gere le profil

function modifyAccount($nom=" ",$prenom=" ",$password=" ",$password2,$birth=" ",$mail=" ",$zone=" ",$phone=" ",$bio=" ",$engage=" ",$time=" ",$Be) {

    $mail = strtolower($mail);
    $dir = "../../../data/account/" . $_SESSION['id'];
    $dir2 = "../../../data/account/" . $mail;
    $contenuFichier = putInfo($dir. "/id.txt") ;



    // Verifie que l'ancien mot de passe est correcte

    if(password_verify($password,$contenuFichier[2])){



        // Verifie si l'adresse mail est deja utilisé quand l'utilisateur essaie de changer d'adresse mail et la change si elle ne l'est pas

        if($dir  != $dir2){
            if(file_exists($dir2)){
                echo "<span class='ans'>Adresse mail deja utilisé</span>";
                exit();
            }
            else{
                rename($dir,$dir2);
                $_SESSION['id'] = $mail;
            }
        }
        $myfile = fopen($dir2 . "/id.txt", "w");



        // Sauvegarde des modifications

        fwrite($myfile, $nom . "\n");
        fwrite($myfile, $prenom . "\n");
        if($password2 == NULL){
            fwrite($myfile, password_hash($password,PASSWORD_DEFAULT) . "\n");
        }
        else{



             // Verifie si le mot de passe est assez fort quand l'utilisateur essaie de changer de mot de passe

            if((strlen($password2) >= 6 && preg_match('/[a-z]/', $password2) && preg_match('/[A-Z]/', $password2) && preg_match('/[0-9]/', $password2) && preg_match('/[^a-zA-Z0-9]/', $password2)) ){
                fwrite($myfile, password_hash($password2,PASSWORD_DEFAULT) . "\n");
            }
            else{
                fwrite($myfile, password_hash($password,PASSWORD_DEFAULT) . "\n");
                echo "<span class='ans'>Nouveau mot de passe trop faible,l'ancien a ete conservé, il faut au minimum : <br>
                <ul><li>6 caracteres</li><li>1 Majuscule</li><li>1 Minuscule</li><li>1 Chiffre</li><li>1 Caractere Special</li></ul></span>";
            }
        }
        fwrite($myfile, $birth . "\n");
        fwrite($myfile, $mail . "\n");
        fwrite($myfile, $zone . "\n");
        fwrite($myfile, $phone . "\n");
        fwrite($myfile, $bio . "\n");
        fwrite($myfile, $engage . "\n");
        fwrite($myfile, $time . "\n");
        if ($Be == NULL){
            fwrite($myfile, " " . "\n");
        }
        else{
            fwrite($myfile, implode(';',$Be) . "\n");
        }
        fclose($myfile);


    }
    else{
        echo "<span class='ans'>Mot de passe incorect</span>";
    }
}


?>