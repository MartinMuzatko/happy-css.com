<?php namespace ProcessWire; ?>
<header class="stripe" style="background-image: url(<?=$page->backgroundimage->last->httpUrl?>)">
    <div layout="column" layout-align="center center">
        <div layout="row" layout-align="center center">
            <img src="<?=$homepage->image->get('name%=light')->size(180,180)->httpUrl?>" alt="Logo" height="90" width="90">
            <h1><?=$homepage->title?></h1>
        </div>
        <p class="description"><?=$homepage->summary?></p>
    </div>
</header>
<nav layout="row" layout-align>
    <? foreach ($page->children('template=page|overview') as $key => $child):?>
        <style>
            #nav-<?=$child->name?>:hover::before {
                background-color: <?=$child->color?>
            }
        </style>
        <article id="nav-<?=$child->name?>" style="background-image: url(<?=$child->backgroundimage->first->size(700,400)->httpUrl?>); background-size:cover;" flex="100" flex-gt-sm="50" flex-gt-md="<?=100 / $page->children->getTotal()?>">
            <a layout="column" layout-align="center center" href="<?=$child->url?>">
                <h2><?=$child->title?></h2>
                <p><?=$child->summary?></p>
            </a>
        </article>
    <? endforeach; ?>
</nav>
<main>
    <? $contentPages = $pages->get('/home/')->children; ?>
    <?php include('partials/content.php');?>
    <section>
        <div>
            <?php $author = $pages->get('/about/'); ?>
            <h2><?=$author->title?></h2>
            <p><?=$author->summary?></p>
            <div class="avatar large">
                <img src="<?=$author->image->first->httpUrl?>" alt="">
                <?=$author->createdUser->username?>
            </div>

        </div>
    </section>
</main>
