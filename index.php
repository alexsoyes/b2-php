<?php

require "./Model/AbstractVideoProvider.php";
require "./Model/Netflix.php";
require "./Model/YouTube.php";
require "./Model/Wakanim.php";

require "./Services/WatcherService.php";

$netflix = new Netflix('Squid game', '', 1);
$youtube = new YouTube('Grafikart', '', 8);
$wakanim = new Wakanim();

echo WatcherService::getLink($youtube);
echo WatcherService::getLink($netflix);
// echo WatcherService::getLink($wakanim); // Uncaught TypeError: Argument 1 passed to WatcherService::getLink() must be an instance of AbstractVideoProvider, instance of Wakanim given

$videos = [$netflix, $youtube, $wakanim];
?>

<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Desc</th>
        <th>Note</th>
    </tr>
    </thead>
    <tbody>
    <?php
    /** @var AbstractVideoProvider $video */
    foreach ($videos as $video) : ?>
        <tr>
            <td><?php echo $video->getName(); ?></td>
            <td><?php echo $video->getDescription(); ?></td>
            <td><?php echo $video->getNote(); ?></td>
            <td><?php echo WatcherService::getLink($video); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php

exit();

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

