<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des produits</title>
</head>
<body>
<h1>Liste des produits</h1>
<a href="index.php?controller=produit&action=add">Ajouter un produit</a>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Catégorie</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($produits as $produit): ?>
        <tr>
            <td><?= htmlspecialchars($produit['id']) ?></td>
            <td><?= htmlspecialchars($produit['nom']) ?></td>
            <td><?= htmlspecialchars($produit['description']) ?></td>
            <td><?= htmlspecialchars($produit['prix']) ?> FCFA</td>
            <td><?= htmlspecialchars($produit['quantite']) ?></td>
            <td><?= htmlspecialchars($produit['categorie']) ?></td>
            <td>
                <a href="index.php?controller=produit&action=edit&id=<?= $produit['id'] ?>">Modifier</a>
                <a href="index.php?controller=produit&action=delete&id=<?= $produit['id'] ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
