<?php

require "./Interfaces/LikeableInterface.php";
require "./Interfaces/ViewableInterface.php";

require "./Model/Author.php";

require "./Model/Providers/AbstractVideo.php";
require "./Model/Providers/Netflix.php";
require "./Model/Providers/YouTube.php";
require "./Model/Providers/CrunchyRoll.php";

require "./Services/VideoService.php";

$naruto = new CrunchyRoll('naruto', 'Naruto', 'Ninja', 10, ['Action']);
$mha = new CrunchyRoll('my-hero-academia', 'MHA', 'Héros', 10, ['Action', 'Héro']);

$apiPlatform = new YouTube('Ap6l56bLQtQ', 'Grafikart - API Platform', "Apprendre le framework", 10, ['Programmation', 'Web']);
$squidGame = new Netflix('81040344', 'Squid Game', 'Une bonne série coréenne', 9, ['Violence', 'Suspense']);

$squidGame->setIsLiked(true);

$viewer = new VideoService();


$bleachsAuthor = new Author('Tite Kubo');
$narutosAuthor = new Author('Kishimoto');
$narutosAuthor->setIsLiked(true);

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
        <th>Nom</th>
        <th>Description</th>
        <th>Note</th>
        <th>Tags</th>
        <th>Liens (généré avec provide())</th>
        <th>Likée ?</th>
    </tr>
    </thead>
    <?php foreach ([$naruto, $mha, $apiPlatform, $squidGame] as $video): ?>
        <tbody>
        <tr>
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
                <?php VideoService::displayLiked($video); ?>
            </td>
        </tr>
        </tbody>
    <?php endforeach; ?>
</table>

<h2>Auteurs</h2>

<ul>
    <?php foreach ([$narutosAuthor, $bleachsAuthor] as $author): ?>
        <li><?php echo $author->getName();
            VideoService::displayLiked($author); ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>
