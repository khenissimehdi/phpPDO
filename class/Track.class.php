<?PHP

class Track
{
    private $albumId; //null
    private $songId; //null
    private $number; //null
    private $disknumber; //null
    private $duration; //null

    public function getDuration():int
    {  
        return $this->duration;
    }

    public function getFormattedDuration():string
    {
        $min = floor($this->duration / 60);
        $sec = $this->duration % 60;
        if ($min < 10) {
            $min = "0$min";
        }
        if ($sec < 10) {
            $sec = "0$sec";
        }

        return "$min:$sec";
    }
    public function getNumber():int
    {  
        return $this->number;
    }

    public function getFormattedNumber(): string
    {
        $number = $this->number + 100 * $this->disknumber;

        return $number < 10 ? "0{$number}" : $number;
    }

    public function getAlbumId():int
    {
        return $this->albumId;
    }

    public function getSongId():int
    {
        return $this->songId;
    }

    public function getFromAlbumId($albumid):array
    {
        $stmt= MyPDO::getInstance()->prepare(<<<SQL
        select *
        from Track
        where albumId=:id
SQL
);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Track');
        $stmt->execute([':id'=>$albumid]);
        $Track = $stmt->fetch();

        return $Track;
       

    }


    
}