<?php namespace ProcessWire; ?>
<? foreach($contentPages as $content): ?>
    <?php
        if ($content->template->name == 'content-content') {
            $content = $content->contentelementreference;
        }
    ?>
    <section
        id="<?= strtolower(str_replace(' ', '', $content->title))?>"
        class="stripe <?=$content->backgroundcolor->title?> <?=$content->stripewidth->title?>">

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
                            $flex = 'flex="100" flex-gt-sm="45"';
                        }
                    ?>
                    <div <?=$flex?>>
                        <?=$text->text?>
                    </div>
                <? endforeach; ?>
            </div>

            <? if($content->template->name == 'content-media'):?>
                <figure>
                    <img src="<?=$content->image->first->httpUrl?>">
                    <figcaption>
                        <?=$content->image->first->description?>
                        <?=$content->image->first->filesize?>
                    </figcaption>
                </figure>
            <? elseif($content->template->name == 'content-pages'):?>
                <div layout="row" layout-align="space-between">
                    <? foreach($pages->find($content->selector) as $subpage): ?>
                        <article flex="100" flex-gt-sm="45" flex-gt-md="30">
                            <?=articlePreview($subpage)?>
                        </article>
                    <? endforeach; ?>
                </div>
            <? elseif($content->template->name == 'content-cta'):?>
                <div layout="row" layout-align="center center">
                    <form layout="column" layout-align="center start" method="POST" class="card primary" action="<?=$content->action->httpUrl?>">
                        <label for="name">
                            Name
                            <input type="text" name="name" size="12" placeholder="First Name" required autocomplete>
                        </label>
                        <label for="email">
                            Email
                            <input type="email" name="email" size="25" placeholder="Email" required autocomplete>
                        </label>
                        <input type="submit" class="button primary outline" value="<?=$content->submit?>">
                        <input type="hidden" name="groupid" value="<?=$content->groupid?>">
                        <input type="hidden" name="action" value="subscribe">
                    </form>
                </div>
            <? elseif($content->template->name == 'content-code'):?>
                <?php $language = $content->codelanguage->title == 'riot' ? 'html' : $content->codelanguage->title; ?>
                <? if($content->showcode):?>
                    <div style="background-color: <?=$pages->get('/tags/'.$content->codelanguage->title)->color?>" class="code code-<?=$language?>"><?=strtoupper($content->codelanguage->title)?></div>
                    <pre><code class="language-<?=$language?>"><?=htmlentities($content->code)?></code></pre>
                <? endif ?>
                <? if($content->showpreview):?>
                    <? if($content->codelanguage->title == 'riot'): ?>

<script type="riot/tag">
    <?= preg_replace('/\n/s', "\n\t", $content->code)?>

</script>

                    <? else: ?>
                        <?=$content->code?>
                        <application></application>
                        <script>riot.mount('*')</script>
                    <? endif ?>
                <? endif ?>
            <? endif ?>
        </div>
    </section>
<? endforeach; ?>
