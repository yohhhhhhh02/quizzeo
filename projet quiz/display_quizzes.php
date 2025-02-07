
<?php
include 'header.php';
?>
<!-- display_quizzes.php -->
<?php

$quiz_files = glob("quiz.csv");

echo "<h2>Quiz disponibles:</h2>";

foreach ($quiz_files as $quiz_file) {
    $file = fopen($quiz_file, 'r');
    $quiz_data = fgetcsv($file);
    fclose($file);

    echo "<p><a href='play_quiz.php?quiz_file=$quiz_file'>" . $quiz_data[0] . " - Créateur: " . $quiz_data[1] . "</a></p>";
}
?>
