<?php

error_reporting(-1);
ini_set('error_reporting', E_ALL);

require "database.php";

initDatabase();
prefillData();

/**
 * @param int $note la note de mon anime
 * @return string un emoji en fonction de ma note
 */
function noteWithEmoji(int $note): string
{
    switch ($note) {
        case $note == 10:
            return "🔥";
        case $note > 7:
            return "🎉";
        default:
            return "💡";
    }
}

//$narutosNote = $animes[1]['note']; // 8
//
//echo "<p>Ma note est de : $narutosNote</p>";
//
//var_dump($narutosNote);
//
//noteWithEmoji($narutosNote);
//noteWithEmoji(8);

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
        <?php foreach ($animes as $anime) {
            // pour montrer la différence avec / sans la syntax alternative
        }
        ?>
        <?php foreach ($animes as $anime): ?>
            <tr>
                <td><?php echo $anime['name'] ?></td>
                <td><?php echo $anime['description'] ?></td>
                <td><?php echo $anime['seasons'] ?></td>
                <td><?php echo implode(',', $anime['tags']); ?></td>
                <td><?php echo noteWithEmoji($anime['note']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
