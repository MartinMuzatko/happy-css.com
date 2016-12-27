<?php
	ob_start();
	$lessons = $page->children->find('children.count>0');
?>

<section class="lesson-overview" flex="100">
	<h2><?=$page->title?></h2>
	<div layout="row" layout-wrap  layout-align="space-around" >
		
	<?php
	foreach($lessons as $lesson)
	{
		$count = $lesson->children->count;
	?>
		<article flex-sm="100" flex-gt-md="45" flex-gt-lg="30">
			<h3 class="lesson-title" style="background: <?=$lesson->color?>;">
				<a href="<?=$lesson->httpUrl?>">
					<span><?=$lesson->title?></span>
					<small class="lesson-summary"><?=$lesson->summary?></small>
					<small><?=$count?> Lesson<?=$count>1?'s':''?></small>
				</a>
			</h3>
		</article>
	<?php
	}
	?>
	</div>
</section>

<?php
	$content = ob_get_clean();