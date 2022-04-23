<?php
foreach ($blogs as $item) : ?>
<div class="col-4 card">
    <div class="card-header"><?= $item->title . ' - ' . $item->categoryName ?></div>
    <div class="card-body"><?= $item->content ?></div>
</div>
<?php endforeach; ?>