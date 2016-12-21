<?php

/**
 * _main.php
 * Main markup file
 *
 * This file contains all the main markup for the site and outputs the regions
 * defined in the initialization (_init.php) file. These regions include:
 *
 *   $title: The page title/headline
 *   $content: The markup that appears in the main content/body copy column
 *   $sidebar: The markup that appears in the sidebar column
 *
 * Of course, you can add as many regions as you like, or choose not to use
 * them at all! This _init.php > [template].php > _main.php scheme is just
 * the methodology we chose to use in this particular site profile, and as you
 * dig deeper, you'll find many others ways to do the same thing.
 *
 * This file is automatically appended to all template files as a result of
 * $config->appendTemplateFile = '_main.php'; in /site/config.php.
 *
 * In any given template file, if you do not want this main markup file
 * included, go in your admin to Setup > Templates > [some-template] > and
 * click on the "Files" tab. Check the box to "Disable automatic append of
 * file _main.php". You would do this if you wanted to echo markup directly
 * from your template file or if you were using a template file for some other
 * kind of output like an RSS feed or sitemap.xml, for example.
 *
 * See the README.txt file for more information.
 *
 */
if ($page->template->name != 'json') {
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?=$page->title?> | <?=$homepage->headline?></title>
	<meta name="description" content="<?=$page->summary?>" />
	<link rel="stylesheet" type="text/css" href="<?=$assets?>css/main.css">

	<meta prefix="og: http://ogp.me/ns#" property="og:description" content="<?=$page->summary?>" />
	<meta prefix="og: http://ogp.me/ns#" property="og:type" content="article" />
	<meta prefix="og: http://ogp.me/ns#" property="og:title" content="<?=$page->title?>" />
	<meta prefix="og: http://ogp.me/ns#" property="og:url" content="<?=$homepage->httpUrl?>" />


    <meta prefix="og: http://ogp.me/ns#" property="og:image" content="https://happy-css.com<?=$assets?>img/logo.png">
    <meta name="twitter:image" content="<?=$assets?>img/logo.png">

	<meta name="twitter:description" content="<?=$page->summary?>" />
	<meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@martinmuzatko">
    <meta name="twitter:creator" content="Martin Muzatko">
    <meta name="twitter:title" content="<?=$page->title?>">


	<link rel="icon" type="image/png" href="<?=$assets?>img/favicon.png" />
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

</head>
<body>
	<nav><?php
		// top navigation consists of homepage and its visible children
		foreach($homepage->children as $item)
		{
			echo '<a href="'.$item->url.'">'.$item->title.'</a></li>';
		}

		// output an "Edit" link if this page happens to be editable by the current user
	?>
		<!-- search form-->
		<form class='search' action='<?php echo $pages->get('template=search')->url; ?>' method='get'>
			<input type='text' name='q' placeholder='Search' value='<?php echo $sanitizer->entities($input->whitelist('q')); ?>' />
			<button type='submit' name='submit'>Search</button>
		</form>
	</nav>
	<header>
		<h1><a href="<?=$homepage->httpUrl?>"><img alt="CSS is Awesome" src="<?=$assets?>img/logo.png" height="64" alt="">	<?=$homepage->title?></a></h1>
		<span><?=$homepage->headline?></span>
	</header>


	<main layout="row">
		<?=$content?>
		<?php if(in_array($page->template, ['article', 'home', 'lesson'])): ?>
		<aside flex-sm="100" flex-gt-md="50" <?php if($page->template!='home'){echo 'offset-gt-lg="10"';}?> flex-gt-lg="40" class="about">
			<?php $author = $pages->findOne('template=about');?>
			<h2><?=$author->headline?></h2>
			<?=$author->body?>
		</aside>
		<?php endif; ?>
	</main>

	<footer>
		<p>
			&copy; <?=date('Y')?> by <a href="https://twitter.com/martinmuzatko">Martin Muzatko</a> - fighting the daily Frontend problems
	</footer>
	<script type="text/javascript" src="<?=$assets?>js/libs/caniuse.min.js"></script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-52989130-5', 'auto');
		ga('send', 'pageview');
	</script>
</body>
</html>
<?php

} else {
	echo $content;
}
