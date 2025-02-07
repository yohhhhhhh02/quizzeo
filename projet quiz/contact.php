<?php
include 'header.php';
?>
<br>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <link rel="stylesheet" href="style.css">
  <style>
  /* Styles généraux */
body {
    background: linear-gradient(to right, #ff9a9e, #fad0c4);
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
    text-align: center;
}

/* En-tête */
header {
    background-color: #ff6f61;
    color: #fff;
    padding: 15px;
    text-align: center;
    font-size: 1.5em;
    font-weight: bold;
    border-bottom: 3px solid #d94336;
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
}

/* Conteneur principal */
.container {
    max-width: 600px;
    margin: 30px auto;
    padding: 20px;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* Formulaires */
form {
    text-align: left;
}

label {
    font-weight: bold;
    display: block;
    margin-top: 10px;
    color: #333;
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

textarea {
    height: 150px;
}

/* Boutons */
button {
    display: inline-block;
    padding: 12px 25px;
    background-color: #ff6f61;
    color: white;
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background 0.3s;
}

button:hover {
    background-color: #d94336;
}

/* Pied de page */
footer {
    background-color: #ff6f61;
    color: #fff;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    font-size: 0.9em;
}


  </style>
</head>
<body>
 

  <div class="container">
    <h2>Contactez-nous</h2>
    <form action="traitement_contact.php" method="post">
      <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
      </div>
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="sujet">Sujet :</label>
        <input type="text" id="sujet" name="sujet" required>
      </div>
      <div class="form-group">
        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="6" required></textarea>
      </div>
      <button type="submit">Envoyer</button>
    </form>
  </div>
  <footer>
        <p>&copy; 2025 Quiz Company.Anis,Youssef,Mohammed,Amir</p>
    </footer>
</body>
</html>
