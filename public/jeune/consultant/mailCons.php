<?php session_start(); ?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referent</title>
    <link rel="stylesheet" href="../../../etc/header-style.css">
    <link rel="stylesheet" href="../../../etc/formulaire-style.css">
    <link rel="stylesheet" href="mailCons-style.css">
</head>
<body>
<?php


    //Verification de session et de deconnexion

    if(!isset($_SESSION['id'])){
        echo "<script>window.location.replace('../../visiteur/register/register.php');</script>";
    }


    if(isset($_POST["logout"])){
        session_destroy();
        echo "<script>window.location.replace('../../visiteur/register/register.php');</script>";
    }


    if(isset($_POST['button'])){
        $_SESSION['mailConsultant'] = $_POST['email'];
        echo "<script>window.location.replace('sendCons.php');</script>";

    }

    // Header

    include('../../../src/element/header/jeune.html');


?>



    <!--- Formulaire du mail du consultant -->



    <br><br><br><br><br><br>
    <div class='wrapper'>


        <form method="post" action="" class="form">

            <fieldset>
                <div class="form-header">
                    <h2>consultant</h2>
                </div><br><br>
                <div class="form-body">
                    <div class="form-group">
                        <label for="MAIL">Mail :</label>
                        <input required type="email" name="email" id="Mail" >
                    </div>
                    </div>
                <div class="form-footer"><br><br><br>
                        <input type="submit" name="button" value="Envoyé">
                </div>
            </fieldset>
        </form>
    </div>
    <form method="post" action=""><input type="submit" class = "logout" name="logout" value="logout"></form>


</body>
</html>