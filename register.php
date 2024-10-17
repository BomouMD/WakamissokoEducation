<?php
// Démarrage ou reprise de la session
session_start();

// Vérifier si l'utilisateur est connecté et s'il appartient à la classe 1
if (!isset($_SESSION['user_id']) || $_SESSION['class'] != '1') {
    // Si non connecté ou si l'utilisateur n'appartient pas à la classe 1, redirection vers la page de connexion
    header('Location: login.php');
    exit;
}

// Ici, vous pouvez également vérifier le rôle si nécessaire
// Par exemple, si seulement certains rôles ont accès à cette page
/*
if ($_SESSION['role'] != 'élève') {
    // Redirection si l'utilisateur n'est pas un élève
    header('Location: unauthorized.php');
    exit;
}
*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Classe 1</title>
    <link rel="stylesheet" href="style.css"> <!-- Assurez-vous que le chemin est correct -->
</head>
<body>
    <header>
        <h1>Bienvenue dans la Classe 1</h1>
        <nav>
            <ul>
                <li><a href="classe1.php">Accueil Classe 1</a></li>
                <li><a href="devoirs.php">Devoirs</a></li>
                <li><a href="annonces.php">Annonces</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Informations sur la classe</h2>
            <p>Cette section peut contenir des informations spécifiques à la Classe 1, comme les horaires des cours, les matériaux pédagogiques, etc.</p>
        </section>
        <section>
            <h2>Matériaux de cours</h2>
            <ul>
                <li><a href="docs/Chapitre1.pdf">Chapitre 1</a></li>
                <li><a href="docs/Chapitre2.pdf">Chapitre 2</a></li>
                <li><a href="docs/Chapitre3.pdf">Chapitre 3</a></li>
            </ul>
        </section>
        <section>
            <h2>Contactez votre professeur</h2>
            <p>Pour toute question, veuillez <a href="mailto:professeur@ecole.com">contacter votre professeur</a>.</p>
        </section>
    </main>
    <footer>
        <p>© 2024 École. Tous droits réservés.</p>
    </footer>
</body>
</html>
