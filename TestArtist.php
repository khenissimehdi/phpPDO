<?php

require_once("autoload.php");

$p=new WebPage();
$p->setTitle("TEST");

$p->appendCssUrl("http://cutrona/css/styleTP.css") ;
$artist = Artist::createFromId(15);
$artists = Artist::getAll();


$p->appendContent(<<<HTML
<h1>TEST</h1>
<h4>{$artist->getName()}</h4>
<ol>

HTML
);
for($i=0;$i<count($artists);$i++)
{
    $table = $artists[$i]->getName();
    $p->appendContent("<li>".$table);
}




echo $p->toHtml();