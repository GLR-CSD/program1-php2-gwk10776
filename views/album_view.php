<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personenlijst</title>
    <link rel="stylesheet" href="public/css/simple.css">
</head>
<body>
<h1>Albumlijst</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Naam</th>
    </tr>
    <?php foreach ($albums as $album): ?>
        <tr>
            <td><?= $album->getId() ?></td>
            <td><?= $album->getNaam() ?></td>

        </tr>
    <?php endforeach; ?>
</table>

<div class="notice">
    <h2>Album Toevoegen:</h2>
    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="toevoegen.php" method="post">
        <label for="naam">Naam:</label>
        <input type="text" id="albumnaam" name="albumnaam" value="<?= $formValues['naam'] ?? '' ?>" required>
        <?php if (isset($errors['naam'])): ?>
            <span style="color: red;"><?= $errors['naam'] ?></span>
        <?php endif; ?><br>

        <input type="submit" value="Toevoegen">
    </form>
</div>

</body>
</html>
