<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referent</title>
    <link rel="stylesheet" href="../../etc/header-style.css">
    <link rel="stylesheet" href="../../etc/formulaire-style.css">
    <link rel="stylesheet" href="./validate-style.css">
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


    // Header

    include('../../src/element/header/referent.html');

    include('../../src/bin/utilitary/putInfo.php');
    include('../../src/bin/utilitary/checked.php');
    include('../../src/bin/utilitary/decrypt.php');


    $id = decrypt(str_replace(" ","+",$_GET['name']));
    $ref =  decrypt(str_replace(" ","+",$_GET['ref']));

    $file1 = "../../data/account/" . $id  . "/id.txt";
    $file2 = "../../data/account/" . $id  . "/refW/ref". strval($ref).".txt";

    if(!file_exists($file1 ) || !file_exists($file2)){echo "<script>window.location.replace('../visiteur/etc/presentation.php');</script>";}

    $data = putInfo($file1);
    $data2 = putInfo($file2);

    ?>

<br><br>

<!--- Formulaire des info du jeune -->
    <div class="wrapper">
    <div class="form">
        <fieldset>
            <div class="form-header">
            <h2>Profil</h2>
            </div>
            <div class="form-body">
                <div class="left">
            <div class="form-group">
            <label for="NOM">Nom :</label>
            <input disabled type="text" name="NOM" value="<?php echo $data[0]; ?>" id="NOM" ><br>
            </div>
            <div class="form-group">
            <label for="PRENOM">Prenom :</label>
            <input disabled type="text" name="PRENOM" value="<?php echo $data[1]; ?>" id="PRENOM" ><br>
            </div>
            <div class="form-group">
            <label for="Birthdate">Date de naissance:</label>
            <input disabled type="date" name="Birthdate" value="<?php echo $data[3]; ?>" id="DATE DE NAISSANCE" ><br>
            </div>
            <div class="form-group">
            <label for="MAIL">MAIL :</label>
            <input disabled type="email" name="MAIL" value="<?php echo $data[4]; ?>" id="Mail" ><br>
            </div>
            <div class="form-group">
            <label for="zone">Adresse  :</label>
            <input disabled type="text" name="zone" value="<?php echo  $data[5]; ?>" id="zone" ><br>
            </div>
            <div class="form-group">
            <label for="phone">Telephone  :</label>
            <input  disabled type="tel" name="phone" value="<?php echo $data[6]; ?>" id="phone" ><br>
            </div>
            <div class="form-group">
            <label for="Description">Description :</label><br>
            <textarea disabled rows="5" cols="30" name="Description" placeholder="Enter text" id="Description" ><?php echo  $data[7]; ?></textarea><br>
            </div>
            <div class="form-group">
            <label for="Engagement">Engagement :</label>
            <input disabled type="text" name="Engagement" value="<?php echo  $data[8]; ?>" id="Engagement" ><br>
            </div>
            <div class="form-group">
            <label for="Duree">Duree :</label>
            <input disabled type="text" name="Duree" value="<?php echo  $data[9]; ?>" id="Duree" ><br>
            </div>
    </div>
            <div class="right">
            <div class="form-column">
            <label for="etre">Mes savoir faire :</label>
            <fieldset name="etre">
                <div >Je suis*</div>
                <input disabled  type="checkbox" name="Be[]" value="Be1" id="Be1" <?php echo checked("Be1", explode(";", $data[10])); ?> onclick='chkctrl(0)'; >
                <label for="Be[]">Autonome</label><br>

                <input  disabled type="checkbox" name="Be[]" value="Be2" id="Be2" <?php echo checked("Be2", explode(";", $data[10])); ?> onclick='chkctrl(1)'; >
                <label for="Be[]">Passionné</label><br>

                <input disabled  type="checkbox" name="Be[]" value="Be3" id="Be3" <?php echo checked("Be3", explode(";", $data[10])); ?> onclick='chkctrl(2)'; >
                <label for="Be[]">Responsable</label><br>

                <input disabled type="checkbox" name="Be[]" value="Be4" id="Be4" <?php echo checked("Be4", explode(";", $data[10])); ?> onclick='chkctrl(3)'; >
                <label for="Be[]">Reflechi</label><br>

                <input disabled type="checkbox" name="Be[]" value="Be5" id="Be5" <?php echo checked("Be5", explode(";", $data[10])); ?> onclick='chkctrl(4)'; >
                <label for="Be[]">Organisé</label><br>

                <input disabled  type="checkbox" name="Be[]" value="Be6" id="Be6" <?php echo checked("Be6", explode(";", $data[10])); ?> onclick='chkctrl(5)'; >
                <label for="Be[]">Sociable</label><br>

                <input disabled type="checkbox" name="Be[]" value="Be7" id="Be7" <?php echo checked("Be7", explode(";", $data[10])); ?> onclick='chkctrl(6)'; >
                <label for="Be[]">Fiable</label><br>

                <input disabled type="checkbox" name="Be[]" value="Be8" id="Be8" <?php echo checked("Be8", explode(";", $data[10])); ?> onclick='chkctrl(7)'; >
                <label for="Be[]">Patient</label><br>

                <input disabled type="checkbox" name="Be[]" value="Be9" id="Be9" <?php echo checked("Be9", explode(";", $data[10])); ?> onclick='chkctrl(8)'; >
                <label for="Be[]">A l'écoute</label><br>
            </fieldset>
            </div>
    </div>
    </div>
        </fieldset>
    </div>



    <!--- Formulaire de la reference à valides -->

    <form method="post" action="saveRef.php" class="form">
        <fieldset>
            <div class="form-header">
                <h2>Profil</h2>
            </div>
            <div class="form-body">
                <div class="left">
            <div class="form-group">
            <label for="NOM">Nom :</label>
            <input required type="text" name="NOM" vid="NOM" value="<?php echo $data2[0]; ?>"><br>
            </div>
            <div class="form-group">
            <label for="PRENOM">Prenom :</label>
            <input required type="text" name="PRENOM" id="PRENOM" value="<?php echo $data2[1]; ?>"><br>
            </div>
            <div class="form-group">
            <label for="Birthdate">Date de naissance:</label>
            <input required type="date" name="Birthdate" id="DATE DE NAISSANCE" value="<?php echo $data2[2]; ?>"><br>
            </div>
            <div class="form-group">
            <label for="MAIL">MAIL :</label>
            <input required type="email" name="MAIL"id="Mail" value="<?php echo $data2[3]; ?>" ><br>
            </div>
            <div class="form-group">
            <label for="social">Resaux :</label>
            <input required type="text" name="social"  id="social" value="<?php echo $data2[4]; ?>"><br><br>
            </div>
            <div class="form-group">
            <label for="Presentation">Presentation :</label>
            <input required type="text" name="Presentation" id="Presentation" value="<?php echo $data2[5]; ?>"><br>
            </div>
            <div class="form-group">
            <label for="Duree">Duree :</label>
            <input required type="text" name="Duree" id="Duree" value="<?php echo $data2[6]; ?>"><br>
            <input  type="hidden" name="id" id="id" value="<?php echo $id; ?>">
            <input  type="hidden" name="oldF" id="oldF" value="<?php echo $file2; ?>">
            </div>
    </div>
    <div class="right">
            <div class="form-column">
            <label for="etre">Mes savoir faire :</label>
            <fieldset name="etre">
                <div >Je suis*</div>
                <input class="check"  type="checkbox" name="In[]" value="In1" id="In1" <?php echo checked("In1", explode(";", $data2[7])); ?> onclick='chkctrl(0)'; >
                <label for="In[]">Confiance</label><br>

                <input  class="check" type="checkbox" name="In[]" value="In2" id="In2" <?php echo checked("In2", explode(";", $data2[7])); ?> onclick='chkctrl(1)';>
                <label for="In[]">Bienveillance</label><br>

                <input class="check"  type="checkbox" name="In[]" value="In3" id="In3" <?php echo checked("In3", explode(";", $data2[7])); ?> onclick='chkctrl(2)';>
                <label for="In[]">Respect</label><br>

                <input  class="check" type="checkbox" name="In[]" value="In4" id="In4" <?php echo checked("In4", explode(";", $data2[7])); ?> onclick='chkctrl(3)';>
                <label for="In[]">Honnetete</label><br>

                <input  class="check" type="checkbox" name="In[]" value="In5" id="In5" <?php echo checked("In5", explode(";", $data2[7])); ?> onclick='chkctrl(4)';>
                <label for="In[]">Tolerance</label><br>

                <input class="check"  type="checkbox" name="In[]" value="In6" id="In6" <?php echo checked("In6", explode(";", $data2[7])); ?> onclick='chkctrl(5)';>
                <label for="In[]">Juste</label><br>

                <input  class="check" type="checkbox" name="In[]" value="In7" id="In7" <?php echo checked("In7", explode(";", $data2[7])); ?> onclick='chkctrl(6)';>
                <label for="In[]">Impartial</label><br>

                <input  class="check" type="checkbox" name="In[]" value="In8" id="In8" <?php echo checked("In8", explode(";", $data2[7])); ?> onclick='chkctrl(7)';>
                <label for="In[]">Travail</label><br>
            </fieldset>
            </div>
    </div>
            </div>
            <div class="form-footer"><br><br>
                <input type="submit" name="button" value="Validé">
            </div>
        </fieldset>
    </form>
    </div>
    

</body>
</html>