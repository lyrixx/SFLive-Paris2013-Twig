<?php

require __DIR__.'/twig.php';

echo $twig->render('hello.html.twig', array('name' => 'greg'));
