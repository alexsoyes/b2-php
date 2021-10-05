<?php


require "./Model/Providers/AbstractVideo.php";
require "./Model/Providers/Netflix.php";
require "./Model/Providers/YouTube.php";
require "./Model/Anime.php";
require "./Services/VideoViewerService.php";

$naruto = new Anime('naruto', 'Naruto', 'Ninja', 10, 10, ['Action']);
$mha = new Anime('my-hero-academia', 'MHA', 'Héros', 10, 10, ['Action']);

$youtubeGrafikartAPIPlatform = new YouTube('Ap6l56bLQtQ', 'Grafikart - API Platform');
$netflixSquidGame = new Netflix('81040344', 'Squid Game');

$viewer = new VideoViewerService();

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

<h2>Tableau des animes</h2>

<table>
    <?php foreach ([$naruto, $mha] as $anime): ?>
        <tbody>
        <tr>
            <td>
                <?php echo $anime->getName(); ?>
            </td>
            <td>
                <?php echo $anime->getDescription(); ?>
            </td>
            <td>
                <?php echo $anime->getNote(); ?></td>
            <td>
                <?php echo $anime->getSeasons(); ?>
            </td>
            <td>
                <?php echo implode(',', $anime->getTags()); ?>
            </td>
            <td>
                <?php echo $viewer->watch($anime); ?>
            </td>
        </tr>
        </tbody>
    <?php endforeach; ?>
</table>

<h2>Partage des vidéos</h2>

<?php
printf("<p>Pour regarder %s : %s</p>", $youtubeGrafikartAPIPlatform->getName(), $viewer->watch($youtubeGrafikartAPIPlatform));
printf("<p>Pour regarder %s : %s</p>", $netflixSquidGame->getName(), $viewer->watch($netflixSquidGame));
?>

</body>
</html>
