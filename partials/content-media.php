<?php namespace ProcessWire; ?>
<figure>
    <img src="<?=$content->image->first->httpUrl?>">
    <figcaption>
        <?=$content->image->first->description?>
        <?=$content->image->first->filesize?>
    </figcaption>
</figure>
