<?php
session_start();

// Paramètres de connexion à la base de données
$host = 'localhost';  // ou IP du serveur de base de données
$dbname = 'nom_de_la_base_de_donnees';
$username = 'nom_utilisateur';
$password = 'mot_de_passe';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configuration des exceptions pour les erreurs PDO
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Préparation et exécution de la requête SQL
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$user]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification du mot de passe
    if ($result && password_verify($pass, $result['password'])) {
        // Connexion réussie, enregistrement des données dans la session
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['class'] = $result['class'];
        $_SESSION['role'] = $result['role'];

        // Redirection basée sur le rôle
        if ($result['role'] === 'professeur') {
            header('Location: dashboard_professeur.php');
        } else {
            header("Location: class_{$result['class']}.php");
        }
        exit;
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Connexion</button>
    </form>
</body>
</html>
