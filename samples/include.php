<?php

require __DIR__.'/twig.php';

$posts = array(
    array('title' => 'first post', 'content' => 'first content'),
    array('title' => 'second post', 'content' => 'second content'),
);

echo "Homepage\n";
echo "--------\n";
echo $twig->render('homepage.html.twig');

echo "\n\n";

echo "News\n";
echo "----\n";
echo $twig->render('news.html.twig', array('posts' => $posts));

