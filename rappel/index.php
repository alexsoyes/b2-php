<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cours PHP</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>

<?php

phpinfo();

session_start();

error_reporting(-1);
ini_set('error_reporting', E_ALL);

require "database.php";


if ($_POST && !empty($_POST)) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $season = $_POST['seasons'];
    $note = $_POST['note'];
    $tags = explode(',', $_POST['tags']);

    insert([
        'name' => $name,
        'description' => $description,
        'seasons' => $season,
        'note' => $note,
        'tags' => $tags,
    ]);

    header('Location: /');
}

//initDatabase();
//prefillData();

/**
 * @param int $note la note de mon anime
 * @return string un emoji en fonction de ma note
 */
function noteWithEmoji(int $note): string
{
    switch ($note) {
        case $note == 10:
            return "🔥";
        case $note > 7:
            return "🎉";
        default:
            return "💡";
    }
}

$animes = getData();

?>

<?php if ($animes && !empty($animes)): ?>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Seasons</th>
            <th>Tags</th>
            <th>Fav</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($animes as $anime) {
            // pour montrer la différence avec / sans la syntax alternative
        }
        ?>
        <?php foreach ($animes as $anime): ?>
            <tr>
                <td><?php echo $anime['name'] ?></td>
                <td><?php echo $anime['description'] ?></td>
                <td><?php echo $anime['seasons'] ?></td>
                <td><?php echo implode(',', unserialize($anime['tags'])); ?></td>
                <td><?php echo noteWithEmoji($anime['note']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<form action="" method="post">
    <label>Nom
        <input type="text" name="name" value="JJK">
    </label>

    <label>Description
        <input type="text" name="description" value="Extension du territoire">
    </label>

    <label>Saison
        <input type="number" name="seasons" readonly value="5">
    </label>

    <label>Note
        <input type="number" name="note" required value="10">
    </label>

    <label>Tags (séparé par des virgules)
        <input type="text" name="tags" required value="Action,Shonen">
    </label>

    <button type="submit">Enregistrer</button>
</form>


</body>
</html>