<?php

$database = "epsi";
$table = "anime";

class DB {

    const HOST = '';

    public function getDb()
    {
        $pdo = new PDO('mysql:host=self::HOST');
    }
}


function initDatabase(): void {
    $dbh = getDatabaseConnection();

    global $database, $table;

    $dbh->exec("DROP DATABASE IF EXISTS $database;");
    $dbh->exec("CREATE DATABASE $database;");
    $dbh->exec("CREATE TABLE `$database`.`$table` (
      `id` INT NOT NULL AUTO_INCREMENT,
      `name` VARCHAR(45) NOT NULL,
      `description` VARCHAR(45) NOT NULL,
      `note` INT NOT NULL,
      `seasons` INT NOT NULL,
      `tags` TEXT NOT NULL,
      PRIMARY KEY (`id`));
    ");
}

function getDatabaseConnection(): PDO
{
    $dsn = 'mysql:host=0.0.0.0';
    $user = 'root';
    $password = 'root';

    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    return $dbh;
}

function deleteByID(int $id): bool {
    $dbh = getDatabaseConnection();

    global $database, $table;

    $statement = $dbh->prepare("DELETE FROM $database.$table WHERE id=$id LIMIT 1");

    return $statement->execute();
}

function getData(): ?array {
    $dbh = getDatabaseConnection();

    global $database, $table;

    $statement = $dbh->prepare("SELECT * FROM $database.$table");
    $executed = $statement->execute();

    if ($executed) {
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    return null;
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
        var_dump($stmt->errorInfo());

        $stmt->bindValue(':name', $data['name'], PDO::PARAM_STR);
        $stmt->bindValue(':description', $data['description'], PDO::PARAM_STR);
        $stmt->bindValue(':seasons', $data['seasons'], PDO::PARAM_INT);
        $stmt->bindValue(':note', $data['note'], PDO::PARAM_INT);
        $serializedTags = serialize($data['tags']);
        $stmt->bindParam(':tags', $serializedTags, PDO::PARAM_STR);

        $isInserted = $stmt->execute();

        if ($isInserted === false) {
            var_dump($stmt->errorInfo());
        }

        return $isInserted;
    } catch (Exception $e) {
        echo "<pre><code>";
        var_dump($e);
        echo "</code></pre>";
        return false;
    }
}