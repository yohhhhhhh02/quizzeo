<?php
session_start();

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['identifiant']) && isset($_POST['mot_de_passe']) && isset($_POST['type_inscription']) && isset($_POST['captcha'])) {
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $identifiant = $_POST['identifiant'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $type_inscription = $_POST['type_inscription'];
    $captcha = $_POST['captcha'];

    if (!isset($_SESSION['random_number']) || $_SESSION['random_number'] != $captcha) {
        echo '<script>alert("Captcha incorrect. Veuillez réessayer.");</script>';
        header('Location: inscription.php');
        exit();
    }

    $file_name = $type_inscription . '.csv';
    $file = fopen($file_name, 'a');
    if ($file) {
        fputcsv($file, [$nom, $prenom, $email, $identifiant, password_hash($mot_de_passe, PASSWORD_DEFAULT)]);
        fclose($file);
        header('Location: connexion.php');
        exit();
    } else {
        echo '<script>alert("Erreur inscription.");</script>';
        header('Location: inscription.php');
        exit();
    }
} else {
    // Redirection si des champs sont manquants
    header('Location: inscription.php');
    exit();
}
?>
