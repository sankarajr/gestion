<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un produit</title>
</head>
<body>
<h1>Modifier un produit</h1>
<form method="post" action="index.php?controller=produit&action=edit&id=<?= htmlspecialchars($produit['id']) ?>">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($produit['nom']) ?>" required>

    <label for="description">Description :</label>
    <textarea id="description" name="description" required><?= htmlspecialchars($produit['description']) ?></textarea>

    <label for="prix">Prix :</label>
    <input type="number" id="prix" name="prix" step="0.01" value="<?= htmlspecialchars($produit['prix']) ?>" required>

    <label for="quantite">Quantité :</label>
    <input type="number" id="quantite" name="quantite" value="<?= htmlspecialchars($produit['quantite']) ?>" required>

    <label for="id_categorie">Catégorie :</label>
    <select id="id_categorie" name="id_categorie" required>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>" <?= $produit['id_categorie'] == $category['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($category['nom']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Modifier</button>
</form>
</body>
</html>
