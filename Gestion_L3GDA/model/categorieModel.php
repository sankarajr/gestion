<?php

require_once 'model/db.php'; // Inclure le fichier de connexion à la base

function getAllCategories($db) {
    try {
        $query = $db->query("SELECT * FROM categories");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
    }
}

function addCategorie($db, $nom) {
    try {
        $stmt = $db->prepare("INSERT INTO categories (nom) VALUES (:nom)");
        $stmt->bindParam(':nom', $nom);
        return $stmt->execute();
    } catch (PDOException $e) {
        die("Erreur lors de l'ajout de la catégorie : " . $e->getMessage());
    }
}

function deleteCategorie($db, $id) {
    try {
        $stmt = $db->prepare("DELETE FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        die("Erreur lors de la suppression de la catégorie : " . $e->getMessage());
    }
}

function updateCategorie($db, $id, $nom) {
    try {
        $stmt = $db->prepare("UPDATE categories SET nom = :nom WHERE id = :id");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        die("Erreur lors de la mise à jour de la catégorie : " . $e->getMessage());
    }
}

function getCategorieById($db, $id) {
    try {
        $stmt = $db->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur lors de la récupération de la catégorie : " . $e->getMessage());
    }
}
?>
