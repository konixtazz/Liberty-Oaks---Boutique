<?php
// Configuration de la base de données
$host = 'localhost';
$dbname = 'boutique_fivem';
$user = 'root'; // Remplace par ton utilisateur MySQL
$password = ''; // Remplace par ton mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
