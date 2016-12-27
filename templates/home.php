<?php
	ob_start();
?>

<section layout="row" class="home">
<?php

	$posts = $pages->find($page->postselector.', limit=10');
?>
<?php
	foreach ($posts as $post):
		$type = $post->template;
		$index = getIndex($post);
	?>
		<article flex-lg="50" flex-gt-lg="33" class="<?=$type?>">
			<h3><a href="<?=$post->httpUrl?>"><?=$post->title?></a> <br><time><?=date('M d, Y',$post->created)?></time></h3>
			<?php if($post->template == 'lesson'): ?>
				<div>
					<b><?=$index?>. Lesson of <?=$post->parent->title?></b>
					<?php if($index > 1): ?>
						| <a href="<?=$post->parent->httpUrl?>">See all Lessons</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?=$post->summary?>
			
			<footer>
				<?=tags($post)?>
			</footer>
		</article>
	<?php endforeach;?>
</section>

<?php
	$content = ob_get_clean();