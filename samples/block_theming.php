<?php

require __DIR__.'/twig.php';

require __DIR__.'/extension/DisplayExtension.php';
require __DIR__.'/extension/DisplayThemeNode.php';
require __DIR__.'/extension/DisplayThemeTokenParser.php';

$twig = new Twig_Environment($loader);
$twig->addExtension(new DisplayExtension(array('display.html.twig')));

echo "Homepage\n";
echo "--------\n";
echo $twig->render('homepage.html.twig');

echo "\n\n";

echo "Page\n";
echo "----\n";
echo $twig->render('page.html.twig');

