<?php

$database = 'epsi';
$table = "anime";

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

function initDatabase(): bool
{
    $dbh = getDatabaseConnection();

    global $table;
    global $database;

    if (isset($dbh)) {
        $dbh->exec("DROP DATABASE IF EXISTS $database;");
        echo '<p>Suppression de la base 🔴</p>';

        $dbh->exec("CREATE DATABASE $database;");
        echo '<p>Base de données créée ✅</p>';

        $dbh->exec("CREATE TABLE `$database`.`$table` (
          `id` INT NOT NULL AUTO_INCREMENT,
          `name` VARCHAR(45) NOT NULL,
          `description` TEXT NOT NULL,
          `seasons` INT NOT NULL,
          `note` INT NOT NULL,
          `tags` TEXT NOT NULL,
          PRIMARY KEY (`id`));
        ");
        echo "<p>Table $table créée 🗃</p>";

        return true;
    }

    return false;
}

function prefillData(): void
{
    $animes = [
        [
            'name' => 'MHA',
            'description' => '',
            'seasons' => 5,
            'tags' => ['Action', 'Shonen'],
            'note' => 10,
        ],
        [
            'name' => 'Naruto',
            'description' => '',
            'seasons' => 1000,
            'tags' => ['Action', 'Shonen'],
            'note' => 8,
        ],
    ];

    foreach ($animes as $anime) {
        $isInserted = insert($anime);

        printf("Enregistrement en base de l'anime : %s %s", $anime['name'], $isInserted ? "✅ " : "❌");
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
