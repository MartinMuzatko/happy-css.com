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
        <div class="search" flex-end>
            search
        </div>
    </div>
</header>
