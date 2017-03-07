<?php namespace ProcessWire; ?>
<header class="stripe fluid header reduced">
    <div layout="row" layout-align="start center">
        <a href="<?=$homepage->httpUrl?>">
            <img src="<?=$homepage->image->get('name%=light')->size(180,180)->httpUrl?>" alt="" height="46" width="46">
        </a>
        <nav>
            <? foreach ($homepage->children('template=page|overview') as $key => $child):?>
                <a href="<?=$child->url?>"><?=$child->title?></a>
            <? endforeach; ?>
        </nav>
        <form action="<?=$pages->get('/search/')->httpUrl?>" class="search" flex-end>
            <input type="text" name="q" size="10">
        </form>
    </div>
</header>
