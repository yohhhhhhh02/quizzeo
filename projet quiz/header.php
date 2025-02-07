<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="./assets/logo.png" type="image/x-icon">
  <title>Mon site</title>
</head>
<body>
  <?php session_start(); ?>
  <header>
    <div class="img">
      <img src="logo ecole.png" alt="Logo.png">
    </div>
    <nav>
      <ul>
      <?php
        if (isset($_SESSION['ecole_identifiant'])) {
          $identifiant = $_SESSION['ecole_identifiant'];
          echo '<li><a href="accueil.php">accueil</a></li>';
          echo '<li><a href="ecole.php"> Quizz</a></li>';
          echo '<li><a href="contact.php">Contact</a></li>';
          echo '<li><button onclick="location.href=\'deconnexion.php\'">Déconnexion</button></li>';
        } elseif (isset($_SESSION['entreprise_identifiant'])) {
          echo '<li><a href="accueil.php">Accueil</a></li>';
          echo '<li><a href="entreprises.php"> Quizz</a></li>';
          echo '<li><a href="contact.php">Contact</a></li>';
          echo '<li><button onclick="location.href=\'deconnexion.php\'">Déconnexion</button></li>';
        } elseif (isset($_SESSION['utilisateur_simple_identifiant'])) {
          echo '<li><a href="accueil.php">accueil</a></li>';
          echo '<li><a href="utilisateur_simple.php">Quizz</a></li>';
          echo '<li><a href="contact.php">Contact</a></li>';
          echo '<li><a href="modification_utilisateur.php">modifications</a></li>';
          echo '<li><button onclick="location.href=\'deconnexion.php\'">Déconnexion</button></li>';
        } elseif (isset($_SESSION['administrateur_identifiant'])) {
          echo '<li><a href="accueil.php">accueil</a></li>';
          echo '<li><a href="administrateur.php">Administrateur</a></li>';
          echo '<li><button onclick="location.href=\'deconnexion.php\'">Déconnexion</button></li>';
        } else {
          header("Location: connexion.php");
          exit();
        }
        ?>
      </ul>
    </nav>
  </header>
</body>
</html>
