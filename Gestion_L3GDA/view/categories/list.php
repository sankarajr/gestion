<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des catégories</title>
</head>
<body>
<h1>Liste des catégories</h1>
<a href="index.php?controller=category&action=add">Ajouter une catégorie</a>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= htmlspecialchars($category['id']) ?></td>
            <td><?= htmlspecialchars($category['nom']) ?></td>
            <td>
                <a href="index.php?controller=category&action=edit&id=<?= $category['id'] ?>">Modifier</a>
                <a href="index.php?controller=category&action=delete&id=<?= $category['id'] ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
