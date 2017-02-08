<header>
    <h1><?=$page->title?></h1>
    <span class="description"><?=$page->summary?></span>
</header>
<main>
    <section layout="row">
        <? foreach($page->children as $child): ?>
            <article flex="100" flex-gt-sm="50" flex-gt-md="33">
                <h2><?=$child->title?></h2>
                <img src="<?=$child->image->first()->url?>" alt="">
                <p><?=$child->summary?></p>
            </article>
        <? endforeach; ?>
    </section>
</main>
<?php if($page->editable()) echo "<p><a href='$page->editURL'>Edit</a></p>"; ?>
