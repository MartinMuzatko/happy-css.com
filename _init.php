<?php namespace ProcessWire;

$homepage = $pages->get('/');
$assets = $config->urls->templates;
$author = $homepage->createdUser;
$coverImage = $homepage->image->get('name%=dark')->size(128,128)->httpUrl;
if ($page->get('image|backgroundimage')->first) {
    $coverImage = $page->get('image|backgroundimage')->first->size(256,256)->httpUrl;
}

include('_func.php');

ob_start();
