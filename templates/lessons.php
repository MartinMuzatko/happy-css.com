<?php
	ob_start();
	$count = $page->children->count;
?>

<section layout="row">
	<div flex-sm="100" flex-gt-md="75" flex-gt-lg="50" class="article-page">
		<h2 class="lesson-title" style="background: <?=$page->color?>;">
			<span><?=$page->title?></span>
			<small class="lesson-summary"><?=$page->summary?></small>
			<small><?=$count?> Lesson<?=$count>1?'s':''?></small>
		</h2>
		<?=$page->body?>
	</div>
	<?php
	$lessons = $page->children;
	foreach($lessons as $lesson)
	{
		$count = $lesson->children->count;
	?>
		<article layout="row" flex="100">
			<h3 flex="100">
				<a href="<?=$lesson->httpUrl?>">
					<?=getIndex($lesson)?>. <?=$lesson->title?>
				</a> /
				<time><?=date('M d, Y',$lesson->created)?></time>
			</h3>
			<span flex-sm="100" flex-gt-md="50" flex-gt-lg="33"><?=$lesson->summary?></span>
			<?=tags($lesson)?>
		</article>
	<?php
	}
	?>
</section>

<?php
	$content = ob_get_clean();