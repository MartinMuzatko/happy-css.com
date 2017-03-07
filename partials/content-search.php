<?php namespace ProcessWire; ?>
<?php

$q = $sanitizer->text($input->get->q);

if($q):
    $input->whitelist('q', $q);
    $q = $sanitizer->selectorValue($q);

    $selector = "tags|summary|text|code|textgrid.text%=$q, limit=50, template=page|content-text|content-code|content-cta|content-media";

    if($user->isLoggedin()) $selector .= ", has_parent!=2";

    // Find pages that match the selector
    $matches = $pages->find($selector);
    // did we find any matches?
    if($matches->count):
?>
        <span>
            Found <?=$matches->count?> Pages
        </span>
        <?php foreach ($matches as $match): ?>
            <?php
                if(!in_array($match->template->title, ['content-cta', 'content-code', 'content-media', 'content-text', ])) {
                    $match = $match->parent;
                }
            ?>
            <article flex="100" flex-gt-sm="45" flex-gt-md="30">
                <?=articlePreview($match)?>
            </article>
        <?php endforeach; ?>
    <? else:?>
        <h2>Sorry, no results were found.</h2>
    <? endif; ?>
<? else: ?>
    <h2>Please enter a search term in the search box (upper right corner)</h2>
<? endif; ?>
