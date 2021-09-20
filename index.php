<?php

$animes = [
    [
        'name' => 'MHA',
        'description' => '',
        'seasons' => 5,
        'tags' => ['Action', 'Shonen'],
        'favorited' => true,
    ],
    [
        'name' => 'Naruto',
        'description' => '',
        'seasons' => 1000,
        'tags' => ['Action', 'Shonen'],
        'favorited' => false,
    ],
];

?>

<?php if (!empty($animes)): ?>
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
        <?php foreach ($animes as $anime): ?>
            <tr>
                <td><?php echo $anime['name'] ?></td>
                <td><?php echo $anime['description'] ?></td>
                <td><?php echo $anime['seasons'] ?></td>
                <td><?php echo implode(',', $anime['tags']); ?></td>
                <td><?php echo $anime['favorited'] ? "Oui" : "Non"; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>