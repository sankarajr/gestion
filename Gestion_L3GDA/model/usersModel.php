<?php

require_once './db.php'; // Inclure le fichier de connexion à la base

function getAllUsers($db) {
    try {
        $query = $db->query("SELECT * FROM users");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur lors de la récupération des utilisateurs : " . $e->getMessage());
    }
}

function addUser($db, $nom, $prenom, $email, $password) {
    try {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $db->prepare("INSERT INTO users (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        return $stmt->execute();
    } catch (PDOException $e) {
        die("Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage());
    }
}

function updateUser($db, $id, $nom, $prenom, $email, $password = null) {
    try {
        $sql = "UPDATE users SET nom = :nom, prenom = :prenom, email = :email";
        $params = [
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':id' => $id
        ];

        if ($password) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $sql .= ", password = :password";
            $params[':password'] = $hashedPassword;
        }

        $sql .= " WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute($params);
    } catch (PDOException $e) {
        die("Erreur lors de la mise à jour de l'utilisateur : " . $e->getMessage());
    }
}

function deleteUser($db, $id) {
    try {
        $stmt = $db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        die("Erreur lors de la suppression de l'utilisateur : " . $e->getMessage());
    }
}

function getUserById($db, $id) {
    try {
        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur lors de la récupération de l'utilisateur : " . $e->getMessage());
    }
}
?>
