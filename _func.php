<?php namespace ProcessWire;

function editButton($page) {
	ob_start();
	?>
	<? if(wire('user')->isLoggedin()): ?>
        <p style="position: absolute; background: rgba(255,255,255,.5); padding: .5em; top: 0; right: 0; z-index: 100000; width: auto;">
            <a style="color: black;" href="<?=$page->editURL?>">Edit</a>
        </p>
    <? endif;
	return ob_get_clean();
}

function tags($page) {
    if (!$page->tags) {
        return false;
    }
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

function listingOfSeries($page, $hideLinkToParent = true, $hideOverviewItem = false) {

	$listingText = '';

	// is Parent Overview
	if ($page->parent->template && $page->parent->template->name == 'overview') {
        if (!$hideOverviewItem) {
            $listingText = $page->parent->contenttypesingular;
        }

		// is Content Type Series
		if ($page->parent->contenttype->title == 'series') {
			$listingText = getIndex($page).'. '.$page->parent->contenttypesingular.' of ';
			if ($hideLinkToParent) {
				$listingText .= $page->parent->title;
			} else {
				$listingText .= '<a href="'.$page->parent->httpUrl.'">'.$page->parent->title.'</a>';
			}
		}
	}
	return $listingText;
}

function articlePreview($page) {
    if ($page instanceof NullPage) {
        return false;
    }
    ob_start();
	?>
		<div class="article-preview">
			<a href="<?=$page->httpUrl?>">
				<? if($page->image && $page->image->first):?>
					<img class="article-preview__teaserimage" src="<?=$page->image->first->size(1920, 500)->httpUrl?>" alt="<?=$page->title?>">
				<? endif; ?>
                <? //elseif($page->backgroundcolor && $page->backgroundcolor->title != 'light' && $page->backgroundcolor->title): ?>
                    <!-- <div style="padding: 3em;" class="article-preview__teaserimage stripe--<?=$page->backgroundcolor->title?>"></div> -->
				<div class="title">
					<h3><?=$page->title?></h3>
					<!-- <small class="article-preview__date"><time><?=date('jS \o\f F Y', $page->published)?></time></small> -->
					<!-- <br><?=listingOfSeries($page)?> -->
					<p><?=$page->summary?></p>
				</div>
			</a>
			<p><?=tags($page)?></p>
		</div>
	<?php
	return ob_get_clean();
}

function getIndex($page)
{
	return array_search($page, explode('|', $page->siblings)) + 1;
}
