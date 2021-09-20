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
    [
        'name' => 'MHA',
        'description' => 'Un anime cool.',
        'seasons' => 5,
        'tags' => ['Action', 'Shonen'],
        'favorited' => true,
    ],
    [
        'name' => 'Naruto',
        'description' => 'Un anime cool (mais long)',
        'seasons' => 1000,
        'tags' => ['Action', 'Shonen'],
        'favorited' => false,
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
                <td><?php echo $anime['favorited'] ? 'Oui' : 'Non' ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
</body>
</html>