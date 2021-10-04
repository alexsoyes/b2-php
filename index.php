<?php

require "./Anime.php";

$naruto = new Anime('Naruto', 'dezdzedezdze', 10, 27);


$animes = [$naruto, $naruto, $naruto];

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

