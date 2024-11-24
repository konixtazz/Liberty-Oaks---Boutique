<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifie si le nom d'utilisateur est déjà pris
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE username = ?");
    $stmt->execute([$username]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(["success" => false, "message" => "Nom d'utilisateur déjà pris."]);
        exit;
    }

    // Hashage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Enregistre l'utilisateur
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $hashedPassword]);

    echo json_encode(["success" => true, "message" => "Inscription réussie !"]);
}
?>
