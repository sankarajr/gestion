<?php
require_once './model/produitModel.php';

function listProduits() {
    $produits = getAllProduits(); // Appelle une fonction non POO dans produitModel.php
    require './view/produits/list.php';
}

function addProduit() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? '';
        $description = $_POST['description'] ?? '';
        $prix = $_POST['prix'] ?? '';
        $quantite = $_POST['quantite'] ?? '';
        $id_categorie = $_POST['id_categorie'] ?? '';

        $errors = [];
        if (empty($nom)) $errors[] = "Le nom du produit est obligatoire.";
        if (empty($prix) || !is_numeric($prix) || $prix <= 0) $errors[] = "Le prix doit être un nombre positif.";
        if (empty($quantite) || !is_numeric($quantite) || $quantite < 0) $errors[] = "La quantité doit être un nombre positif.";
        if (empty($id_categorie)) $errors[] = "La catégorie est obligatoire.";

        if (!empty($errors)) {
            require './view/produits/add.php';
            return;
        }

        saveProduit($nom, $description, $prix, $quantite, $id_categorie); // Appelle une fonction procédurale
        header('Location: index.php?controller=produit&action=list');
    } else {
        require './view/produits/add.php';
    }
}

function editProduit() {
    $id = $_GET['id'] ?? null;
    if (!$id) {
        header('Location: index.php?controller=produit&action=list');
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? '';
        $description = $_POST['description'] ?? '';
        $prix = $_POST['prix'] ?? '';
        $quantite = $_POST['quantite'] ?? '';
        $id_categorie = $_POST['id_categorie'] ?? '';

        $errors = [];
        if (empty($nom)) $errors[] = "Le nom du produit est obligatoire.";
        if (empty($prix) || !is_numeric($prix) || $prix <= 0) $errors[] = "Le prix doit être un nombre positif.";
        if (empty($quantite) || !is_numeric($quantite) || $quantite < 0) $errors[] = "La quantité doit être un nombre positif.";
        if (empty($id_categorie)) $errors[] = "La catégorie est obligatoire.";

        if (!empty($errors)) {
            $produit = compact('id', 'nom', 'description', 'prix', 'quantite', 'id_categorie');
            require './view/produits/edit.php';
            return;
        }

        updateProduit($id, $nom, $description, $prix, $quantite, $id_categorie); // Fonction non POO
        header('Location: index.php?controller=produit&action=list');
    } else {
        $produit = getProduitById($id); // Fonction non POO
        if (!$produit) {
            header('Location: index.php?controller=produit&action=list');
            return;
        }
        require './view/produits/edit.php';
    }
}

function deleteProduit() {
    $id = $_GET['id'] ?? null;
    if ($id) {
        removeProduit($id); // Fonction non POO
    }
    header('Location: index.php?controller=produit&action=list');
}
?>
