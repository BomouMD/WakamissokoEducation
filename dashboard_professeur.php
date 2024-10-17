<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Rediriger vers la page de connexion si non connecté
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord de l'Élève</title>
</head>
<body>
    <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>Vous êtes connecté en tant qu'élève de la classe <?php echo htmlspecialchars($_SESSION['class']); ?>.</p>
    <a href="logout.php">Déconnexion</a>
</body>
</html>
