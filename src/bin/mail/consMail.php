<?php



// Fonction qui envoie un mail au consultant

function consMail($mail, $id){

    $object = 'Un jeune veut travailler avec vous !';
    $body = "Bonjour Monsieur,\n\n
    Je me permets de vous contacter dans le cadre du projet Jeunes 6.4, un dispositif de valorisation de l'engagement des jeunes en Pyrénées-Atlantiques.\n\n
    Je suis un jeune engagé et je souhaite mettre en valeur mes expériences et compétences à travers ce projet.\n
    J'ai parcouru votre profil et votre expertise en tant que consultant m'intéresse particulièrement.\n
    J'ai utilisé le site web du projet Jeunes 6.4 pour demander des références qui confirment mon expérience.\n
    Après avoir soigneusement sélectionné les références pertinentes, je voudrais les partager avec vous pour que vous puissiez les consulter.\n
    Ces références démontrent mes compétences et mon savoir-faire acquis lors de mes engagements précédents, que ce soit dans des clubs sportifs, des associations ou d'autres domaines.\n\n
    Pour accéder aux références validées, veuillez cliquer sur le lien suivant :\n";
    $link = "<a href='http://localhost:8000/public/consultant/seeCons.php?name=".encrypt($_SESSION['id'])."&ref=".encrypt($id)."'>Lien vers les references validees</a>\n";

    sendMail($mail, $object, $body . $link);
}

?>