<?php namespace ProcessWire;

$homepage = $pages->get('/');
$assets = $config->urls->templates;

ob_start();
