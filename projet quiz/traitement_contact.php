<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $question = $_POST['question'];

    // Adresse email où vous souhaitez recevoir les questions
    $destinataire = "votre@email.com";

    // Sujet de l'email
    $sujet = "Nouvelle question de $nom";

    // Corps de l'email
    $message = "Nom: $nom\n";
    $message .= "Email: $email\n";
    $message .= "Question:\n$question";

    // En-têtes de l'email
    $headers = "From: $nom <$email>";

    // Envoyer l'email
    if (mail($destinataire, $sujet, $message, $headers)) {
        // Rediriger vers une page de confirmation si l'email est envoyé avec succès
        header("Location: confirmation_contact.php");
        exit();
    } else {
        // Afficher un message d'erreur si l'envoi de l'email échoue
        $erreur = "Une erreur s'est produite lors de l'envoi de votre question. Veuillez réessayer plus tard.";
    }
} else {
    // Rediriger vers la page de contact si le formulaire n'est pas soumis via POST
    header("Location: contact.php");
    exit();
}
?>
