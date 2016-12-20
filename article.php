<?php
	ob_start();
?>

<article flex-sm="100" flex-gt-md="75" flex-gt-lg="50" class="article-page">
	<header>
		<h2><?=$page->title?></h2>
		<time><?=date('M d, Y',$page->created)?></time>
		<p><?=$page->summary?></p>
	</header>
	<?=$page->body?>
	<footer>
		<?=tags($page)?>
		<br>
		<script type="text/javascript" src="//app.mailerlite.com/data/webforms/221443/o2b7i8.js?v4"></script>
		<a class="muut" href="https://muut.com/i/happy-css/comments" type="dynamic">happy-css forum</a>
		<script src="//cdn.muut.com/1/moot.min.js"></script>
	</footer>
</article>

<?php
	$content = ob_get_clean();
