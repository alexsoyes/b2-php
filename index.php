<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cours B2 - PHP</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
<?php
$animes = [
    [ // $anime
        'name' => 'MHA',
        'description' => 'Un anime cool.',
        'seasons' => 5,
        'tags' => ['Action', 'Shonen'],
        'note' => 3,
    ],
    [
        'name' => 'Naruto',
        'description' => 'Un anime cool (mais long)',
        'seasons' => 1000,
        'tags' => ['Action', 'Shonen'],
        'note' => 7,
    ],
    [
        'name' => 'Haikyuu',
        'description' => 'Volley-ball !',
        'seasons' => 4,
        'tags' => ['Sport'],
        'note' => 9,
    ],
];
?>

<?php

/**
 * On utilise le plus possible la "syntax alternative" pour gérer le HTML dans du PHP !
 */

//if (!empty($animes)) {
//    echo "<table><thead></thead><tbody>";
//    foreach ($animes as $anime) {
//        echo "<tr>";
//        echo $anime['name'];
//        echo "</tr>";
//    }
//    echo "</tbody></table>";
//}

?>

<?php
// cette variable a une portée locale, elle n'a RIEN à voir avec la function getEmoji($note)
$note = 10;

function getEmoji(int $note): string
{
    echo "Ma note est de : $note";

    if ($note > 10 || $note < 0) {
        return "Problème";
    }

    switch ($note) {
        case $note > 8:
            return "🎉";
        case $note > 6:
            return "⭐️";
        case $note > 3:
            return "😞";
        default:
            return "💡";
    }
}

echo getEmoji($note);
echo getEmoji(-8);
echo getEmoji(0);
echo getEmoji(5);
echo getEmoji(10);

?>

<?php if (!empty($animes)): ?>
    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Desc</th>
            <th>Nb saisons</th>
            <th>Tags</th>
            <th>Fav</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($animes as $anime): ?>
            <tr>
                <td><?php echo $anime['name']; ?></td>
                <td><?php echo $anime['description']; ?></td>
                <td><?php echo $anime['seasons']; ?></td>
                <td><?php echo implode(", ", $anime['tags']); ?></td>
                <td><?php $emoji = getEmoji($anime['note']);
                    echo $emoji; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
</body>
</html>
