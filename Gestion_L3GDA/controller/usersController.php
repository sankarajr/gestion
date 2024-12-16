<?php
require_once './model/usersModel.php';

function listUsers() {
    $db = getDbConnection(); // Obtenir la connexion via db.php
    $users = getAllUsers($db); // Appelle la fonction de usersModel.php
    require './view/users/list.php';
}

function addUser() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $errors = [];
        if (empty($nom)) $errors[] = "Le nom est obligatoire.";
        if (empty($prenom)) $errors[] = "Le prénom est obligatoire.";
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email invalide.";
        if (empty($password) || strlen($password) < 6) $errors[] = "Le mot de passe doit contenir au moins 6 caractères.";

        if (!empty($errors)) {
            require './view/users/add.php';
            return;
        }

        $db = getDbConnection(); // Obtenir la connexion via db.php
        addUserToDb($db, $nom, $prenom, $email, $password); // Appelle une fonction procédurale
        header('Location: index.php?controller=user&action=list');
    } else {
        require './view/users/add.php';
    }
}
?>
