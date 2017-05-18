<?php namespace ProcessWire;
$content = ob_get_clean();
if ($input->get->json) {
    include('json.php');
    die;
}
?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Article">
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?=$page->title?> | <?=$homepage->title?> - <?=$homepage->summary?></title>
    <meta name="description" content="<?=$page->summary?>" />

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?=$page->title?>">
    <meta itemprop="description" content="<?=$page->summary?>">
    <meta itemprop="image" content="http://www.example.com/image.jpg">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@<?=$author->twitterHandle?>">
    <meta name="twitter:title" content="<?=$page->title?>">
    <meta name="twitter:description" content="<?=$page->summary?>">
    <meta name="twitter:creator" content="@<?=$author->twitterHandle?>">
    <!-- Twitter Summary card images must be at least 120x120px -->
    <meta name="twitter:image" content="<?=$page->image->first->httpUrl?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?=$page->title?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?=$page->httpUrl?>" />
    <meta property="og:image" content="http://example.com/image.jpg" />
    <meta property="og:description" content="<?=$page->summary?>" />
    <meta property="og:site_name" content="<?=$homepage->title?> - <?=$homepage->summary?>" />
    <meta property="og:locale" content="en_US" />
    <meta property="article:published_time" content="<?=date('c', $page->published)?>" />
    <meta property="article:modified_time" content="<?=date('c', $page->modifed)?>" />

    <link rel="stylesheet" type="text/css" href="<?=$config->urls->templates?>css/main.css" />

    <!-- FavIcons -->
    <link rel="icon" type="image/png" href="<?=$homepage->image->get('name%=dark')->size(128,128)->httpUrl?>" />
</head>
<body class="<?=$page->template->name?>">
    <script>
		window.twttr = (function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0],
		t = window.twttr || {};
		if (d.getElementById(id)) return t;
		js = d.createElement(s);
		js.id = id;
		js.src = "https://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);

		t._e = [];
		t.ready = function(f) {
		t._e.push(f);
		};

		return t;
		}(document, "script", "twitter-wjs"));
	</script>
    <?=$content?>
    <footer class="site__footer">
        <div>
            <p>
                &copy; <?=date('Y')?> by <a href="https://twitter.com/martinmuzatko">Martin Muzatko</a> - fighting the daily Frontend problems
                <? foreach($pages->get('/resources/')->children as $resource): ?>
                    | <a href="<?=$resource->httpUrl?>"><?=$resource->title?></a>
                <? endforeach; ?>
            </p>
            <p>
                Powered by
                <a href="http://processwire.com/">ProcessWire</a> and
                <a href="http://martinmuzatko.github.io/flexproperties/">FlexProperties</a>
            </p>
        </div>
    </footer>
    <? if(!$user->isLoggedin): ?>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-52989130-5', 'auto');
            ga('send', 'pageview');
        </script>
    <? endif; ?>
    <script src="<?=$config->urls->templates?>vendor.js"></script>
    <script src="<?=$config->urls->templates?>main.js"></script>
</body>
</html>
