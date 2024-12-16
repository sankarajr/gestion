<?php

$controller = isset($_GET["controller"]) ? $_GET["controller"] : 'categorie';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

try {
    if ($controller == 'produit') {
        require_once './controller/produitController.php';
    } elseif ($controller == 'categorie') {
        require_once './controller/categorieController.php';
    } else {
        throw new Exception("Contrôleur invalide : $controller");
    }

    if (function_exists($action)) {
        $action();
    } else {
        throw new Exception("Action invalide : $action");
    }
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>
