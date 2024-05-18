<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../etc/header-style.css">
</head>
<body>

<?php

    //Verification de session et de deconnexion


    if(!isset($_SESSION['id'])){
        echo "<script>window.location.replace('../../visiteur/register/register.php');</script>";
    }


    // Header

    include('../../../src/element/header/jeune.html');


    // Contenue

    include('../../../src/element/content/presentation.html');

?>

</body>
</html>
