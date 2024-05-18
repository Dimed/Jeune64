<?php

include('../../src/bin/mail/valMail.php');
include('../../src/bin/mail/sendMail.php');
include('../../src/bin/reference/validateRef.php');

if(isset($_POST["button"])){
    validateRef($_POST["id"],$_POST["oldF"],$_POST["NOM"],$_POST["PRENOM"],$_POST["Birthdate"],$_POST["MAIL"],$_POST["social"],$_POST["Presentation"],$_POST["Duree"],$_POST["In"]);
    echo "<script>window.location.replace('../visiteur/etc/presentation.php');</script>";
}

?>