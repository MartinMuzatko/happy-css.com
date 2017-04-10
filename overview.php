<?php namespace ProcessWire; ?>
<?php include('partials/header.php');?>
<main>
    <header
        style="background-image: url(<?=$page->backgroundimage->first->httpUrl?>);"
        class="stripe <?=$page->backgroundcolor->title?>">
        <?=editButton($page)?>
        <div>
            <div class="title">
                <h1>
                    <?=$page->title?>
                </h1>
                <p class="description"><?=$page->summary?></p>
                <small class="description-items">
                    <?=$page->numChildren?> <?=$page->numChildren == 1 ? $page->contenttypesingular : $page->contenttypeplural?>
                </small>

            </div>
        </div>
    </header>
    <!-- OVERVIEW WITHIN OVERVIEW -->
    <?php $parentIsOverview = $page->parent->template->name == 'overview'; ?>
    <? if($parentIsOverview):?>
        <section>
            <div layout="row" layout-align="space-between start">
                <article flex="100" flex-gt-md="45">
                    <?=$page->text?>
                </article>
                <aside flex="100" flex-gt-md="45">
                    <?php $children = $page->children('template=page'); ?>
                    <? foreach($children as $index => $child ):?>
                            <article class="article-preview">
                                <a href="<?=$child->httpUrl?>">
                                    <h3><?=$index+1?>. <?=$child->title?></h3>
                                    <?=$child->summary?>
                                </a>
                                <p><?=tags($child)?></p>
                            </article>
                    <? endforeach;?>
                </aside>
            </div>
        </section>
    <!-- TAG OVERVIEW -->
    <? elseif($page->children->count == $page->children('template=tag')->count
        && $page->children('template=tag')->count >= 1): ?>
        <section>
            <? foreach ($page->children as $tag): ?>
                <div>
                    <div class="tags">
                        <a href="<?=$tag->httpUrl?>">
                            <h2 style="background-color:<?=$tag->color?>" ><?=$tag->title?></h2>
                        </a>

                    </div>
                </div>
            <? endforeach; ?>
        </section>
    <!-- REGULAR VIEW -->
    <? else: ?>
        <!-- JUST OVERVIEWS -->
        <? if($page->children->count == $page->children('template=overview')->count):?>
			<section>
				<div layout="row" layout-align="space-between">
                    <? foreach($page->children as $child ):?>
                        <article class="card-overview" flex="100" flex-gt-md="45" style="background-color:<?=$child->color?>;">
                            <a href="<?=$child->httpUrl?>">
                                <h2><?=$child->title?></h2>
                                <p><?=$child->summary?></p>
                                <small><?=$child->numChildren?> <?=$child->numChildren > 1 ? $child->contenttypeplural : $child->contenttypesingular?></small>
                            </a>
                        </article>
                    <? endforeach;?>
				</div>
			</section>
        <?endif;?>

        <!-- JUST PAGES -->
        <? if($page->children->count == $page->children('template=page')->count):?>
			<section class="stripe small">
				<div>
                    <? foreach($page->children as $child): ?>
                        <article>
                            <?=articlePreview($child)?>
                        </article>
                    <? endforeach; ?>
				</div>
			</section>
        <?endif;?>
    <? endif; ?>
</main>
