<?php

require "./Interfaces/LikeableInterface.php";
require "./Interfaces/ViewableInterface.php";

require "./Traits/LikedTrait.php";

require "./Model/Author.php";

// classe parente
require "./Model/Providers/AbstractVideo.php";

// classes enfants
require "./Model/Providers/Wakanim.php";
require "./Model/Providers/Netflix.php";
require "./Model/Providers/YouTube.php";
require "./Model/Providers/CrunchyRoll.php";

require "./Services/VideoService.php";


$viewer = new VideoService();
$videos = VideoService::getVideos();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POO</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>
<body>

<h2>Tableau des vidéos</h2>

<table>
    <thead>
    <tr>
        <th>Likée ?</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Note</th>
        <th>Tags</th>
        <th>Liens (généré avec provide())</th>
        <th>Auteurs</th>
    </tr>
    </thead>
    <?php
    /** @var AbstractVideo $video */
    foreach ($videos as $video): ?>
        <tbody>
        <tr>
            <td>
                <?php VideoService::displayLiked($video); ?>
            </td>
            <td>
                <?php echo $video->getName(); ?>
            </td>
            <td>
                <?php echo $video->getDescription(); ?>
            </td>
            <td>
                <?php echo $video->getNote(); ?>
            </td>
            <td>
                <?php echo implode(', ', $video->getTags()); ?>
            </td>
            <td>
                <?php echo $viewer->watch($video); ?>
            </td>
            <td>
                <?php
                if (!empty($video->getAuthors())) {
                    foreach ($video->getAuthors() as $author) {
                        echo $author->getName() . " " . VideoService::displayLiked($author);
                    }
                }
                ?>
            </td>
        </tr>
        </tbody>
    <?php endforeach; ?>
</table>
</body>
</html>
