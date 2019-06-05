<?php
require_once 'autoload.php';

$p = new WebPage;
$p->setTitle("list track");



$albums = Album::createFromId($_GET['album']) ;


foreach($albums->getTrack() as $track) {
    $p->appendContent("<li>{$track->getFormattedNumber()} - {$p->escapeString($track->getSong()->getName())} ({$track->getFormattedDuration()})\n") ;
}

$p->appendContent("</ul>\n");

