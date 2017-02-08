<?php
    $content = ob_get_clean();
    if (array_key_exists('json', $_GET)) {
        include('json.php');
	die;
    }
?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Article">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <title><?=$page->title?></title>
        <meta name="description" content="<?=$page->summary?>" />

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="<?=$page->title?>">
        <meta itemprop="description" content="<?=$page->summary?>">
        <meta itemprop="image" content="http://www.example.com/image.jpg">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@<?=$homepage->twitterHandle?>">
        <meta name="twitter:title" content="<?=$page->title?>">
        <meta name="twitter:description" content="<?=$page->summary?>">
        <meta name="twitter:creator" content="@<?=$homepage->twitterHandle?>">
        <!-- Twitter Summary card images must be at least 120x120px -->
        <meta name="twitter:image" content="<?=$page->image?>">

        <!-- Open Graph data -->
        <meta property="og:title" content="Title Here" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="http://www.example.com/" />
        <meta property="og:image" content="http://example.com/image.jpg" />
        <meta property="og:description" content="Description Here" />
        <meta property="og:site_name" content="Site Name, i.e. Moz" />
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" />
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:section" content="Article Section" />
        <meta property="article:tag" content="Article Tag" />

        <link rel="stylesheet" type="text/css" href="<?=$config->urls->templates?>css/main.css" />

        <!-- FavIcons -->
        <link rel="icon" type="image/png" href="<?=$homepage->favicon?>" />
    </head>
    <body>
        <?=$content?>
        <script src="<?=$config->urls->templates?>js/main.js"></script>
    </body>
</html>
