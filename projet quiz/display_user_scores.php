<!-- display_user_scores.php -->
<?php

$user_scores_file = "user_scores.csv";

if (($handle = fopen($user_scores_file, "r")) !== FALSE) {
    echo "<h2>Scores des utilisateurs</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Nom de l'utilisateur</th><th>Quiz</th><th>Score</th><th>Points totaux</th><th>Pourcentage</th></tr>";
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        echo "<tr>";
        foreach ($data as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    fclose($handle);
    echo "</table>";
} else {
    echo "Erreur: Impossible d'ouvrir le fichier de scores des utilisateurs.";
}

?>
