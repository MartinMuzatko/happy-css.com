<?php namespace ProcessWire;

$homepage = $pages->get('/');
$assets = $config->urls->templates;

function editButton($page) {
	ob_start();
	?>
	<? if(wire('user')->isLoggedin()): ?>
        <p style="position: absolute; background: #fff; padding: .5em; top: 0; right: 0; z-index: 100000; width: auto;">
            <a style="color: black;" href="<?=$page->editURL?>">Edit</a>
        </p>
    <? endif;
	return ob_get_clean();
}

function tags($page) {
	$tags = $page->tags;
	ob_start();
	?>
		<div class="tags">
		<?php
			foreach ($tags as $tag)
			{
				$items = wire('pages')->find('tags='.$tag->title);
				$count = $items->count;
				?>
		            <a href="<?=$tag->httpUrl?>"
                        style="background: <?=$tag->color?>">
                        <?=$tag->title?>
                        <small><?=$count?></small>
                    </a>
				<?php
			}
		?>
		</div>
	<?php
	return ob_get_clean();
}

function articlePreview($page) {
	ob_start();
	?>
		<a href="<?=$page->httpUrl?>">
			<div class="title">
				<h2><?=$page->title?></h2>
				<small><time><?=date('jS \o\f F Y', $page->published)?></time></small>
				<br><?=$page->parent->contenttypesingular?>
			</div>
			<? if($page->image->first):?>
				<img src="<?=$page->image->first->httpUrl?>" alt="">
			<? endif; ?>
			<p><?=$page->summary?></p>
		</a>
		<p><?=tags($page)?></p>
	<?php
	return ob_get_clean();
}

ob_start();
