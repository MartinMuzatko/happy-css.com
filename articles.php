<?php
	ob_start();
?>

<section flex-sm="100" flex-gt-md="75" flex-gt-lg="50">
	<?php
	$articles = $page->children;
	foreach($articles as $article)
	{
	?>
		<article>
			<h3>
				<a href="<?=$article->httpUrl?>">
					<?=$article->title?>
				</a>
				<time><?=date('M d, Y',$article->created)?></time>
			</h3>
			<?=$article->summary?>
			<?=tags($article)?>
		</article>
	<?php
	}
	?>
</section>

<?php
	$content = ob_get_clean();