
<?php


    ob_start();
    session_start();

    echo "
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Referent</title>
        <link rel='stylesheet' href='../../../etc/formulaire-style.css'>
        <link rel='stylesheet' href='./CV-style.css'>
    </head>
    <body>";


    include('../../../src/bin/utilitary/putInfo.php');
    include('../../../src/bin/utilitary/checked.php');


    //Verification de session


    if(!isset($_SESSION['id'])){
        echo "<script>window.location.replace('../../visiteur/register/register.php');</script>";
    }


    $listeRef = explode(';',$_GET['id']);

    foreach($listeRef as $val){
        $file = '../../../data/account/'.$_SESSION['id'].'/refV/ref'.$val.'.txt';
        $data = putInfo($file);


        // Affiche le formulaire de reference validé de chaque reference choisie a la suite

        echo "
        <div class='wrapper'>
            <fieldset>
            <div class='container' id='center'>
                <div class='form-header'>
                    <h2>Reference validé</h2>
                </div>
                
                <div class='form-body'>
                    <div class='form-group'>
                        <label for='NOM'>Nom :</label>
                        <input disabled type='text' name='NOM' vid='NOM' value='" . $data[0] . "'><br>
                    </div>
                    <div class='form-group'>
                        <label for='PRENOM'>Prenom :</label>
                        <input disabled type='text' name='PRENOM' id='PRENOM' value='" . $data[1] . "'><br>
                    </div>
                    <div class='form-group'>
                        <label for='Birthdate'>Date de naissance:</label>
                        <input disabled type='date' name='Birthdate' id='DATE DE NAISSANCE' value='" . $data[2] . "'><br>
                    </div>
                    <div class='form-group'>
                        <label for='x'>MAIL :</label>
                        <input disabled type='email' name='x' id='Mail' value='" . $data[3] . "'><br>
                    </div>
                    <div class='form-group'>
                        <label for='social'>Resaux :</label>
                        <input disabled type='text' name='social' id='social' value='" . $data[4] . "'><br><br>
                    </div>
                    <div class='form-group'>
                        <label for='Presentation'>Presentation :</label>
                        <input disabled type='text' name='Presentation' id='Presentation' value='" . $data[5] . "'><br>
                    </div>
                    <div class='form-group'>
                        <label for='Duree'>Duree :</label>
                        <input disabled type='text' name='Duree' id='Duree' value='" . $data[6] . "'><br>
                    </div>
                </div>
                
            </div>
            <div class='container' id='right'>
                <label for='etre'>Mes savoir faire :</label>
                <fieldset name='etre'>
                    <div>Je suis*</div>
                    <input disabled class='check' type='checkbox' name='In[]' value='In1' id='In1' " . checked('In1', explode(';', $data[7])) . ">
                    <label for='In1'>Confiance</label><br>

                    <input disabled class='check' type='checkbox' name='In[]' value='In2' id='In2' " . checked('In2', explode(';', $data[7])) . ">
                    <label for='In2'>Bienveillance</label><br>

                    <input disabled class='check' type='checkbox' name='In[]' value='In3' id='In3' " . checked('In3', explode(';', $data[7])) . ">
                    <label for='In3'>Respect</label><br>

                    <input disabled class='check' type='checkbox' name='In[]' value='In4' id='In4' " . checked('In4', explode(';', $data[7])) . ">
                    <label for='In4'>Honnêteté</label><br>

                    <input disabled class='check' type='checkbox' name='In[]' value='In5' id='In5' " . checked('In5', explode(';', $data[7])) . ">
                    <label for='In5'>Tolérance</label><br>

                    <input disabled class='check' type='checkbox' name='In[]' value='In6' id='In6' " . checked('In6', explode(';', $data[7])) . ">
                    <label for='In6'>Juste</label><br>

                    <input disabled class='check' type='checkbox' name='In[]' value='In7' id='In7' " . checked('In7', explode(';', $data[7])) . ">
                    <label for='In7'>Impartial</label><br>

                    <input disabled class='check' type='checkbox' name='In[]' value='In8' id='In8' " . checked('In8', explode(';', $data[7])) . ">
                    <label for='In8'>Travail</label><br>

                </fieldset>
            </div>

            </fieldset>
        </div><br><br><br>";

    }


    echo"</body></html>";
    file_put_contents('./save/CV.html', ob_get_clean());

?>


<!--- Ouvre la version html final et pdf du cv-->

<script type="text/javascript" language="Javascript">
window.open('pdfFile.php');
window.location.replace('./save/CV.html');
</script>

