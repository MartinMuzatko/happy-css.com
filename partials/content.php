<?php namespace ProcessWire; ?>
<? foreach($contentPages as $content): ?>
    <?php
        if ($content->template->name == 'content-content') {
            $content = $content->contentelementreference;
        }
    ?>
    <section
        id="<?= strtolower(str_replace(' ', '', $content->title))?>"
        class="stripe <?=$content->backgroundcolor->title?> <?=$content->stripewidth->title?> <?=$content->template->name?>">

        <?=editButton($content)?>
        <div>
            <? if(!$content->hidetitle):?>
                <h2><?=$content->title?></h2>
            <? endif ?>
            <div layout="row" layout-align="space-between">
                <? foreach($content->textgrid as $text): ?>
                    <?php
                        $flex = 'flex="100"';
                        if (count($content->textgrid) >= 2) {
                            $flex = 'flex="100" flex-gt-md="45"';
                        }
                    ?>
                    <div <?=$flex?>>
                        <?=$text->text?>
                    </div>
                <? endforeach; ?>
            </div>
            <?php

                if ($content->template->name != 'content-text') {
                    include('partials/'.$content->template->name.'.php');
                }
            ?>
        </div>
    </section>
<? endforeach; ?>
