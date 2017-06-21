<?php namespace ProcessWire; ?>
<?php include('partials/header.php');?>
<main class="site__content">
    <?php
        $backgroundimage = $page->get('backgroundimage|image');
        $backgroundimage = $backgroundimage->first ? "background-image: url({$backgroundimage->first->httpUrl});" : '';
    ?>
    <header
    style="<?=$backgroundimage?>"
    class="stripe stripe--<?=$page->backgroundcolor->title?>">
        <?=editButton($page)?>
        <div>
            <div class="title">
                <h1><?=$page->title?></h1>
                <?=listingOfSeries($page, false, true)?>

                <p class="description"><?=$page->summary?></p>
            </div>
            <? if(!$page->hideauthor):?>
                <div layout="row">
                    <div class="avatar" layout="row" layout-align="start center">
                        <img src="<?=$page->createdUser->image->first->httpUrl?>" alt="<?=$page->createdUser->username?>">
                        <span>
                            Written by <a href="<?=$pages->get('/about/')->httpUrl ?>"><strong><?=$page->createdUser->username?></strong></a>
                            <br>on <time><?=date('jS \o\f F Y', $page->published)?></time>
                            <br><img src="https://img.shields.io/twitter/follow/martinmuzatko.svg?style=social&label=Follow%20@martinmuzatko" alt="">
                        </span>
                    </div>
                </div>
            <? endif;?>
            <p>
                <?=tags($page)?>
            </p>
        </div>
    </header>
    <? if($page->parent->template->title == 'overview' && $page->parent->contenttype->title == 'series'): ?>
    <div>
        <h2>Overview</h2>
        <? foreach($page->siblings as $index => $sibling ):?>
            <h3><?=$index+1?>. <?=$sibling->title?></h3>
            <? foreach($sibling->children as $index => $child ):?>
                <? if (!$child->hidetitle): ?>
                    <h4><?=$child->title?></h4>
                <? endif; ?>
            <? endforeach;?>
        <? endforeach;?>
    </div>
    <? endif; ?>
    <? $contentPages = $page->children; ?>
    <?php include('partials/content.php');?>
    <? if($page->parent->template->name == 'overview'): ?>
        <? if($page->parent->contenttype->title == 'series'): ?>
            <section class="stripe stripe--fluid">
                <div layout="row" layout-align="space-between">
                    <? if(!$page->prev instanceof NullPage):?>
                        <div flex-start flex="100" flex-gt-sm="45" flex-order-sm="1">
                            Previous <?=$page->parent->contenttypesingular?>
                            <?=articlePreview($page->prev)?>
                        </div>
                    <? endif;?>
                    <? if(!$page->next instanceof NullPage):?>
                        <div style="text-align:right;" flex-end flex="100" flex-gt-sm="45" flex-order-sm="0">
                            Next <?=$page->parent->contenttypesingular?>
                            <?=articlePreview($page->next)?>
                        </div>
                    <? endif;?>

                </div>
                <div layout="row" layout-align="center center">
                    <a href="<?=$page->parent->httpUrl?>" class="button primary">
                        See all <?=$page->parent->contenttypeplural?>
                    </a>
                </div>
            </section>
        <? elseif($page->parent->contenttype->title == 'list' && $page->siblings->getTotal() > 1):?>
            <section class="stripe">
                <div>
                    <h2>See other <?=strtolower($page->parent->contenttypeplural)?></h2>
                    <div layout="row" layout-align="space-between">
                        <? foreach($page->siblings->not($page)->filter('limit=4') as $sibling): ?>
                            <div flex-start flex="100" flex-gt-sm="45">
                                <?=articlePreview($sibling)?>
                            </div>
                        <? endforeach; ?>
                    </div>
                    <div layout="row" layout-align="center center">
                        <a href="<?=$page->parent->httpUrl?>" class="button primary">
                            See all <?=$page->parent->contenttypeplural?>
                        </a>
                    </div>
                </div>
            </section>
        <? endif;?>
    <? endif;?>
</main>
<? if(!$page->hidecomments):?>
    <aside class="stripe stripe--light">
        <div>
            <h2>Comments</h2>
            <p>Is there a question burning in your mind? Go ahead and share your thoughts with me.</p>
            <a class="muut" href="https://muut.com/i/happy-css/comments" data-skip_truncate="true" type="dynamic">
                <span class="button primary">Post your comment</span>
                <small>(Do you just see the button? Enable Javascript for the comments to load)</small>
            </a>
            <script src="//cdn.muut.com/1/moot.min.js"></script>
        </div>
    </aside>
<? endif;?>
