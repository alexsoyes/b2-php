<?php

require "./Traits/LikedTrait.php";

require "./Interfaces/ViewableInterface.php";
require "./Interfaces/LikeableInterface.php";

require "./Model/AbstractVideoProvider.php";
require "./Model/Netflix.php";
require "./Model/YouTube.php";
require "./Model/Wakanim.php";
require "./Model/Author.php";

require "./Services/WatcherService.php";

$videos = WatcherService::getVideos();
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
                        echo $author->getName() . " " . WatcherService::displayLike($author);
                    }
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
