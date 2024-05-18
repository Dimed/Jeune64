<?php session_start(); ?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referent</title>
    <link rel="stylesheet" href="../../../etc/header-style.css">
    <link rel="stylesheet" href="../../../etc/formulaire-style.css">
    <link rel="stylesheet" href="seeRef-style.css">
</head>
<body>

<?php


    include('../../../src/bin/utilitary/putInfo.php');
    include('../../../src/bin/utilitary/checked.php');
    include('../../../src/bin/utilitary/listerFichiers.php');


    //Verification de session et de deconnexion



    if(!isset($_SESSION['id'])){
        echo "<script>window.location.replace('../../visiteur/register/register.php');</script>";
    }


    if(isset($_POST["logout"])){
        session_destroy();
        echo "<script>window.location.replace('../../visiteur/register/register.php');</script>";
    }



    // Verification si c'est la premiere fois que l'on va sur la page

    $_SESSION['countW'] = (!$_SESSION['countW']) ? 0 : $_SESSION['countW'];
    $_SESSION['countV'] = (!$_SESSION['countV']) ? 0 : $_SESSION['countV'];


    $allFV = listerFichiers("../../../data/account/".$_SESSION['id']."/refV");
    $allFW = listerFichiers("../../../data/account/".$_SESSION['id']."/refW");


    // Passage entre les differentes references

    if(isset($_POST["wait"])){
        $_SESSION['countW']--;
    }
    if(isset($_POST["wait2"])){
        $_SESSION['countW']++;;
    }
    if(isset($_POST["val"])){
        $_SESSION['countV']--;
    }
    if(isset($_POST["val2"])){
        $_SESSION['countV']++;
    }
    if($_SESSION['countV'] >= count($allFV)){
        $_SESSION['countV'] = count($allFV) - 1;
    }
    if($_SESSION['countW'] >= count($allFW)){
        $_SESSION['countW'] = (count($allFW) - 1);
    }
    if($_SESSION['countV'] <0){
        $_SESSION['countV'] = 0;
    }
    if($_SESSION['countW'] <0){
        $_SESSION['countW'] = 0;
    }



    if($allFV){$data = putInfo($allFV[$_SESSION['countV']]);}
    if($allFW){$data2 = putInfo($allFW[$_SESSION['countW']]);}
    if (isset($_POST["val"]) || isset($_POST["val2"]) || isset($_POST["wait"]) || isset($_POST["wait2"])) {
        echo "<script>window.location.replace('seeRef.php');</script>";
        exit();
    }


    // Header

    include('../../../src/element/header/jeune.html');


?>



    <div class="wrapper">

        <div class="form">



            <!--- Boutton des references non valides -->

            <form  class ="b1" method="post" action="">
                <div>
                    <input <?php if(!$allFW){echo "disabled";}elseif($_SESSION['countW']==0){echo "disabled";} ?> type="submit" name="wait" value="<">
                    <span><?php  if(!$allFW){echo "0/0";}else{echo ($_SESSION['countW']+1)."/".count($allFW);} ?></span>
                    <input <?php if(!$allFW){echo "disabled";}elseif($_SESSION['countW']==(count($allFW)-1)){echo "disabled";} ?> type="submit" name="wait2" value=">">
                </div>
            </form>



            <!--- Formulaire des references non valides -->

            <fieldset>

                <div class="form-header">
                    <h2>Reference non validé</h2>
                </div>

                <div class="form-body">
                    <div class="left">
                    <div class="form-group">
                        <label for="NOM">Nom :</label>
                        <input disabled type="text" name="NOM" vid="NOM" value="<?php if($allFW){echo "$data2[0]";} ?>"><br>
                    </div>

                    <div class="form-group">
                        <label for="PRENOM">Prenom :</label>
                        <input disabled type="text" name="PRENOM" id="PRENOM" value="<?php if($allFW){echo "$data2[1]";} ?>"><br>
                    </div>

                    <div class="form-group">
                        <label for="Birthdate">Date de naissance:</label>
                        <input disabled type="date" name="Birthdate" id="DATE DE NAISSANCE" value="<?php if($allFW){echo "$data2[2]";} ?>"><br>
                    </div>

                    <div class="form-group">
                        <label for="MAIL">MAIL :</label>
                        <input disabled type="email" name="MAIL"id="Mail" value="<?php if($allFW){echo "$data2[3]";} ?>" ><br>
                    </div>

                    <div class="form-group">
                        <label for="social">Resaux :</label>
                        <input disabled type="text" name="social"  id="social" value="<?php if($allFW){echo "$data2[4]";} ?>"><br><br>
                    </div>

                    <div class="form-group">
                        <label for="Presentation">Presentation :</label>
                        <input disabled type="text" name="Presentation" id="Presentation" value="<?php if($allFW){echo "$data2[5]";} ?>"><br>
                    </div>

                    <div class="form-group">
                        <label for="Duree">Duree :</label>
                        <input disabled type="text" name="Duree" id="Duree" value="<?php if($allFW){echo "$data2[6]";} ?>"><br>
                    </div>
                    </div>
                    <div class="right">
                    <div class="form-column">

                        <label for="etre">Mes savoir faire :</label>
                        <fieldset name="etre">
                            <div >Je suis*</div>
                            <input disabled class="check"  type="checkbox" name="InV[]" value="In1" id="In1" <?php if($allFW){echo checked("In1", explode(";", $data2[7]));} ?> >
                            <label for="InV[]">Confiance</label><br>

                            <input  disabled class="check" type="checkbox" name="In[]" value="In2" id="In2" <?php if($allFW){echo checked("In2", explode(";", $data2[7]));} ?> >
                            <label for="InV[]">Bienveillance</label><br>

                            <input disabled class="check"  type="checkbox" name="In[]" value="In3" id="In3" <?php if($allFW){echo checked("In3", explode(";", $data2[7]));} ?> >
                            <label for="InV[]">Respect</label><br>

                            <input disabled class="check" type="checkbox" name="In[]" value="In4" id="In4" <?php if($allFW){echo checked("In4", explode(";", $data2[7]));} ?> >
                            <label for="InV[]">Honnetete</label><br>

                            <input disabled class="check" type="checkbox" name="In[]" value="In5" id="In5" <?php if($allFW){echo checked("In5", explode(";", $data2[7]));} ?> >
                            <label for="InV[]">Tolerance</label><br>

                            <input disabled class="check"  type="checkbox" name="In[]" value="InV6" id="In6" <?php if($allFW){echo checked("In6", explode(";", $data2[7]));} ?> >
                            <label for="InV[]">Juste</label><br>

                            <input disabled class="check" type="checkbox" name="In[]" value="In7" id="In7 <?php if($allFW){echo checked("In7", explode(";", $data2[7]));} ?> ">
                            <label for="InV[]">Impartial</label><br>

                            <input disabled class="check" type="checkbox" name="In[]" value="In8" id="In8" <?php if($allFW){echo checked("In8", explode(";", $data2[7]));} ?> >
                            <label for="InV[]">Travail</label><br>

                        </fieldset>
                    </div>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="form">



            <!--- Boutton des references valides -->

            <form class ="b1" method="post" action="">
                <div>
                    <input <?php if(!$allFV){echo "disabled";}elseif($_SESSION['countV']==0){echo "disabled";} ?> type="submit" name="val" value="<">
                    <span><?php  if(!$allFV){echo "0/0";}else{echo ($_SESSION['countV']+1)."/".count($allFV);} ?></span>
                    <input <?php if(!$allFV){echo "disabled";}elseif($_SESSION['countV']==(count($allFV)-1)){echo "disabled";} ?> type="submit" name="val2" value=">">
                </div>
            </form>



            <!--- Formulaire des references valides -->

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
                        <label for="MAIL">MAIL :</label>
                        <input disabled type="email" name="MAIL"id="Mail" value="<?php if($allFV){echo "$data[3]";} ?>"><br>
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
            </fieldset>
        </div>



        <!--- Boutton vers askRef -->

        <a href="askRef.php" ><button class="askref" >Demander une referance</button></a><br><br>



        <!--- Boutton de deconnexion -->

        <form method="post" action=""><input type="submit" class="logout" name="logout" value="logout"></form>
    </div>

</body>
</html>