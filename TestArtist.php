<?php

require_once("autoload.php");


$artists = Artist::getAll();
$p = new WebPage('Artistes');
$p->appendCssUrl('/css/style.css');
$p->appendContent(<<<HTML
    <h1>Artistes</h1>
    <ul>
HTML
);

foreach ($artists as $artist) {
    $artistName = WebPage::escapeString($artist->getName());
    $p->appendContent("<li><a href='Albums1.php?artiste={$artist->getId()}'>{$artistName}</a>\n");
}

$p->appendContent(<<<HTML
    </ul>
HTML
);

echo $p->toHTML();
