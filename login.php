<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Recherche l'utilisateur dans la base
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        echo json_encode(["success" => true, "message" => "Connexion réussie !", "username" => $user['username']]);
    } else {
        echo json_encode(["success" => false, "message" => "Nom d'utilisateur ou mot de passe incorrect."]);
    }
}
?>
