<?php
require_once("autoload.php");
$p=new WebPage();
$p->setTitle("TEST2");

$p->appendCssUrl("http://cutrona/css/styleTP.css") ;
$album = Album::createFromId(43);
$album = Album::getFromArtistId(17);
var_dump($album);




$p->appendContent(<<<HTML
<h1>TEST2</h1>
<h4></h4>
<ol>

HTML
);





echo $p->toHtml();