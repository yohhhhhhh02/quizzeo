<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="connexion.css">
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <form action="traitement_inscription.php" method="post">
            <p> <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required> </p>
            <p> <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>  </p>
            <p> <label for="email">Email :</label>
            <input type="text" id="email" name="email" required></p>
            <p> <label for="identifiant">Identifiant :</label>
            <input type="text" id="identifiant" name="identifiant" required></p>
            <p> <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required></p>
            <p> <label for="type_inscription">Type d'inscription :</label>
            <select id="type_inscription" name="type_inscription" required>
                <option value="ecole">Ecole</option>
                <option value="entreprise">Entreprise</option>
                <option value="utilisateur_simple">Utilisateur simple</option>
            </select></p>
            
            <?php
            // Génération d'un nombre aléatoire et stockage dans la session
            session_start();
            $_SESSION['random_number'] = mt_rand(1000, 9999); // Génère un nombre aléatoire entre 1000 et 9999
            $random_number = $_SESSION['random_number'];
            ?>
            
            <p> <label for="captcha">Captcha :</label>
            <input type="text" id="captcha" name="captcha" required placeholder="Entrez le nombre <?php echo $random_number; ?>"> </p>

            <p><input type="submit" value="S'inscrire"></p>

            <p>Vous avez déjà un compte ? <a href="connexion.php">Se connecter</a></p>
        </form>
    </div>
</body>
</html>

