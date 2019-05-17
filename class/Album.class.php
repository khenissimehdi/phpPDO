<?PHP
require_once('Entity.class.php');

class Album extends Entity
{
    protected $year = null;
    protected $genreId = null;
    protected $artistId = null;
    protected $coverId = null;

    public static function createFromId(int $id):self
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
            Select *
            from album
            Where id = :id
SQL
);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Album');
        $stmt->execute([':id'=> $id]);

        $album = $stmt->fetch();

        if ($id === false)
        {
            throw new Exception ('Il n y a aucun album');
        }

        return $album;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getArtist()
    {
        return $this->artistId;
    }

    public function getCoverId()
    {
        return $this->coverd;
    }

    public static function getFromArtistId(int $id):array
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
            select *
            from album 
            Where artistId = :artistId
            order by year
SQL
);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Album');
        $stmt->execute([':artistId' => $id]);

        return $stmt->fetchAll();
    }

}