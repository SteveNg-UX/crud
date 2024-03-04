<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Récupérer les informations de l'utilisateur à partir de la base de données (à remplacer avec votre logique)
$user_id = $_SESSION['user_id'];

// Afficher la page de bienvenue
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
</head>
<body>
    <h2>Bienvenue</h2>
    <p>Vous êtes connecté en tant qu'utilisateur <?php echo $user_id; ?>.</p>
    <a href="logout.php">Se Déconnecter</a>
</body>
</html>