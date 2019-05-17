<?PHP
require_once("Entity.class.php");

class Artist extends Entity
{

    public static function createFromId(int $id):self
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
            SELECT name, id
            FROM artist
            where id = :id
SQL
);
        $stmt->setFetchMode (PDO::FETCH_CLASS, 'Artist');

        $stmt->execute([':id' => $id]);


        $artist = $stmt->fetch();

        if ($artist === false) {
            throw new exception ("Artiste inconnu");
        }
        return $artist;
    }

    public static function getAll():array
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
        SELECT *
        FROM artist
        order by id
SQL
);
            $stmt->setFetchMode (PDO::FETCH_CLASS, 'Artist');
            $stmt->execute();
            $artists = $stmt->fetchall();
            return $artists;

    }

}