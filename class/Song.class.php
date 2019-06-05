<?PHP

class Song extends Entity
{   
 
    public function createFromId(int $id):song
    {
        $stmt= MyPDO::getInstance()->prepare(<<<SQL
        select *
        from song
        Where songId= :id
SQL
);

        $stmt->setFetchMode(PDO::FETCH_CLASS, _CLASS_);

        $stmt->execute([':id' => $id]);
        $artist = $stmt->fetch();
        if (($object = $stmt->fetch()) !== false) {
            return $object;
        }
        throw new Exception('Il n y a pas de musiques à cette instance'
    );



    }
}