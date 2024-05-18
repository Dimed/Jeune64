<?php session_start(); ?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referent</title>
    <link rel="stylesheet" href="../../../etc/header-style.css">
    <link rel="stylesheet" href="../../../etc/formulaire-style.css">
    <link rel="stylesheet" href="./sendCons-style.css">
</head>
<body>


<?php


    include('../../../src/bin/consultant/sendCons.php');
    include('../../../src/bin/utilitary/listerFichiers.php');
    include('../../../src/bin/utilitary/encrypt.php');
    include('../../../src/bin/utilitary/putInfo.php');
    include('../../../src/bin/utilitary/checked.php');
    include('../../../src/bin/mail/consMail.php');
    include('../../../src/bin/mail/sendMail.php');


    //Verification de session et de deconnexion

    if(!isset($_SESSION['id'])){
        header('Location: ../../visiteur/register/register.php');
    }


    if(isset($_POST["logout"])){
        session_destroy();
        header('Location: ../../visiteur/register/register.php');
    }



    // Verification si c'est la premiere fois que l'on va sur la page

    $_SESSION['countJ'] = (!$_SESSION['countJ']) ? 0 : $_SESSION['countJ'];
    $allFV = listerFichiers("../../../data/account/".$_SESSION['id']."/refV");


    // Passage entre les differentes references

    if(isset($_POST["val"])){
        $_SESSION['countJ']--;
    }
    if(isset($_POST["val2"])){
        $_SESSION['countJ']++;
    }
    if($_SESSION['countJ'] >= count($allFV)){
        $_SESSION['countJ'] = (count($allFV) - 1);
    }
    if($_SESSION['countJ'] <0){
        $_SESSION['countJ'] = 0;
    }
    if (isset($_POST["val"]) || isset($_POST["val2"])){
        echo "<script>window.location.replace('sendCons.php');</script>";
        exit();
    }



    if($allFV){$data = putInfo($allFV[$_SESSION['countJ']]);}



    // Envoie le mail au consultant

    if (isset($_POST["button"])) {
        sendCons($_SESSION['mailConsultant'],$_POST['id']);
        echo "<script>window.location.replace('mailCons.php');</script>";
    }


    // Vers les CV telechargables

    if (isset($_POST["button2"])) {
        $url = "../cv/htmlFile.php?id=".implode(";",$_POST['id']);
        echo "<script>window.open('" . $url . " ');
        window.location.replace('sendCons.php');
        </script>";
    }


    // Header

    include('../../../src/element/header/jeune.html');


?>


    <br>

    <!--- Formulaire des references valides -->

    <div class="wrapper">
        <div class="form">
            <fieldset>
                <div class="form-header">
                    <h2>Reference validé</h2>
                </div>
                <div class="form-body">
                    <div class="left">
                    <div class="form-group">
                        <label for="NOM">Nom :</label>
                        <input disabled type="text" name="NOM" vid="NOM" value="<?php if($allFV){echo "$data[0]";} ?>"><br>
                    </div>
                    <div class="form-group">
                        <label for="PRENOM">Prenom :</label>
                        <input disabled type="text" name="PRENOM" id="PRENOM" value="<?php if($allFV){echo "$data[1]";} ?>"><br>
                    </div>
                    <div class="form-group">
                        <label for="Birthdate">Date de naissance:</label>
                        <input disabled type="date" name="Birthdate" id="DATE DE NAISSANCE" value="<?php if($allFV){echo "$data[2]";} ?>"><br>
                    </div>
                    <div class="form-group">
                        <label for="x">MAIL :</label>
                        <input disabled type="email" name="x"id="Mail" value="<?php if($allFV){echo "$data[3]";} ?>"><br>
                    </div>
                    <div class="form-group">
                        <label for="social">Resaux :</label>
                        <input disabled type="text" name="social"  id="social" value="<?php if($allFV){echo "$data[4]";} ?>"><br><br>
                    </div>
                    <div class="form-group">
                        <label for="Presentation">Presentation :</label>
                        <input disabled type="text" name="Presentation" id="Presentation" value="<?php if($allFV){echo "$data[5]";} ?>"><br>
                    </div>
                    <div class="form-group">
                        <label for="Duree">Duree :</label>
                        <input disabled type="text" name="Duree" id="Duree" value="<?php if($allFV){echo "$data[6]";} ?>"><br>
                    </div>
                    </div>
                    <div class="right">
                    <div class="form-column">
                        <label for="etre">Mes savoir faire :</label>
                        <fieldset name="etre">
                            <div >Je suis*</div>
                            <input disabled class="check"  type="checkbox" name="In[]" value="In1" id="In1" <?php if($allFV){echo checked("In1", explode(";", $data[7]));} ?> >
                            <label for="In[]">Confiance</label><br>

                            <input disabled class="check" type="checkbox" name="In[]" value="In2" id="In2" <?php if($allFV){echo checked("In2", explode(";", $data[7]));} ?> >
                            <label for="In[]">Bienveillance</label><br>

                            <input disabled class="check"  type="checkbox" name="In[]" value="In3" id="In3" <?php if($allFV){echo checked("In3", explode(";", $data[7]));} ?> >
                            <label for="In[]">Respect</label><br>

                            <input disabled class="check" type="checkbox" name="In[]" value="In4" id="In4" <?php if($allFV){echo checked("In4", explode(";", $data[7]));} ?> >
                            <label for="In[]">Honnetete</label><br>

                            <input disabled class="check" type="checkbox" name="In[]" value="In5" id="In5" <?php if($allFV){echo checked("In5", explode(";", $data[7]));} ?> >
                            <label for="In[]">Tolerance</label><br>

                            <input disabled class="check"  type="checkbox" name="In[]" value="In6" id="In6" <?php if($allFV){echo checked("In6", explode(";", $data[7]));} ?> >
                            <label for="In[]">Juste</label><br>

                            <input disabled class="check" type="checkbox" name="In[]" value="In7" id="In7" <?php if($allFV){echo checked("In7", explode(";", $data[7]));} ?> >
                            <label for="In[]">Impartial</label><br>

                            <input disabled class="check" type="checkbox" name="In[]" value="In8" id="In8" <?php if($allFV){echo checked("In8", explode(";", $data[7]));} ?> >
                            <label for="In[]">Travail</label><br>

                        </fieldset>
                    </div>
                </div>
                </div>
                <div class="form-footer">

                </div>
            </fieldset>



            <!--- Boutton des references valides -->

            <form class ="b1" method="post" action="">
                <div>
                    <input <?php if(!$allFV){echo "disabled";}elseif($_SESSION['countJ']==0){echo "disabled";} ?> type="submit" name="val" value="<">
                    <span><?php  if(!$allFV){echo "0/0";}else{echo ($_SESSION['countJ']+1)."/".count($allFV);} ?></span>
                    <input <?php if(!$allFV){echo "disabled";}elseif($_SESSION['countJ']==(count($allFV)-1)){echo "disabled";} ?> type="submit" name="val2" value=">">
                </div>
            </form>
        </div>


        <!--- Formulaire des references choisie -->

        <form id="f" method="POST" action="" class="form form2">
            <fieldset>
                <div class="form-body">
                    <div class="form-column">
                        <fieldset>
                            <div >Références</div>
                                <?php

                                    $i=1;


                                    // Cree les input checkbox pour chaque reference validé

                                    foreach ($allFV as $file) {
                                        $number = intval(substr(basename($file), 3, -4)); // Extrait le chiffre du nom du fichier
                                        echo '<span><br>';
                                        echo '<input type="checkbox" class="check2" name="id[]" value="' . $number . '"> ' ;
                                        echo '<label for="id[]"> </label>' .$i .") ". putInfo($file)[1] ." " . putInfo($file)[0] . '<br>';
                                        echo '</span>';
                                        $i++;
                                    }
                                ?>
                        </fieldset>
                    </div>
                </div>
                <div class="form-footer"><br><br><br><br>
                    <input type="submit" name="button" value="Envoyé">


                    <!--- Boutton pour accedé aux cv -->

                    <input type="submit" name="button2" value="Telechargé">
                </div>
            </fieldset>
        </form>
    </div>



    <!--- Boutton de deconnexion -->

    <form method="post" action=""><input type="submit" class="logout"  name="logout" value="logout"></form>



</body>
</html>