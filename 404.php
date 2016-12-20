<?php
	ob_start();
?>
	<article flex-sm="100" flex-gt-md="75" flex-gt-lg="50" class="article-page">
		<h2><?=$page->title?></h2>
		<?=$page->body?>
		<footer>
			<a class="muut" href="https://muut.com/i/happy-css/comments" type="dynamic">happy-css forum</a>
			<script src="//cdn.muut.com/1/moot.min.js"></script>
		</footer>
	</article>
<?php
	$content = ob_get_clean();