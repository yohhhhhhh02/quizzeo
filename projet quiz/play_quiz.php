<?php
include 'header.php';
?>

<?php
// Définir une valeur par défaut pour les points par réponse
$default_points_per_answer = 5;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['quiz_name'])) {
   
    $quiz_name = $_GET['quiz_name'];
    $_POST['quiz_name'] = $quiz_name ;

    $quizFilePath = $quiz_name . ".csv";

    // Vérifier si le fichier est accessible
    if (file_exists($quizFilePath)) {
        // Lire les données du fichier CSV du quiz
        $file = fopen($quizFilePath, "r");


        // Vérifier si le fichier est ouvert avec succès
        if ($file !== false) {
            
            // Ignorer les deux premières lignes (en-têtes)
            fgets($file); // Ligne 1
            fgets($file); // Ligne 2
            fgets($file); // Ligne 3
            // Afficher le nom du quiz
            //echo '<h1>' . $quiz_name . '</h1>';

            // Afficher le formulaire
            echo '<form action="grade_quiz.php" method="post">';
            
            // Parcourir chaque ligne du fichier
            while (($data = fgetcsv($file)) !== false) {
                // Extraire les informations de la question
                $question = $data[0];
                $answers = explode(",", $data[1]); // Séparer les réponses par ","
                $correct_answer_index = intval($data[2]); // Indice de la réponse correcte

                // Afficher la question
                echo '<h1>' . $question . '</h1>';
                // Afficher les options de réponses sous forme de cases à cocher ou de boutons radio
                foreach ($answers as $index => $answer) {
                    // Utiliser des boutons radio pour permettre à l'utilisateur de sélectionner une seule réponse
                    echo '<input type="radio" name="selected_answers['.$question.']" value="' . $index . '"> ' . $answer . '<br>';
                }

                // Ajouter un champ caché pour stocker l'indice de la réponse correcte
                echo '<input type="hidden" name="correct_answer_indices['.$question.']" value="' . $correct_answer_index . '">';

                // Ajouter un champ caché pour stocker les points par réponse (utilisation de la valeur par défaut)
                echo '<input type="hidden" name="points_per_answer['.$question.']" value="' . $default_points_per_answer . '">';
            }

            // Ajouter un bouton de soumission global après toutes les questions
            echo '<input type="submit" value="Soumettre">';
            echo '</form>'; // Fermer la balise du formulaire
            // Fermer le fichier
            fclose($file);
        } else {
            // Afficher un message d'erreur si le fichier ne peut pas être ouvert
            echo "Erreur: Impossible d'ouvrir le fichier $quizFilePath.";
        }
    } else {
        // Afficher un message d'erreur si le fichier du quiz n'existe pas
        echo "Erreur: Le fichier $quizFilePath n'existe pas.";
    }
} else {
    // Afficher un message d'erreur si le paramètre "quiz_name" est manquant dans l'URL
    echo "Erreur: Aucun quiz sélectionné.";
}
?>
