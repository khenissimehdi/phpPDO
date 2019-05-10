<?php

require_once 'class/MyPDO.class.php';

$stmt = MyPDO::getInstance()->prepare(<<<SQL
    SELECT name
    FROM artist
    ORDER BY name
SQL
);

$stmt->execute();

echo $stmt->rowCount();
while (($ligne = $stmt->fetch()) !== false) {
        echo "<p>{$ligne['name']}\n";
}
