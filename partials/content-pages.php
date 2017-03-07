<?php namespace ProcessWire; ?>
<div layout="row" layout-align="space-between">
    <? foreach($pages->find($content->selector) as $subpage): ?>
        <article flex="100" flex-gt-sm="45" flex-gt-md="30">
            <?=articlePreview($subpage)?>
        </article>
    <? endforeach; ?>
</div>
