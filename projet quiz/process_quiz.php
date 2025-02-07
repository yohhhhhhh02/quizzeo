<!-- process_quiz.php -->
<?php
include 'header.php';
?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $quizName = $_POST["quiz_name"];

    $pointsPerAnswer = $_POST["points_per_answer"];
    $questions = $_POST["questions"];
    $answers = $_POST["answers"];
    $correctAnswers = $_POST["correct_answers"];
    
    // Récupération de l'utilisateur connecté (vous devez implémenter la gestion de l'authentification)
    $creator = $identifiant; 
    
    // Chemin du fichier CSV pour ce quiz
    $quizFilePath = "quizzes" . $creator . "_" . time() . ".csv";
    
    // Écriture dans le fichier CSV
    $file = fopen($quizFilePath, "w");
    if ($file) {
        fputcsv($file, array("Quiz Name", "Creator", "Points per Answer"));
        fputcsv($file, array($quizName, $creator, $pointsPerAnswer));
        fputcsv($file, array("Question", "Answers", "Correct Answer"));
        for ($i = 0; $i < count($questions); $i++) {
            $question = trim($questions[$i]);
            $answer = trim($answers[$i]);
            $correctAnswer = trim($correctAnswers[$i]);
            fputcsv($file, array($question, $answer, $correctAnswer));
        }
        fclose($file);
        echo "Quiz créé avec succès !";
    } else {
        echo "Erreur lors de la création du quiz.";
    }
}
?>
