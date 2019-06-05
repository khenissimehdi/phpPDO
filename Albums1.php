<?php

require_once 'autoload.php';

$p = new WebPage();
$p->appendCssUrl('/css/style.css');

try {
    if (!isset($_GET['artiste']) || !ctype_digit($_GET['artiste'])) {
        throw new Exception('Paramètre manquant');
    }

    $artiste = Artist::createFromId($_GET['artiste']);

    $artistName = WebPage::escapeString($artiste->getName());
    $p->setTitle("Albums de {$artistName}");
    $p->AppendContent(<<<HTML
    <h1>Albums de {$artistName}</h1>
        <ul>

HTML
    );
    foreach ($artiste->getAlbums() as $album) {
        $albumName = WebPage::escapeString($album->getName());
        $p->appendContent("<li>{$album->getYear()} - <a href='morceaux1.php?album={$album->getId()}'>{$albumName}</a>\n");
    }
    $p->appendContent("</ul>\n");
} catch (Exception $e) {
    $p->setTitle('Erreur');
    $p->appendContent("Problème de chargement : {$e->getMessage()}");
}

echo $p->toHTML();
