<?php
if (isset($_POST['envoyer'])) {

    $date = $_POST['date'];
    $timestamp = $_POST['horaire'];
    $idClient = $_POST['client'];

    if ($date != NULL && $timestamp != NULL && $idClient != NULL) {
        $db = ConnexionBdd();

        $test = $db->prepare("SELECT `date_appoint`, `hour_appoint` FROM `appointment` WHERE `id_user` = '$id_user' ");
        $test->execute();
        $testAppoint = $test->fetchAll();
        if ($timestamp = 'matin') $timestamp = date('H:i:s', mktime(8, 0, 0));
        else $timestamp = date('H:i:s', mktime(14, 0, 0));


        if (array_search($date, $testAppoint) == NULL && array_search($timestamp, $testAppoint) == NULL) {
            $rdv = "INSERT INTO `appointment` (`id_appoint`, `date_appoint`, `hour_appoint`, `id_user`, `id_client`) VALUES (NULL, '$date', '$timestamp', '$id_user', '$idClient'); ";
            $newAppoint = $db->prepare($rdv);
            $newAppoint->execute();
            echo "<script> alert('rdv ajouté'); </script>";
        } else {
            echo "Plage déjà utilisé";
        }
    } else echo "Veuillez remplir tous les champs";
}
