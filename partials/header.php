<?php namespace ProcessWire; ?>
<header class="stripe fluid header reduced">
    <div layout="row" layout-align="start stretch">
        <a href="<?=$homepage->httpUrl?>">
            <img src="<?=$homepage->image->get('name%=light')->size(180,180)->httpUrl?>" alt="" height="46" width="46">
        </a>
        <nav layout="row">
            <? foreach ($homepage->children('template=page|overview') as $key => $child):?>
                <style>
                    #nav-<?=$child->name?>:hover, #nav-<?=$child->name?>:focus, #nav-<?=$child->name?>.active {
                        background-color: <?=$child->color?>
                    }
                </style>
                <a class="<?= $child->id == $page->rootParent->id ? 'active' : ''?>" id="nav-<?=$child->name?>" href="<?=$child->url?>"><?=$child->title?></a>
            <? endforeach; ?>
        </nav>
        <form action="<?=$pages->get('/search/')->httpUrl?>" class="search" flex-end>
            <input type="text" name="for" size="10" placeholder="Search topics">
        </form>
    </div>
</header>
