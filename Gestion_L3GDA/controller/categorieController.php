<?php
require_once './model/categorieModel.php';

function index() {
    // Récupération des catégories depuis le modèle
    $categories = getAllCategories(); // Utilisation de la fonction en mode procédural (pas POO)

    // Chargement de la vue pour afficher les catégories
    require_once './view/categories/index.php';
}
?>
