<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une catégorie</title>
</head>
<body>
<h1>Ajouter une catégorie</h1>
<form method="post" action="index.php?controller=category&action=add">
    <label for="nom">Nom de la catégorie :</label>
    <input type="text" id="nom" name="nom" required>
    <button type="submit">Ajouter</button>
</form>
</body>
</html>
