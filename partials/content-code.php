<?php namespace ProcessWire; ?>
<div layout="row" layout-align="space-between">
    <? foreach($content->codegrid as $code): ?>
        <?php
            $flex = 'flex="100"';
            if (count($content->textgrid) >= 2) {
                $flex = 'flex="100" flex-gt-md="45"';
            }
        ?>
        <div <?=$flex?>>
            <?php $language = $code->codelanguage->title == 'riot' ? 'html' : $code->codelanguage->title; ?>
            <? if($code->showcode):?>
                <div style="background-color: <?=$pages->get('/tags/'.$code->codelanguage->title)->color?>" class="code code-<?=$language?>"><?=strtoupper($code->codelanguage->title)?></div>
                <pre><code class="language-<?=$language?>"><?=htmlentities($code->code)?></code></pre>
            <? endif ?>
            <? if($code->showpreview):?>
                <? if($code->codelanguage->title == 'riot'): ?>
                    <?= preg_replace('/\n/s', "\n\t", $code->code)?>
                <? else: ?>
                    <?=$code->code?>
                <? endif ?>
            <? endif ?>
        </div>
    <? endforeach; ?>
</div>
