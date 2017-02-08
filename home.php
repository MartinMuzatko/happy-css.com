<header>
    <div layout="row" layout-align="center center">
        <div layout="row">
            <img src="" alt="">
            <h1>Happy-CSS</h1>
        </div>
        <p flex="100" class="description">Fighting the daily Front-end trouble with Martin Muzatko</p>
    </div>
    <nav layout="row" layout-align>
        <?php $imgs=[4,70,20,25]; ?>
        <? foreach ($page->children as $key => $child):?>

            <article style="background-image: url(https://unsplash.it/800?image=<?=$imgs[$key]?>);background-size:cover;" flex="100" flex-gt-sm="50" flex-gt-md="<?=100 / $page->children->getTotal()?>">
                <a layout="column" layout-align="center center" href="<?=$child->url?>">
                    <h2><?=$child->title?></h2>
                    <p><?=$child->summary?></p>
                </a>
            </article>
        <? endforeach; ?>
    </nav>
</header>
<main>
    <section class="stripe primary">
        <div>
            Welcome to Happy-CSS!
        </div>
    </section>
    <section layout="row">
        <? foreach($pages->find($page->selector) as $child): ?>
            <article flex="100" flex-gt-sm="50" flex-gt-md="33">
                <a href="<?=$child->url?>">
                    <h2><?=$child->title?></h2>
                    <img src="<?=$child->image->first()->url?>" alt="">
                    <p><?=$child->summary?></p>
                </a>
            </article>
        <? endforeach; ?>
    </section>
</main>
<footer></footer>
<?php if($page->editable()) echo "<p><a href='$page->editURL'>Edit</a></p>"; ?>
