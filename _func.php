<?php

/**
 * /site/templates/_func.php
 * 
 * Example of shared functions used by template files
 *
 * This file is currently included by _init.php 
 *
 * For more information see README.txt
 *
 */

function tags($page)
{
	$tags = $page->tag;
	ob_start();
	?>
		<div class="tags">
		<?php
			foreach ($tags as $tag)
			{
				$items = wire('pages')->find('tag='.$tag->title);
				$count = $items->count;
				?>
				<a href="<?=$tag->httpUrl?>" style="background: <?=$tag->color?>">#<?=$tag->title?> <small><?=$count?></small></a>
				<?php
			}
		?>
		</div>
	<?php
	return ob_get_clean(); 
}

function getIndex($page)
{
	return array_search($page, explode('|', $page->siblings)) + 1;
}