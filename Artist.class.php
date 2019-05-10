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
        $stmt->setFetchMode (MyPDO::FETCH_CLASS, 'Artist');

        $stmt->execute([':id' => $id]);


        $artist = $stmt->fetch();

        if ($artist === false) {
            // lancer une exception
        }
        return $artist;
    }

    public static function getAll():void
    {

    }

}