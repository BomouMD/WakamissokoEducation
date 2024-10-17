function requireLoginForClasse(classe) {
    // Simuler une vérification de connexion
    if (!sessionStorage.getItem('loggedIn')) {
        alert('Vous devez être connecté pour accéder à cette page.');
        window.location.href = '../login.html'; // Rediriger vers la page de connexion
    } else {
        console.log('Accès autorisé à', classe);
    }
}
