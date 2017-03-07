<?php namespace ProcessWire; ?>
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
