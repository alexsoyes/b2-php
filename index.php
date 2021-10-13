<?php

require "./Interfaces/ViewableInterface.php";
require "./Interfaces/LikeableInterface.php";

require "./Model/AbstractVideoProvider.php";
require "./Model/Netflix.php";
require "./Model/YouTube.php";
require "./Model/Wakanim.php";
require "./Model/Author.php";


require "./Services/WatcherService.php";

$netflix = new Netflix('Squid game', '', 1);
$youtube = new YouTube('Grafikart', '', 8);
$youtube2 = new YouTube('Graven', '', 8);
$wakanim = new Wakanim();

//echo WatcherService::getLink($youtube); // ok
//echo WatcherService::getLink($netflix); // ok
// echo WatcherService::getLink($wakanim); // Uncaught TypeError: Argument 1 passed to WatcherService::getLink() must be an instance of AbstractVideoProvider, instance of Wakanim given

$authorAlex = new Author('Alex');
$authorBen = new Author('Ben');

$youtube->setLiked(true);
$youtube->setAuthors([$authorAlex, $authorBen]);

$videos = [$netflix, $youtube, $youtube2];
?>

<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Desc</th>
        <th>Note</th>
        <th>Lien</th>
        <th>Aimé</th>
        <th>Auteurs</th>
    </tr>
    </thead>
    <tbody>
    <?php
    /** @var AbstractVideoProvider | LikeableInterface $video */
    foreach ($videos as $video) : ?>
        <tr>
            <td><?php echo $video->getName(); ?></td>
            <td><?php echo $video->getDescription(); ?></td>
            <td><?php echo $video->getNote(); ?></td>
            <td><?php echo WatcherService::getLink($video); ?></td>
            <td><?php echo WatcherService::displayLike($video); ?></td>
            <td><?php
                if (!empty($video->getAuthors())) {
                    foreach ($video->getAuthors() as $author) {
                        echo $author->getName() . " ";
                    }
                }
                ?></td>
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

