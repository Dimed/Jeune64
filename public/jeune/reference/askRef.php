<?php session_start(); ?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referent</title>
    <link rel="stylesheet" href="../../../etc/header-style.css">
    <link rel="stylesheet" href="../../../etc/formulaire-style.css">
    <link rel="stylesheet" href="./askRef-style.css">
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



    include('../../../src/bin/reference/sendRef.php');
    include('../../../src/bin/utilitary/encrypt.php');
    include('../../../src/bin/mail/refMail.php');
    include('../../../src/bin/mail/sendMail.php');


    //Verification de session et de deconnexion


    if(!isset($_SESSION['id'])){
        echo "<script>window.location.replace('../../visiteur/register/register.php');</script>";
    }


    if(isset($_POST["logout"])){
        session_destroy();
        echo "<script>window.location.replace('../../visiteur/register/register.php');</script>";
    }


    // Envoie la reference et la sauvegarde

    if (isset($_POST["button"])) {
        sendRef($_POST["NOM"],$_POST["PRENOM"],$_POST["Birthdate"],$_POST["MAIL"],$_POST["social"],$_POST["Presentation"],$_POST["Duree"],$_POST["In"]);
        echo "<script>window.location.replace('askRef.php');</script>";
    }


    // Header

    include('../../../src/element/header/jeune.html');

?>



    <!--- Formulaire de demande de reference -->
    <br><br><br>

    <form method="post" action="" class="form">

        <div class="wrapper">
            <div class="container" id="left">
                <label for="Presentation">Presentation :</label>
                <textarea required type="text" name="Presentation" id="Presentation" ></textarea>
            </div>
            <div class="container" id="center">
            <fieldset>
                <div class="form-header">
                    <h2>Profil</h2>
                </div>
                <div class="form-body">
                    <div class="form-group">
                        <label for="NOM">Nom :</label>
                        <input required type="text" name="NOM" vid="NOM" ><br>
                    </div>
                    <div class="form-group">
                        <label for="PRENOM">Prenom :</label>
                        <input required type="text" name="PRENOM" id="PRENOM" ><br>
                    </div>
                    <div class="form-group">
                        <label for="Birthdate">Date de naissance:</label>
                        <input required type="date" name="Birthdate" id="DATE DE NAISSANCE" ><br>
                    </div>
                    <div class="form-group">
                        <label for="MAIL">MAIL :</label>
                        <input required type="email" name="MAIL"id="Mail" ><br>
                    </div>
                    <div class="form-group">
                        <label for="social">Resaux :</label>
                        <input required type="text" name="social"  id="social" ><br><br>
                    </div>
                    <div class="form-group">
                        <label for="Duree">Duree :</label>
                        <input required type="text" name="Duree" id="Duree" ><br>
                    </div>
                </div>
                <div class="form-footer">
                    <input type="submit" name="button" value="Envoyé">
                </div>
            </fieldset>
            </div>
            <div class="container" id="right">
                <label for="etre">Mes savoir faire :</label>
                <fieldset name="etre">
                    <div >Je suis*</div>
                    <input class="check"  type="checkbox" name="In[]" value="In1" id="In1" onclick='chkctrl(0)'; >
                    <label for="In[]">Confiance</label><br>

                    <input  class="check" type="checkbox" name="In[]" value="In2" id="In2" onclick='chkctrl(1)';>
                    <label for="In[]">Bienveillance</label><br>

                    <input class="check"  type="checkbox" name="In[]" value="In3" id="In3" onclick='chkctrl(2)';>
                    <label for="In[]">Respect</label><br>

                    <input  class="check" type="checkbox" name="In[]" value="In4" id="In4" onclick='chkctrl(3)';>
                    <label for="In[]">Honnetete</label><br>

                    <input  class="check" type="checkbox" name="In[]" value="In5" id="In5" onclick='chkctrl(4)';>
                    <label for="In[]">Tolerance</label><br>

                    <input class="check"  type="checkbox" name="In[]" value="In6" id="In6" onclick='chkctrl(5)';>
                    <label for="In[]">Juste</label><br>

                    <input  class="check" type="checkbox" name="In[]" value="In7" id="In7" onclick='chkctrl(6)';>
                    <label for="In[]">Impartial</label><br>

                    <input  class="check" type="checkbox" name="In[]" value="In8" id="In8" onclick='chkctrl(7)';>
                    <label for="In[]">Travail</label><br>

                </fieldset>
            </div>
        </div>
    </form>



    <!--- Boutton de deconnexion -->

    <form method="post" action=""><input type="submit" class="logout" name="logout" value="logout"></form>


</body>
</html>