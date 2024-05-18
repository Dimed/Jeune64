<?php session_start(); ?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../etc/header-style.css">
    <link rel="stylesheet" href="../../../etc/formulaire-style.css">
    <link rel="stylesheet" href="../../../etc/formulaire-style.css">
    <link rel="stylesheet" href="./register-style.css">
    <title>Acceuil</title>
</head>
<body >


<?php


    // Header

    include('../../../src/element/header/visiteur.html');


    include('../../../src/bin/account/createAccount.php');
    include('../../../src/bin/account/loginAccount.php');
    include('../../../src/bin/utilitary/putInfo.php');

?>

    <br><br>
    <div class='wrapper'>

        <!--- Formulaire de creation de compte -->

        <form method="post" action="" class="form">
            <fieldset>
                <div class="form-header">
                    <h2 >Inscription</h2>
                </div>
                <div class="form-body">
                    <div class="form-group">
                        <label for="NOM">NOM :</label>
                        <input required type="text" name="NOM" id="NOM" ><br>
                    </div>
                    <div class="form-group">
                        <label for="PRENOM">PRENOM :</label>
                        <input required type="text" name="PRENOM" id="PRENOM" >
                    </div>
                    <div class="form-group">
                        <label for="Birthdate">DATE DE NAISSANCE :</label>
                        <input required type="date" name="Birthdate" id="DATE DE NAISSANCE" ><br>
                    </div>
                    <div class="form-group">
                        <label for="MAIL">Mail :</label>
                        <input required type="email" name="MAIL" id="Mail" >
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input required type="password" name="password" id="password" ><br>
                    </div>
                </div>
                <div class="form-footer">
                    <input type="submit" name="button" value="S'inscrire">
                </div>
            </fieldset>
        </form>


        <!--- Formulaire de connexion -->

        <form method="post" action="" class="form">
            <fieldset>
                <div class="form-header">
                    <h2>Connexion</h2>
                </div>
                <div class="form-body">
                    <div class="form-group">
                        <label for="MAIL">Mail :</label>
                        <input required type="email" name="email" id="Mail2" >
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input required type="password" name="pwd" id="password2">
                    </div>
                </div>
                <div class="form-footer">
                <br><br><br><br><br><br><br>
                        <input type="submit" name="button2" value="Se connecter">
                    </div>
            </fieldset>
        </form>


    </div>


<?php

    // Creation du compte

    if (isset($_POST["button"])) {
        createAccount($_POST['NOM'],$_POST['PRENOM'],$_POST['password'],$_POST['Birthdate'],$_POST['MAIL']);
    }

    // Connexion

    if (isset($_POST["button2"])) {
        loginAccount($_POST['email'],$_POST['pwd']);
        if(isset($_SESSION['id'])){
            echo "<script>window.location.replace('../../jeune/etc/presentation.php');</script>";
        }
    }


?>


</body>
</html>