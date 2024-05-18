<?php


    //Verification de session

    session_start();

    if(!isset($_SESSION['id'])){
        header('Location: ../../visiteur/register/register.php');
    }

    //Convertisseur html to pdf

    $command = 'wkhtmltopdf ' . escapeshellarg("./save/CV.html") . ' ' . escapeshellarg("./save/CV.pdf");
    exec($command);
?>

<!---  Ouverture du pdf-->

<script type="text/javascript" language="Javascript">
window.location.replace('./save/CV.pdf');
</script>