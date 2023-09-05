<?php
/** @var array $itemNews */
?>


<div style="border:1px solid green; margin: 12px; padding: 6px">
    <p><?=$itemNews['category']?></p>
    <h2><?=$itemNews['title']?></h2>
    <p><?=$itemNews['description']?></p>
    <div style="margin: 6px">
            <strong><?=$itemNews['author']?> <?=$itemNews['created_at']?></strong>
    </div>
</div>

