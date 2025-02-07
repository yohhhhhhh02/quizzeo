<?php
include 'header.php';
?>

<?php 
function calculerPourcentage($reponses) {
    $nombre_questions = count($reponses);
    $nombre_bonnes_reponses = 0;
    foreach ($reponses as $reponse) {
        if ($reponse == "correcte") {
            $nombre_bonnes_reponses++;
        }
    }
    return ($nombre_bonnes_reponses / $nombre_questions)* 100;
}

$reponses_personnes = array(
    array("nom" => "Selim", "reponses" => array("correcte","incorrecte")),
    array("nom" => "Urbain", "reponses" => array("correcte","incorrecte")),
    array("nom" => "Joël", "reponses" => array("correcte","incorrecte")),
);

$fichier = fopen('resultats_quizz.csv', 'w');

fputcsv($fichier, array('Nom', 'Pourcentage de bonnes réponses'));

foreach($reponses_personnes as $personne) {
    $nom = $personne ['nom'];
    $pourcentage = calculerPourcentage($personne['reponses']);

    fputcsv($fichier, array($nom, $pourcentage));
}

fclose($fichier);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="entreprise.css">
    <title>Entreprise dashboard</title>

    <title>Entreprise</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        
        }
        header {
            background-color: #333;
            background-color: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 10px;
            text-align: center;
       
        }
        footer {
            background-color: #333;
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
    <div class="container">
        <h2>Tableau de bord de quizz</h2>
        <table>
        <tr>
            <th>Nom du Quiz</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td>Quiz 1</td>
            <td>En cours d'écriture</td>
            <td><a href="#">Détails</a></td>
        </tr>
        <tr>
            <td>Quiz 2</td>
            <td>Lancé</td>
            <td><a href="#">Détails</a></td>
        </tr>
        <tr>
            <td>Quiz 3</td>
            <td>Terminé</td>
            <td><a href="#">Détails</a></td>
        </tr>
        <!-- Ajoutez d'autres lignes pour chaque quiz -->
    </table>
    <a href="nouveau-quizz.php" class="boutton">Créer un Nouveau Quiz</a>
    </div>
    
    <footer>
        <p>&copy;© 2025 Quiz Company.Anis,Youssef,Mohammed,Amir</p>
    </footer>
</body>
</html>