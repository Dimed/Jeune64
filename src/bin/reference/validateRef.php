<?php



// Fonction qui s'occupe de valider les reference du jeune

function validateRef($id, $oldF, $nom=" ",$prenom=" ",$birth=" ",$mail=" ",$social=" ",$present=" ",$time=" ",$In){

    $dir = "../../data/account/" . $id . "/refV/ref";

    // Trouve un chiffre à donné à la reference

    for($i=1;$i>0;$i++){
        if(!file_exists($dir . strval($i) . ".txt" )){
            $myfile = fopen($dir . strval($i) . ".txt" , "w");
            break;
        }
    }


    // Enregistre la reference dans un fichier

    fwrite($myfile, $nom . "\n");
    fwrite($myfile, $prenom . "\n");
    fwrite($myfile, $birth . "\n");
    fwrite($myfile, $mail . "\n");
    fwrite($myfile, $social . "\n");
    fwrite($myfile, $present . "\n");
    fwrite($myfile, $time . "\n");
    if ($In == NULL){
        fwrite($myfile, " " . "\n");
    }
    else{
        fwrite($myfile, implode(';',$In) . "\n");
    }

    fclose($myfile);

    unlink($oldF);

    // Envoie le mail au jeune pour le prevenir que la reference est validé

    valMail($id,$mail);
}

?>