<?php

require "./Model/AbstractVideoProvider.php";
require "./Model/Netflix.php";
require "./Model/YouTube.php";

$netflix = new Netflix('Squid game');
$youtube = new YouTube('Grafikart');

?>

<ul>
    <?php foreach ([$netflix, $youtube] as $video) : ?>
        <li><?php echo $video->getName(); echo $video->provide(); ?> </li>
    <?php endforeach; ?>
</ul>

<?php


require "./Anime.php";

$naruto = new Anime('Naruto', '', 10, 27);
$mha = new Anime('My Hero Academia', '', 10, 5);

$animes = [$naruto, $mha];

?>
<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Desc</th>
        <th>Note</th>
        <th>Nb. saisons</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($animes as $naruto): ?>
        <tr>
            <td><?php echo $naruto->getName(); ?></td>
            <td><?php echo $naruto->getDesc(); ?></td>
            <td><?php echo $naruto->getNote(); ?></td>
            <td><?php echo $naruto->getSeason(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

