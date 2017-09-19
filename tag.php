<?php namespace ProcessWire; ?>
<?php include('partials/header.php');?>
<main class="site__content">
    <div
        class="stripe stripe--primary">
        <?=editButton($page)?>
        <div>
            <div class="title">
                <?php
                $articles = $pages->find('tags='.$page->title.',sort=-published');
                $count = $articles->count;
                ?>
                <h1><?=$page->title?></h1>
                <p class="description">
					<strong><?=$count?> article<?=$count>1?'s':''?></strong> tagged with <span class="tag" style="background:<?=$page->color?>">#<?=$page->title?></span>
				</p>
            </div>
        </div>
    </div>
    <section>
		<div>
			<?=$page->text?>
		</div>
	</section>
	<section>
    	<? foreach($articles as $article): ?>
    		<?=articlePreview($article)?>
    	<? endforeach; ?>
    </section>
</main>
