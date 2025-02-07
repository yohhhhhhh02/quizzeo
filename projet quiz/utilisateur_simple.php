<?php
include 'header.php';
?>
<?php
if (!isset(  $_SESSION['utilisateur_simple_identifiant'])) {
    // Redirigez vers la page de connexion pour l'administrateur si la session pour un administrateur n'est pas définie
    header("Location: connexion.php");
    exit();
}

// Le reste du contenu de la page pour l'administrateur
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Styles généraux */
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    text-align: center;
}

/* Header */
header {
    background: rgba(0, 0, 0, 0.8);
    padding: 20px;
    font-size: 24px;
    font-weight: bold;
    text-transform: uppercase;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

/* Conteneur principal */
.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* Footer */
footer {
    background: rgba(0, 0, 0, 0.8);
    padding: 15px;
    font-size: 14px;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
}

/* Boutons */
button {
    background: #ff9800;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #e68900;
}

/* Liens */
a {
    color: #ffcc00;
    text-decoration: none;
    transition: 0.3s;
}

a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
<footer>
        <p>&copy;© 2025 Quiz Company.Anis,Youssef,Mohammed,Amir</p>
    </footer>
</body>
</html>
