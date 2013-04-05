<?php

require __DIR__.'/twig.php';

$loader->prependPath(__DIR__.'/templates/theming/default');
$loader->prependPath(__DIR__.'/templates/theming/my_theme');

echo $twig->render('homepage.html.twig');
