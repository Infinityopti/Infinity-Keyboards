<?php
// Connexion à la base de données
$servername = "localhost"; // Met le nom de ton serveur MySQL ici
$username = "infinity"; // Met ton nom d'utilisateur MySQL ici
$password = "2008imisspacific2007imissher"; // Met ton mot de passe MySQL ici
$database = "contact"; // Met le nom de ta base de données ici

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupérer les données du formulaire et échapper les apostrophes
$name = mysqli_real_escape_string($conn, $_POST['name'] ?? '');
$email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
$message = mysqli_real_escape_string($conn, $_POST['message'] ?? '');

// Préparer et exécuter la requête SQL pour insérer les données dans la base de données
$sql = "INSERT INTO contact (Nom, Email, Message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message envoyé avec succès!";
    // Rediriger vers la page Acceuil.html
    header("Location: Merci.html");
    exit(); // Assure que le script s'arrête après la redirection
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion
$conn->close();
?>
