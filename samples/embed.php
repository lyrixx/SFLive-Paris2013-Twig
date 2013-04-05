<?php

require __DIR__.'/twig.php';

$posts = array(
    array('title' => 'first post', 'content' => 'first content', 'author' => 'greg', 'date' => '2013'),
    array('title' => 'second post', 'content' => 'second content', 'author' => 'greg', 'date' => '2013'),
);

echo "Homepage\n";
echo "--------\n";

echo $twig->render('homepage.html.twig', array('posts' => $posts));

echo "\n\n";

echo "News\n";
echo "----\n";
echo $twig->render('news.html.twig', array('posts' => $posts));

