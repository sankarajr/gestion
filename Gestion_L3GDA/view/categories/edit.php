<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une catégorie</title>
</head>
<body>
<h1>Modifier la catégorie</h1>
<form method="post" action="index.php?controller=category&action=edit&id=<?= htmlspecialchars($category['id']) ?>">
    <label for="nom">Nom de la catégorie :</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($category['nom']) ?>" required>
    <button type="submit">Modifier</button>
</form>
</body>
</html>
