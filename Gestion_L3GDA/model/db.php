<?php

$serveur = "localhost";
$port = "5432";
$user = "postgres";
$pwd = "passer@1";
$dbname = "gestion_L3GDA";

// Utiliser PDO pour PostgreSQL
try {
    $connexion = new PDO("pgsql:host=$serveur;port=$port;dbname=$dbname", $user, $pwd);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie"; // Pour débogage, peut être supprimé en prod.
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
