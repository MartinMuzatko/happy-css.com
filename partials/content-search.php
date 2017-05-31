<?php namespace ProcessWire; ?>
<?php

$for = $sanitizer->text($input->get->for);

if($for):
    $input->whitelist('for', $for);
    $for = $sanitizer->selectorValue($for);

    $selector = "title|summary|codegrid.code|name|tags|summary|text|code|textgrid.text*=$for, limit=30, template=page|content-text|content-code|content-cta|content-media|overview";

    if($user->isLoggedin()) $selector .= ", has_parent!=2";

    // Find pages that match the selector
    $matches = $pages->find($selector)->not($homepage);
    // did we find any matches?
    if($matches->count):
    $filteredMatches = [];
    foreach ($matches as $match) {
        if(!in_array($match->template->title, ['content-cta', 'content-code', 'content-media', 'content-text'])) {
            $match = $match->parent;
        }
        array_push($filteredMatches, (string) $match);
    }
    $matches = array_unique($filteredMatches);
?>
        <h3>
            Found <?=count($matches)?> article<?=count($matches) > 1 ? 's' : ''?> for <strong><?=$for?></strong>.
        </h3>
        <?php foreach ($matches as $match): ?>
            <?php
                $match = $pages->get($match);
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
