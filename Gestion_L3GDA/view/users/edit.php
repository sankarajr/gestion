<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un utilisateur</title>
</head>
<body>
<h1>Modifier l'utilisateur</h1>
<form method="post" action="index.php?controller=user&action=edit&id=<?= htmlspecialchars($user['id']) ?>">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" placeholder="Laisser vide si inchangé">

    <button type="submit">Modifier</button>
</form>
</body>
</html>
