<?php
	ob_start();
?>

<article flex-sm="100" flex-gt-md="75" flex-gt-lg="50" class="article-page">
	<?php
		$index = getIndex($page);
	?>
	<header>
		<h2><?=$page->title?></h2>
		<small>
			<?=$index?>. Lesson of 
			<a style="background: <?=$page->parent->color?>;" href="<?=$page->parent->httpUrl?>" class="tag"><?=$page->parent->title?></a>
			series
		</small>
		<time><?=date('M d, Y',$page->created)?></time>
	</header>
	<p class="summary">
		<?=$page->summary?>
	</p>
	<?=$page->body?>
	<footer>
		<div layout="column">
			<?php if($page->next->id): ?>
				<span>
					Next lesson: <a href="<?=$page->next->httpUrl?>"><?=getIndex($page->next)?>. <?=$page->next->title?></a>
				</span>
			<?php endif; ?>
			<?php if($page->prev->id): ?>
				<span>
					Previous lesson: <a href="<?=$page->prev->httpUrl?>"><?=getIndex($page->prev)?>. <?=$page->prev->title?></a>
				</span>
			<?php endif; ?>
			<span>
				<a href="<?=$page->parent->httpUrl?>" class="button">See all Lessons</a>
			</span>
		</div>
		<a class="muut" href="https://muut.com/i/happy-css/comments" type="dynamic">happy-css forum</a>
		<script src="//cdn.muut.com/1/moot.min.js"></script>
	</footer>
</article>

<?php
	$content = ob_get_clean();