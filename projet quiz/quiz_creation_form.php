<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
       
        }body{
    background-image: url(https://i.notretemps.com/1400x787/smart/2023/10/16/quiz-annees-2000.jpeg);
    background-attachment: fixed ;
    background-size: cover;
    color: black;
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
   
   
 
}
a{
  color: azure;
}
 
.container {
    width: 80%;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    justify-content: center;
}
 
h1, h2, h3 {
    color: #599eb5;
}
 
a {
    color: #ffffff;
    text-decoration: none;
}
 
 
input[type="text"], input[type="password"], input[type="submit"], input[type="button"] {
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}
 
input[type="submit"], input[type="button"] {
    background-color: #ff6600;
    color: #fff;
    cursor: pointer;
}
 
input[type="submit"]:hover, input[type="button"]:hover {
    background-color: #cc3300;
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
    <h1>Créer un Quiz</h1>
    <form action="process_quiz.php" method="post">
        <label for="quiz_name">Nom du quiz:</label><br>
        <input type="text" id="quiz_name" name="quiz_name" required><br><br>
        
        <label for="points_per_answer">Points par réponse:</label><br>
        <input type="number" id="points_per_answer" name="points_per_answer" min="1" required><br><br>
        
        <div id="questions_container">
            
                <label for="question${questionCount}">Question :</label><br>
                <input type="text" id="question${questionCount}" name="questions[]" required><br><br>
                
                <label for="answers${questionCount}">Réponses (séparées par des virgules):</label><br>
                <input type="text" id="answers${questionCount}" name="answers[]" required><br><br>
                
                <label for="correct_answer${questionCount}">Réponse correcte (numéro de la réponse):</label><br>
                <input type="text" id="correct_answer${questionCount}" name="correct_answers[]" required><br><br>


        </div>
        
        <button type="button" onclick="addQuestion()">Ajouter une question</button><br><br>
        
        <input type="submit" value="Créer le Quiz">
    </form>
    
    <script>
        let questionCount = 1;

        function addQuestion() {
            questionCount++;
            const container = document.getElementById('questions_container');

            const questionDiv = document.createElement('div');
            questionDiv.innerHTML = `
                <label for="question${questionCount}">Question ${questionCount}:</label><br>
                <input type="text" id="question${questionCount}" name="questions[]" required><br><br>
                
                <label for="answers${questionCount}">Réponses (séparées par des virgules):</label><br>
                <input type="text" id="answers${questionCount}" name="answers[]" required><br><br>
                
                <label for="correct_answer${questionCount}">Réponse correcte (numéro de la réponse):</label><br>
                <input type="text" id="correct_answer${questionCount}" name="correct_answers[]" required><br><br>
            `;

            container.appendChild(questionDiv);
        }
    </script>
</body>
</html>
