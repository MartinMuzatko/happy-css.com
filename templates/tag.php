<?php
	ob_start();
?>

<section>
	<?php
	$articles = $pages->find('tag='.$page->title);
	$count = $articles->count;
	
	?>
	<h2><?=$count?> post<?=$count>1?'s':''?> with the tag <span class="tag" style="background:<?=$page->color?>">#<?=$page->title?></span>found</h2>
	<?php
	foreach($articles as $article)
	{
	?>
		<article>	
			<h3><a href="<?=$article->httpUrl?>"><?=$article->title?></a></h3>
			<?=$article->summary?>
			<?=tags($article)?>
		</article>
	<?php
	}
	?>
</section>

<?php
	$content = ob_get_clean();