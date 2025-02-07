<?php
include 'header.php';
?>

<?php

if (!isset( $_SESSION['administrateur_identifiant'])) {
    // Redirigez vers la page de connexion pour l'administrateur si la session pour un administrateur n'est pas définie
    header("Location: connexion.php");
    exit();
}

// Le reste du contenu de la page pour l'administrateur
?>
