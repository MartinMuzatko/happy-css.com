<?php namespace ProcessWire; ?>
<div>
    <? foreach($pages->find($content->selector) as $subpage): ?>
        <article>
            <?=articlePreview($subpage)?>
        </article>
    <? endforeach; ?>
</div>
