<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un produit</title>
</head>
<body>
<h1>Ajouter un produit</h1>
<form method="post" action="index.php?controller=produit&action=add">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>

    <label for="description">Description :</label>
    <textarea id="description" name="description" required></textarea>

    <label for="prix">Prix :</label>
    <input type="number" id="prix" name="prix" step="0.01" required>

    <label for="quantite">Quantité :</label>
    <input type="number" id="quantite" name="quantite" required>

    <label for="id_categorie">Catégorie :</label>
    <select id="id_categorie" name="id_categorie" required>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['nom']) ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Ajouter</button>
</form>
</body>
</html>
