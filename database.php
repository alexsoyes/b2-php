<?php

$database = "epsi";
$table = "anime";

function getDatabaseConnection(): PDO
{
    $dsn = 'mysql:host=mysql';
    $user = 'root';
    $password = 'root';

    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    return $dbh;
}
function prefillDatabase(): void {

    $animes = [
        [ // $anime
            'name' => 'MHA',
            'description' => 'Un anime cool.',
            'seasons' => 5,
            'tags' => ['Action', 'Shonen'],
            'note' => 3,
        ],
        [
            'name' => 'Naruto',
            'description' => 'Un anime cool (mais long)',
            'seasons' => 1000,
            'tags' => ['Action', 'Shonen'],
            'note' => 7,
        ],
        [
            'name' => 'Haikyuu',
            'description' => 'Volley-ball !',
            'seasons' => 4,
            'tags' => ['Sport'],
            'note' => 9,
        ],
    ];

    $dbh = getDatabaseConnection();

    if ($dbh) {
        foreach ($animes as $anime) {
            insert($anime);
        }
    }
}

function insert($data): bool
{
    global $table;
    global $database;

    $dbh = getDatabaseConnection();

    try {
        // Insérer des données dans la base.
        $sql = "INSERT INTO `$database`.`$table` 
                    (name, description, seasons, tags, note) VALUES 
                    (:name, :description, :seasons, :tags, :note);
        ";

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':name', $data['name'], PDO::PARAM_STR);
        $stmt->bindValue(':description', $data['description'], PDO::PARAM_STR);
        $stmt->bindValue(':seasons', $data['seasons'], PDO::PARAM_INT);
        $stmt->bindValue(':note', $data['note'], PDO::PARAM_INT);
        $serializedTags = serialize($data['tags']);
        $stmt->bindParam(':tags', $serializedTags, PDO::PARAM_STR);
        return $stmt->execute();
    } catch (Exception $e) {
        echo "<pre><code>";
        var_dump($e);
        echo "</code></pre>";
        return false;
    }
}