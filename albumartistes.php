<?PHP
require_once("class/WebPage.class.php");
require_once("class/MyPDO.template.class.php");
require_once("class/MyPDO.class.php");

$p = new WebPage();
/*
$stmt = MyPDO::getInstance()->prepare(<<<SQL
    SELECT name
    FROM artist
    ORDER BY name
SQL
);

$stmt->execute();

$compte=$stmt->rowCount();
*/

$stmt = MyPDO::getInstance()->prepare(<<<SQL
    SELECT a.name names ,count(al.id) nba
    FROM artist a
    left JOIN album al 
    on a.id=al.artistid
    group by 1
    order by a.name
SQL
);

$stmt->execute();

$compte = $stmt->rowCount();


$p->setTitle("myfirstbd");



$p->appendContent(<<<HTML
    <h1>Nombre d'albums des {$compte} artistes </h1>
HTML
) ;
echo $p->toHTML();

while (($ligne = $stmt->fetch()) !== false) {
    echo "<li>{$ligne['names']} : {$ligne['nba']}\n";
    
}


