<?php

require "./Model/Anime.php";

$naruto = new Anime('Naruto', 'Ninja', 10, 10, ['Action']);
$mha = new Anime('MHA', 'Héros', 10, 10, ['Action']);

$animes = [$naruto, $mha];

?>

<table>
    <?php foreach ($animes as $anime): ?>
        <tr>
            <td>
                <?php echo $anime->getName(); ?>
                <?php echo $anime->getDescription(); ?>
                <?php echo $anime->getNote(); ?>
                <?php echo $anime->getSeasons(); ?>
                <?php echo implode(',', $anime->getTags()); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
