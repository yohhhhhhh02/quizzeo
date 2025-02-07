<!-- process_quiz.php -->

<?php
include 'header.php';
?>

<?php
// Vérifier si des réponses ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

    // Initialiser la note de l'utilisateur
    $score = 0;

    // Récupérer les réponses de l'utilisateur et les réponses correctes

    $quiz_name = $_SESSION["quiz_name"]; 

    $user_answers = $_POST['selected_answers'];
    $correct_answers = $_POST['correct_answer_indices'];
    $points_per_answer = $_POST['points_per_answer'];

    // Parcourir les réponses de l'utilisateur et les comparer avec les réponses correctes
    foreach ($user_answers as $question => $user_answer_index) {
        // Vérifier si la réponse de l'utilisateur est correcte
        if ($user_answer_index == $correct_answers[$question]) {
            // Incrémenter la note de l'utilisateur en fonction des points attribués à la question
            $score += $points_per_answer[$question];
            // Afficher la correction pour la question
            echo "Question : $question - Réponse correcte!";
        } else {
            // Afficher la correction pour la question
            echo "Question : $question - Réponse incorrecte. La réponse correcte était la numéro : " . $correct_answers[$question];
        }
        echo "<br>";
    }

// Enregistrer les résultats dans le fichier CSV
$user_id = $identifiant; // Remplacez par l'identifiant de l'utilisateur (peut-être à partir d'une session)
    

$file = fopen("quiz_results.csv", "a");
if ($file !== false) {
    $line = '"' . $user_id . '","' . $quiz_name . '","' . $score . '"' . PHP_EOL;
    fwrite($file, $line);
    fclose($file);
} else {
    echo "Erreur: Impossible d'ouvrir le fichier quiz_results.csv pour enregistrer les résultats.";
}
    // Afficher la note de l'utilisateur
    echo "Votre score est : $score";

} else {
    // Rediriger vers la page d'accueil si aucune réponse n'a été soumise
    header("Location: paly_quiz.php");
    exit();
}


$file = fopen("quiz_results.csv", "r"); // Ouvrir le fichier en mode lecture
if ($file) {
    echo "<h2>Notes des utilisateurs :</h2>";
    while (($data = fgetcsv($file)) !== false) {
        // Afficher l'identifiant de l'utilisateur, le nom du quiz et la note obtenue
        echo "Utilisateur: $data[0], Quiz: $data[1], Note: $data[2]<br>";
    }
    fclose($file); // Fermer le fichier
} else {
    echo "Aucune note n'est disponible pour le moment.";
}

?>
