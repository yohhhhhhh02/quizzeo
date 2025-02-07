<?php
include 'header.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <style>
        

        /* Styles généraux */
body {
    background: linear-gradient(to right, #ff758c, #ff7eb3);
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
    text-align: center;
}

/* En-tête */
header {
    background-color: #ff3b3b;
    color: #fff;
    padding: 20px;
    text-align: center;
    font-size: 2em;
    font-weight: bold;
    border-bottom: 4px solid #d12b2b;
}

/* Liens */
a {
    color: #ffdd57;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
}

a:hover {
    color: #fff;
}

/* Titres */
h1, h2, h3 {
    color: #fff;
    font-weight: bold;
}

/* Conteneur principal */
.container {
    max-width: 800px;
    margin: 40px auto;
    padding: 30px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

/* Image */
.container img {
    display: block;
    margin: 20px auto;
    width: 600px;
    height: auto;
}

/* Texte */
.container p {
    font-size: 18px;
    line-height: 1.8;
    color: #444;
}

/* Bouton */
.button {
    display: inline-block;
    padding: 12px 30px;
    background-color: #ff3b3b;
    color: white;
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 8px;
    font-size: 1.2em;
    transition: background 0.3s, transform 0.2s;
}

.button:hover {
    background-color: #d12b2b;
    transform: scale(1.05);
}

/* Pied de page */
footer {
    background-color:rgb(79, 255, 59);
    color: #fff;
    text-align: center;
    padding: 15px;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    font-size: 1em;
}


    </style>
</head>

<body>
    <div class="container">
        <h1>Bienvenue sur notre plateforme de quizz </h1>
        <center><img src="./assets/logo.png" alt="" height="120"></center>
       
      
    </div>
    <footer>
        <p>&copy; © 2025 Quiz Company.Anis,Youssef,Mohammed,Amir</p>
    </footer>
</body>

</html>
