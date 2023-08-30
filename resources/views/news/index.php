<?php
/** @var array $news */
?>

<?php foreach ($news as $n): ?>
<div style="border:1px solid green; margin: 12px; padding: 6px">
    <h2><?=$n['title']?></h2>
    <p><?=$n['description']?></p>
    <div style="margin: 6px">
        <strong><?=$n['author']?> <?=$n['created_at']?></strong>
    </div>
    <a href=<?=route('news.show', ['id' => $n['id']])?>>Читать =></a>
</div>

<?php endforeach; ?>
