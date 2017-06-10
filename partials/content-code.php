<?php namespace ProcessWire; ?>
<div layout="row" layout-align="space-between">
    <? foreach($content->codetextrepeater as $grid): ?>
        <? if($grid->textgrid):?>
            <? foreach($grid->textgrid as $text): ?>
                <?php
                    $flex = 'flex="100"';
                    if (count($grid->textgrid) >= 2) {
                        $flex = 'flex="100" flex-gt-md="45"';
                    }
                ?>
                <div <?=$flex?>>
                    <?=$text->text?>
                </div>
            <? endforeach; ?>
        <? endif ?>
        <? foreach($grid->codegrid as $code): ?>
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
                    <? $codeId = $page->name.rand(10000,90000);?>
                    <div id="<?=$codeId?>" hidden>
                        <? if($code->codelanguage->title == 'riot'): ?>
                            <?= preg_replace('/\n/s', "\n\t", $code->code)?>
                        <? else: ?>
                            <?=$code->code?>
                        <? endif ?>
                    </div>
                    <code-preview preview-id="<?=$codeId?>" language="<?=$language?>">
                        <yield to="code"><?=str_replace('}','\\}', str_replace('{','\\{',htmlentities($code->code)))?></yield>
                    </code-preview>
                <? endif ?>
            </div>
        <? endforeach; ?>
    <? endforeach; ?>
</div>
