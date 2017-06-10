<?php namespace ProcessWire; ?>
<header class="stripe header header--extended" style="background-image: url(<?=$page->backgroundimage->last->httpUrl?>)">
    <div layout="column" layout-align="center center">
        <div layout="row" layout-align="center center">
            <img class="site__logo" src="<?=$homepage->image->get('name%=light')->size(180,180)->httpUrl?>" alt="Logo" height="90" width="90">
            <h1><?=$homepage->title?></h1>
        </div>
        <p class="description"><?=$homepage->summary?></p>
    </div>
</header>
<nav class="site__nav site__nav--big" layout="row" layout-align>
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
<main class="site__content">
    <? $contentPages = $pages->get('/home/')->children; ?>
    <?php include('partials/content.php');?>
    <section>
        <div>
            <?php $about = $pages->get('/about/'); ?>
            <h3><?=$about->title?></h3>
            <div layout="row" layout-align="space-between">
                <div flex="100" flex-gt-md="25" class="avatar large">
                    <img src="<?=$about->image->first->httpUrl?>" alt="">
                    <br><?=$author->username?>
                </div>
                <p flex="100" flex-gt-md="75">
                    <?=$about->summary?>
                </p>
                <a href="<?=$about->httpUrl?>" class="button">Get to know the author</a>
            </div>

        </div>
    </section>
</main>
