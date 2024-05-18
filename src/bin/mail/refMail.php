<?php




// Fonction qui envoie un mail au référent

function refMail($mail, $id){
    $object = 'Validation de référence';
    $body = "Bonjour Monsieur,\n\n
    Je me permets de vous contacter dans le cadre du projet Jeunes 6.4, un dispositif de valorisation de l'engagement des jeunes en Pyrénées-Atlantiques.\n\n
    Je suis un jeune engagé et j'ai récemment utilisé le site web du projet Jeunes 6.4 pour demander des références qui confirment mon expérience.\n
    J'ai pris connaissance de votre rôle en tant que référent et j'aimerais vous solliciter pour une référence qui atteste de mon engagement et de mes compétences.\n
    J'ai rempli le formulaire de demande de référence en fournissant les détails suivants :\n\nDescription de mon engagement\nDurée de mon engagement\n
    Milieu de mon engagement (association, club de sport, etc.)\n
    Mes coordonnées personnelles\nUne liste des savoir-faire et/ou savoir-être démontrés pendant mon engagement\n
    Je suis convaincu que votre témoignage et votre évaluation de mon engagement seront précieux pour valoriser mes compétences auprès de futurs employeurs ou recruteurs.\n\n
    Pour accéder à ma demande de référence, veuillez cliquer sur le lien suivant :\n";
    $link = "<a href='http://localhost:8000/public/referent/validate.php?name=".encrypt($_SESSION['id'])."&ref=".encrypt(strval($id))."'>Lien vers la demande de reference</a>\n";

    sendMail($mail, $object, $body . $link);
}


?>