<?php
session_start();
$error = "";

function validateInput($input) {
    return htmlspecialchars(trim($input));
}

if (isset($_POST['identifiant']) && isset($_POST['mot_de_passe']) && isset($_POST['type_utilisateur'])) {
    $identifiant = validateInput($_POST['identifiant']);
    $mot_de_passe = validateInput($_POST['mot_de_passe']);
    $type_utilisateur = validateInput($_POST['type_utilisateur']);
    
    $file_name = $type_utilisateur . '.csv';
    if (!file_exists($file_name)) {
        $error = "Type d'utilisateur non valide.";
    } else {
        $file = fopen($file_name, 'r');

        if ($file) {
            while (($line = fgetcsv($file)) !== false) {
                if ($line[3] === $identifiant) {
                    if (password_verify($mot_de_passe, $line[4])) {
                       
                        switch ($type_utilisateur) {
                            case 'entreprise':
                                $_SESSION['entreprise_identifiant'] = $identifiant;
                                header('Location: entreprises.php');
                                exit();
                            case 'ecole':
                                $_SESSION['ecole_identifiant'] = $identifiant;
                                header('Location: ecole.php');
                                exit();
                            case 'utilisateur_simple':
                                $_SESSION['utilisateur_simple_identifiant'] = $identifiant;
                                header('Location: utilisateur_simple.php');
                                exit();
                            case 'administrateur':
                                $_SESSION['administrateur_identifiant'] = $identifiant;
                                header('Location: administrateur.php');
                                exit();
                            default:
                                header('Location: connexion.php');
                                exit();
                        }
                    } else {
                        $error = "Le mot de passe est incorrect.";
                    }
                } else {
                    $error = "L'identifiant n'existe pas.";
                }
            }
            fclose($file);
        } else {
            $error = "Erreur lors de l'ouverture du fichier.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="connexion.css">
    <style>
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <?php if ($error !== "") : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <label for="identifiant">Identifiant :</label>
            <input type="text" id="identifiant" name="identifiant" required>
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>
            <label for="type_utilisateur">Type d'utilisateur :</label>
            <select id="type_utilisateur" name="type_utilisateur">
                <option value="entreprise">Entreprise</option>
                <option value="ecole">Ecole</option>
                <option value="utilisateur_simple">Utilisateur Simple</option>
                <option value="administrateur">Administrateur</option>
            </select>
            <br>
            <br>
            <input type="submit" value="Se connecter">
        </form>
        <p>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous ici</a>.</p>
    </div>
</body>

</html>
