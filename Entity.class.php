<?PHP

abstract class Entity {
    protected $id; //null
    protected $name; //null

    private function __construct()
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId():int
    {
        return $this->id;
    }

    public function getName():string
    {
        return $this->name;
    }

    public abstract static function createFromId(int $id);
    
       
    

}