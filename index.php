<!DOCTYPE html>
<?php
if (isset($_GET['valider'])) {
    extract($_GET, EXTR_OVERWRITE);
    $erreur = "";

    if ($heure == "") {
        $erreur.="<span class='txtRouge'>Heure manquante<br/></span>";
    }
    if ($ref == "") {
        $erreur.="<span class='txtRouge'>Référence manquante<br/></span>";
    }
    if ($nbr == "") {
        $erreur.="<span class='txtRouge'>Nombre de containers manquant<br/></span>";
    }
    if ($choixExpediteur == "") {
        $erreur.="<span class='txtRouge'>Expéditeur manquant<br/></span>";
    }
    if ($dateExpedition == "") {
        $erreur.="<span class='txtRouge'>Date d'expedition manquante<br/></span>";
    }
    if ($vehiculesRecus == "") {
        $erreur.="<span class='txtRouge'>Article manquant<br/></span>";
    }
    if ($couleur == "") {
        $erreur.="<span class='txtRouge'>Couleur manquante<br/></span>";
    }
    if (isset($metalise)) {
        $metaliseTitle = "Oui";
    } else {
        $metaliseTitle = "Non";
    }

    if ($erreur == "") { //encodage ok 
        ?> <p>Récapitulatif de votre réservation :</p> <?php
        print "Date de réception: $date<br/>";
        print "Heure de réception: $heure<br/>";
        print "Référence: $ref<br/>";
        print "Nombre reçu : $nbr<br/>";
        print "Expeéiteur: $choixExpediteur<br/>";
        print "Date prévue d'expédition: $dateExpedition<br/>";
        print "Marque: $vehiculesRecus<br/>";
        print "Couleur: $couleur<br/>";
        print "Métalisée? $metaliseTitle";
    } else {
        print $erreur;
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire</title>
    </head>
    <body>
        <form name="formulaire" method="get" action=" <?php print $_SERVER['PHP_SELF']; ?> ">
            <fieldset>
                <?php
                $dat = date('d-m-Y');
                ?>
                <datalist id="marques">
                    <option value="Volkswagen">
                    <option value="Audi">
                    <option value="Peugeot">
                    <option value="Opel">
                    <option value="Mercedes-Benz">
                    <option value="Renault">
                    <option value="Nissan">
                    <option value="Suzuki">
                    <option value="Kia">
                    <option value="Hyundai">
                    <option value="Mitsubishi">
                </datalist>
                <table>
                    <tr>
                        <td><label for="date">Date du jour de réception du container :</label></td>
                        <td><input type="text" name="date" value="<?php echo $dat; ?>" readonly /></td>
                    </tr>
                    <tr>
                        <td><label for="heure">Heure d'enregistrement :</label></td>
                        <td><input type="time" name="heure" required /></td>
                    </tr>
                    <tr>
                        <td><label for="ref">Référence du container :</label></td>
                        <td><input type="text" name="ref" placeholder="Format: LRP51cb4" 
                                   pattern="([A-Z]+[0-9]{2}[a-z]+[0-9]*)" required /></td>
                    </tr>
                    <tr>
                        <td><label for="nbr">Nombre de container reçus :</label></td>
                        <td><input type="number" name="nbr" min='3' required /></td>
                    </tr>
                    <tr>
                        <td><label for="choix_expediteur">Expéditeur :</label></td>
                        <td><input type="text" name="choixExpediteur" required /></td>
                    </tr>
                    <tr>
                        <td><label for="dateExpedition">Date prévue d'expédition chez les concessionnaires :</label></td>
                        <td><input type="date" name="dateExpedition" required /></td>
                    </tr>
                    <tr>
                        <td><label for="vehiculesRecus">Articles :</label></td>
                        <td><input list="marques" type="text" name="vehiculesRecus" required /></td>
                    </tr>
                    <tr>
                        <td><label for="couleur">Teinte :</label></td>
                        <td><input type="color" value="#000000" name="couleur" />
                            <label for="metalise" >Métalisé :</label>
                            <input type="checkbox" name="metalise" /></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="valider" value="Envoyer" id="bouton" />
                        </td>
                        <td>
                            <input type="reset" name="reset" value="Annuler" />
                        </td>
                    </tr>
                </table>
            </fieldset>	
        </form>
    </body>
</html>