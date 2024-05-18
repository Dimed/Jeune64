<?php session_start(); ?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../../../etc/header-style.css">
    <link rel="stylesheet" href="../../../etc/formulaire-style.css">
    <link rel="stylesheet" href="profil-style.css">
    <script>


        // Fonction qui empeche de coché plus de 4 case

        function chkctrl(j){
            total=0;
            for(i=0;i<document.getElementsByClassName('check').length;i++){
                if(document.getElementsByClassName('check')[i].checked){
                    total=total+1;
                }
            }
            if(total>4){
                alert("Max case");
                document.getElementsByClassName('check')[j].checked=false
            }
        }
    </script>
</head>
<body>

<?php


    include('../../../src/bin/utilitary/putInfo.php');
    include('../../../src/bin/utilitary/checked.php');
    include('../../../src/bin/account/modifyAccount.php');


    //Verification de session et de deconnexion


    if(!isset($_SESSION['id'])){
        echo "<script>window.location.replace('../../visiteur/register/register.php');</script>";
    }


    if(isset($_POST["logout"])){
        session_destroy();
        echo "<script>window.location.replace('../../visiteur/register/register.php');</script>";
    }


    $data = putInfo("../../../data/account/" . $_SESSION['id'] . "/id.txt");


    // Header

    include('../../../src/element/header/jeune.html');
?>


    <!--- Formulaire du profil -->

    <form method="post" action="" class="form">

        <div class="wrapper">
            <div class="container" id="left">
                <label for="Description">Description :</label>
                <textarea name="Description" placeholder="Enter text" id="Description" ><?php echo isset($_POST['Description']) ? $_POST['Description'] : $data[7]; ?></textarea>
            </div>
            <div class="container" id="center">
                <fieldset>
                    <div class="form-header">
                        <h2>Profil</h2>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label for="NOM">Nom :</label>
                            <input required type="text" name="NOM" value="<?php echo isset($_POST['NOM']) ? $_POST['NOM'] : $data[0]; ?>" id="NOM" >
                        </div>
                        <div class="form-group">
                            <label for="PRENOM">Prenom :</label>
                            <input required type="text" name="PRENOM" value="<?php echo isset($_POST['PRENOM']) ? $_POST['PRENOM'] : $data[1]; ?>" id="PRENOM" >
                        </div>
                        <div class="form-group">
                            <label for="password">Old Mdp :</label>
                            <input required type="password" name="password"  id="password" >
                        </div>
                        <div class="form-group">
                            <label for="password2">New Mdp :</label>
                            <input  type="password" name="password2"  placeholder="Laisser vide pour conserver le mdp" id="password2" >
                        </div>
                        <div class="form-group">
                            <label for="Birthdate">Date de naissance:</label>
                            <input required type="date" name="Birthdate" value="<?php echo isset($_POST['Birthdate']) ? $_POST['Birthdate'] : $data[3]; ?>" id="DATE DE NAISSANCE" >
                        </div>
                        <div class="form-group">
                            <label for="MAIL">MAIL :</label>
                            <input required type="email" name="MAIL" value="<?php echo isset($_POST['MAIL']) ? $_POST['MAIL'] : $data[4]; ?>" id="Mail" >
                        </div>
                        <div class="form-group">
                            <label for="zone">Adresse  :</label>
                            <input  type="text" name="zone" value="<?php echo isset($_POST['zone']) ? $_POST['zone'] : $data[5]; ?>" id="zone" >
                        </div>
                        <div class="form-group">
                            <label for="phone">Telephone  :</label>
                            <input type="tel" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : $data[6]; ?>" id="phone" >
                        </div>
                        <div class="form-group">
                            <label for="Engagement">Engagement :</label>
                            <input  type="text" name="Engagement" value="<?php echo isset($_POST['Engagement']) ? $_POST['Engagement'] : $data[8]; ?>" id="Engagement" >
                        </div>
                        <div class="form-group">
                            <label for="Duree">Duree :</label>
                            <input  type="text" name="Duree" value="<?php echo isset($_POST['Duree']) ? $_POST['Duree'] : $data[9]; ?>" id="Duree" >
                        </div>
                    </div>
                    <div class="form-footer">
                        <input type="submit" name="button" value="Valider">
                    </div>
                </fieldset>
            </div>
            <div class="container" id="right">
                <label for="etre">Mes savoir faire :</label>
                <fieldset name="etre">
                    <div >Je suis*</div>
                    <input class="check"  type="checkbox" name="Be[]"  value="Be1" id="Be1" <?php echo checked("Be1", explode(";", $data[10])); ?> onclick='chkctrl(0)'; >
                    <label for="Be[]">Autonome</label><br>

                    <input  class="check" type="checkbox" name="Be[]"  value="Be2" id="Be2" <?php echo checked("Be2", explode(";", $data[10])); ?> onclick='chkctrl(1)'; >
                    <label for="Be[]">Passionné</label><br>

                    <input class="check"  type="checkbox" name="Be[]"  value="Be3" id="Be3" <?php echo checked("Be3", explode(";", $data[10])); ?> onclick='chkctrl(2)'; >
                    <label for="Be[]">Responsable</label><br>

                    <input  class="check" type="checkbox" name="Be[]"  value="Be4" id="Be4" <?php echo checked("Be4", explode(";", $data[10])); ?> onclick='chkctrl(3)'; >
                    <label for="Be[]">Reflechi</label><br>

                    <input  class="check" type="checkbox" name="Be[]"  value="Be5" id="Be5" <?php echo checked("Be5", explode(";", $data[10])); ?> onclick='chkctrl(4)'; >
                    <label for="Be[]">Organisé</label><br>

                    <input class="check"  type="checkbox" name="Be[]"  value="Be6" id="Be6" <?php echo checked("Be6", explode(";", $data[10])); ?> onclick='chkctrl(5)'; >
                    <label for="Be[]">Sociable</label><br>

                    <input  class="check" type="checkbox" name="Be[]"  value="Be7" id="Be7" <?php echo checked("Be7", explode(";", $data[10])); ?> onclick='chkctrl(6)'; >
                    <label for="Be[]">Fiable</label><br>

                    <input  class="check" type="checkbox" name="Be[]"  value="Be8" id="Be8" <?php echo checked("Be8", explode(";", $data[10])); ?> onclick='chkctrl(7)'; >
                    <label for="Be[]">Patient</label><br>

                    <input  class="check" type="checkbox" name="Be[]"  value="Be9" id="Be9" <?php echo checked("Be9", explode(";", $data[10])); ?> onclick='chkctrl(8)'; >
                    <label for="Be[]">A l'écoute</label><br>
                    <h5>veuillez rafraichier la page pour actualiser les element coché</h5>
                </fieldset>
            </div>
        </div>

    </form>


    <!--- Boutton de deconnexion -->

    <form method= "post" action=""><input type="submit" class = "logout" name="logout" value="logout"></form>

<?php

   // Sauvegarde les modifications

    if(isset($_POST["button"])){
        modifyAccount($_POST["NOM"],$_POST["PRENOM"],$_POST["password"],$_POST["password2"],$_POST["Birthdate"],$_POST["MAIL"],$_POST["zone"],$_POST["phone"],$_POST["Description"],$_POST["Engagement"],$_POST["Duree"],$_POST["Be"]);
    }


?>


</body>
</html>
