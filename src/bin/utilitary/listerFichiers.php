<?php



// Fonction pour obtenir un tableau de tout les fichier dans un dossier

function listerFichiers($dossier) {

    $fichiers = array();

    if (is_dir($dossier)) {
        $contenu = scandir($dossier);

        foreach ($contenu as $fichier) {
            if ($fichier != "." && $fichier != "..") {
                $chemin = $dossier . DIRECTORY_SEPARATOR . $fichier;
                if (is_file($chemin)) {
                    $fichiers[] = $chemin;
                }
            }
        }
    }
    return $fichiers;
}

?>