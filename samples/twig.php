<?php

error_reporting(-1);
ini_set('display_errors', 1);

require __DIR__.'/vendor/autoload.php';

$templatesDir = sprintf('%s/templates/%s', __DIR__, basename($_SERVER["SCRIPT_NAME"], '.php'));

if (!is_dir($templatesDir)) {
    echo "The template dir \"$templatesDir\" does not exist\n";
    echo "It is guess by the script file name\n";
    die(1);
}

$loader = new Twig_Loader_Filesystem(array($templatesDir));

$twig = new Twig_Environment($loader);
