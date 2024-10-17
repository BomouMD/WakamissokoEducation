<?php
session_start(); // Démarrer la session pour utiliser les variables de session

// Simuler un enregistrement et une redirection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ici, ajoutez le code pour enregistrer ces informations dans votre base de données
    // Puis rediriger l'utilisateur vers la page des cours
    $_SESSION['username'] = $username; // Stocker le nom d'utilisateur dans la session

    // Redirection vers la page des cours
    header("Location: classes.html"); // Assurez-vous que ce fichier existe
    exit;
}
?>
