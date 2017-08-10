<?php namespace ProcessWire; ?>
<header class="stripe stripe--fluid header header--reduced">
    <div layout="column" layout-gt-sm="row" layout-align="start stretch">
        <a class="site__logo site__logo--reduced" href="<?=$homepage->httpUrl?>">
            <img srcset="<?=$homepage->image->get('name%=light')->size(92,92)->httpUrl?> 2x" src="<?=$homepage->image->get('name%=light')->size(180,180)->httpUrl?>" alt="" height="46" width="46">
        </a>
        <nav class="site__nav site__nav--short" layout-gt-sm="row" layout="column">
            <? foreach ($homepage->children('template=page|overview') as $key => $child):?>
                <style>
                    #nav-<?=$child->name?>:hover, #nav-<?=$child->name?>:focus, #nav-<?=$child->name?>.active {
                        background-color: <?=$child->color?>
                    }
                </style>
                <a class="<?= $child->id == $page->rootParent->id ? 'active' : ''?>" id="nav-<?=$child->name?>" href="<?=$child->url?>"><?=$child->title?></a>
            <? endforeach; ?>
        </nav>
        <form action="<?=$pages->get('/search/')->httpUrl?>" class="search" flex-end layout="row" layout-align="center center">
            <input type="search" name="for" size="20" placeholder="Search topics" value="<?=$input->get->for?>">
        </form>
    </div>
</header>
