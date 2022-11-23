

<?php

session_start();
if ($_SESSION == null) {
    header("location: login.php");
}
$id_user = $_SESSION["id_user"];
$id_job = $_SESSION["roles_user"];
include_once('../ConnectionBdd.php');

require('../Entity/entity_homepage.php');

if (!empty($_POST['appoint'])) {
    $date = htmlspecialchars($_POST['date']);
    $timestamp = htmlspecialchars($_POST['horaire']);
    $idClient = htmlspecialchars($_POST['client']);
    require "../Entity/Appointment.php";
    appointement($date, $timestamp, $idClient, $id_user, $pdo);
    
}
if (!empty($_POST['REGISTER_CLIENT'])) {
    $pc = htmlspecialchars($_POST['pc']);
    $city = htmlspecialchars($_POST['city']);
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    $label = htmlspecialchars($_POST['label']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $timestamp = htmlspecialchars($_POST['horaire']);
    $date = htmlspecialchars($_POST['date']);
    require "../Entity/client.php";
    registerClient($pc, $city, $address, $phone, $label, $nom, $prenom, $email, $timestamp, $id_user, $date, $pdo);
}
require('../../template/home_page_template.php');

?>