<?php namespace ProcessWire;

$homepage = $pages->get('/');
$assets = $config->urls->templates;
$author = $homepage->createdUser;

include('_func.php');

ob_start();
