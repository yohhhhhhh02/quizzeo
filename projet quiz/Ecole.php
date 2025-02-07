<?php
include 'header.php';
?>

<?php

if (!isset( $_SESSION['ecole_identifiant'])) {
    // Redirigez vers la page de connexion pour l'administrateur si la session pour un administrateur n'est pas définie
    header("Location: connexion.php");
    exit();
}



?>
<br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
/* Styles généraux */
body {
    background: linear-gradient(to right, #4facfe, #00f2fe);
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
    text-align: center;
}

/* En-tête */
header {
    background-color: #1e3c72;
    color: #fff;
    padding: 15px;
    text-align: center;
    font-size: 1.5em;
    font-weight: bold;
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
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Boutons et liens interactifs */
.button {
    display: inline-block;
    padding: 10px 20px;
    background: #ff5733;
    color: white;
    border-radius: 5px;
    font-weight: bold;
    transition: background 0.3s;
}

.button:hover {
    background: #c70039;
}

/* Pied de page */
footer {
    background-color: #1e3c72;
    color: #fff;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
}

    </style>
</head>
<body>
<h1>QUIZZEO</h1>


    <h1>Bienvenue, <?php echo $identifiant; ?>!</h1> 

    

    <h3>Choisir un Quiz</h3>
    
    <?php

$quizzesDirectory = "quizzes";

$quizFiles = glob($quizzesDirectory . "*.csv");


foreach ($quizFiles as $quizFile) {
    
    $quizData = array_map('str_getcsv', file($quizFile));
    
    $quizName = $quizData[1][0]; 
    $creator = $identifiant;
    $quizId = pathinfo($quizFile, PATHINFO_FILENAME); 

    // Créer un lien vers play_quiz.php avec des paramètres pour identifier quel quiz est choisi
    echo "<a href='play_quiz.php?quiz_name=$quizId'>$quizName (Créé par: $creator)</a><br>";
   
}
$_SESSION["quiz_name"] = $quizName ;
?>


<h3>Création de quiz </h3>


<ul><li><a href="quiz_creation_form.php">QUIZ</a></li></ul>

    <footer>
        <p>&copy; 2025 Quiz Company.Anis,Youssef,Mohammed,Amir </p>
    </footer>
</body>
</html>

