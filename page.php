<?php namespace ProcessWire; ?>
<?php include('_header.php');?>
<main>
    <?php
        $backgroundimage = $page->image->first ? "background-image: url({$page->image->first->httpUrl});" : '';
    ?>
    <header
    style="<?=$backgroundimage?>"
    class="stripe <?=$page->backgroundcolor->title?>">
        <?=editButton($page)?>
        <div>
            <div class="title">
                <h1><?=$page->title?></h1>
                <p class="description"><?=$page->summary?></p>
            </div>
            <? if(!$page->hideauthor):?>
                <div layout="row">
                    <a class="avatar" href="<?=$pages->get("title=about")->httpUrl ?>" layout="row" layout-align="start center">
                        <img src="<?=$page->createdUser->image->first->httpUrl?>" alt="<?=$page->createdUser->username?>">
                        <span>
                            Written by <strong><?=$page->createdUser->username?></strong> <br>
                            on <time><?=date('jS \o\f F Y', $page->published)?></time>
                        </span>
                    </a>
                </div>
            <? endif;?>
            <p>
                <?=tags($page)?>
            </p>
        </div>
    </header>
    <? $contentPages = $page->children; ?>
    <?php include('_content.php');?>
    <? if($page->parent->template->name == 'overview'): ?>
        <section>
            <div layout="row" layout-align="space-between">
                <? if(!$page->prev instanceof NullPage):?>
                    <div flex-start flex="100" flex-gt-sm="45" order-sm="1">
                        Previous <?=$page->parent->contenttypesingular?>
                        <?=articlePreview($page->prev)?>
                    </div>
                <? endif;?>
                <? if(!$page->next instanceof NullPage):?>
                    <div style="text-align:right;" flex-end flex="100" flex-gt-sm="45" order-sm="0">
                        Next <?=$page->parent->contenttypesingular?>
                        <?=articlePreview($page->next)?>
                    </div>
                <? endif;?>

            </div>
            <div layout="row" layout-align="center center">
                <a href="" class="button primary">
                    See all <?=$page->parent->contenttypeplural?>
                </a>
            </div>
        </section>
    <? endif;?>
</main>
<? if(!$page->hidecomments):?>
    <aside class="stripe light">
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
