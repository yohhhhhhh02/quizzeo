<?php
session_start(); // Démarrage de la session

// Destruction de toutes les données de session
$_SESSION = array();

// Destruction de la session
session_destroy();

// Redirection vers la page d'accueil ou une autre page après la déconnexion
header("Location: accueil.php");
exit();
?>
