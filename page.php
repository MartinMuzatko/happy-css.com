<header>
    <h1><?=$page->title?></h1>
    <p class="description"><?=$page->summary?></p>
</header>
<main>
    <? foreach($page->children as $child): ?>
        <section class="stripe <?=$child->stripecolor->title?>">
            <div>
                <h2><?=$child->title?></h2>
            </div>
        </section>
    <? endforeach; ?>
    <? if($user->isLoggedin()): ?>
        <add-content></add-content>
    <? endif; ?>
</main>
<?php if($user->isLoggedin()) {
    echo "<p><a href='$page->editURL'>Edit</a></p>";
} ?>
